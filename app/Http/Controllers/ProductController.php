<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductFile;
use App\Models\ProductImage;
use App\Models\ProductResource;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;





class ProductController extends Controller
{
    //
    public function ProductPage()
    {
        $categories = SubCategory::where('status', 1)->get();
        return view('pages.product', compact('categories'));
    }
    public function fetch()
    {
        return Product::with('category')->latest()->get();
    }
    /* =========================
        STORE / UPDATE
    ========================== */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id'       => 'required|integer',
            'name'              => 'required|string|max:255',
            'price'             => 'required|numeric',
            'discount_percent'  => 'nullable|numeric',
            'original_price'    => 'nullable|numeric',
            'quantity'          => 'required|integer',
            'stock_status'      => 'required',
            'images.*'          => 'image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => implode('<br>', $validator->errors()->all())
            ]);
        }

        DB::beginTransaction();

        try {

            /* ---------- STORE / UPDATE PRODUCT ---------- */
            $product = Product::updateOrCreate(
                ['id' => $request->id],
                [
                    'category_id'      => $request->category_id,
                    'name'             => $request->name,
                    'slug'             => Str::slug($request->name),
                    'price'            => $request->price,
                    'discount_percent' => $request->discount_percent ?? 0,
                    'original_price'   => $request->original_price ?? $request->price,
                    'quantity'         => $request->quantity,
                    'stock_status'     => $request->stock_status,
                    'tags'             => $request->tags,
                    'short_description' => $request->short_description,
                    'description'      => $request->description,
                    'status'           => 1
                ]
            );

            /* ---------- GENERATE 8-DIGIT SKU USING PRODUCT ID ---------- */
            if (!$product->sku) {
                $product->sku = str_pad($product->id, 8, '0', STR_PAD_LEFT);
                $product->save();
            }
            /* ---------- MULTIPLE IMAGE UPLOAD ---------- */
            if ($request->hasFile('images')) {

                $uploadPath = public_path('uploads/products');

                // Create folder if not exists
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                foreach ($request->file('images') as $image) {

                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move($uploadPath, $imageName);

                    ProductImage::insert([
                        'product_id' => $product->id,
                        'image'      => $imageName
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status'  => true,
                'message' => $request->id ? 'Product updated successfully' : 'Product added successfully'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /* =========================
        EDIT
    ========================== */
    public function edit($id)
    {
        $product = Product::with('images')->findOrFail($id);

        return response()->json($product);
    }

    /* =========================
        DELETE
    ========================== */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        /* delete images */
        foreach ($product->images as $img) {
            Storage::disk('public')->delete($img->image);
            $img->delete();
        }

        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product deleted'
        ]);
    }
    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);

        $path = public_path('uploads/products/' . $image->image);
        if (file_exists($path)) {
            unlink($path);
        }

        $image->delete();

        return response()->json(['status' => true]);
    }

    public function show($id)
    {
        $product = Product::with([
            'resources'
        ])->findOrFail($id);

        return view('pages.product-details', compact('product'));
    }
    // 
    public function ProductResourceStore(Request $request)
    {
        DB::beginTransaction();

        try {

            $productId = $request->product_id;

            /* ================= DATA SHEET ================= */
            if ($request->filled('datasheet_title') && $request->hasFile('datasheet_file')) {

                $request->validate([
                    'datasheet_title' => 'required|string|max:255',
                    'datasheet_file'  => 'required|mimes:pdf|max:2048'
                ]);

                $fileName = time() . '_datasheet.' . $request->datasheet_file->extension();
                $request->datasheet_file->move(public_path('uploads/resources'), $fileName);

                ProductResource::create([
                    'product_id' => $productId,
                    'type'       => 'datasheet',
                    'title'      => $request->datasheet_title,
                    'file'       => $fileName,
                    'status'     => $request->status
                ]);
            }

            /* ================= BROCHURE ================= */
            if ($request->hasFile('brochure_file')) {

                $request->validate([
                    'brochure_file' => 'required|mimes:pdf|max:10240'
                ]);

                $fileName = time() . '_brochure.' . $request->brochure_file->extension();
                $request->brochure_file->move(public_path('uploads/resources'), $fileName);

                ProductResource::create([
                    'product_id' => $productId,
                    'type'       => 'brochure',
                    'file'       => $fileName,
                    'status'     => $request->status
                ]);
            }

            /* ================= VIDEO ================= */
            if ($request->filled('video_url')) {

                $request->validate([
                    'video_url' => 'required|url'
                ]);

                ProductResource::create([
                    'product_id' => $productId,
                    'type'       => 'video',
                    'video_url'  => $request->video_url,
                    'status'     => $request->status
                ]);
            }

            DB::commit();

            return response()->json([
                'status'  => true,
                'message' => 'Product resources added successfully'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /* ================= EDIT ================= */
    public function ProductResourceEdit($id)
    {
        return ProductResource::findOrFail($id);
    }

    /* ================= UPDATE ================= */
    public function ProductResourceUpdate(Request $request, $id)
    {
        $resource = ProductResource::findOrFail($id);

        if ($request->hasFile('file')) {
            if ($resource->file && File::exists(public_path('uploads/resources/' . $resource->file))) {
                File::delete(public_path('uploads/resources/' . $resource->file));
            }

            $file = time() . '.pdf';
            $request->file->move(public_path('uploads/resources'), $file);
            $resource->file = $file;
        }

        $resource->title = $request->title;
        $resource->video_url = $request->video_url;
        $resource->status = $request->status;
        $resource->save();

        return response()->json([
            'status' => true,
            'message' => 'Resource updated'
        ]);
    }

    /* ================= DELETE ================= */
    public function ProductResourceDestroy($id)
    {
        $resource = ProductResource::findOrFail($id);

        if ($resource->file && File::exists(public_path('uploads/resources/' . $resource->file))) {
            File::delete(public_path('uploads/resources/' . $resource->file));
        }

        $resource->delete();

        return response()->json([
            'status' => true,
            'message' => 'Resource deleted'
        ]);
    }
    public function index($productId)
    {
        $resources = ProductResource::where('product_id', $productId)->get();

        return response()->json($resources);
    }
}
