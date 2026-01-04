<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function CategoryPage()
    {
        $categories = Category::where('status', 1)->get();
        return view('pages.category', compact('categories'));
    }
    public function OrderPage()
    {
        return view('pages.orderlist');
    }
    public function PaymentPage()
    {
        return view('pages.paymentlist');
    }
    public function fetch()
    {
        $data = SubCategory::with('category')->get();
        // dd($data);
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categories' => 'required',
            'sub_category_name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ]);
        }

        SubCategory::create([
            'categories' => $request->categories,
            'sub_category_name' => $request->sub_category_name,
            'status' => 1
        ]);

        return response()->json(['status' => true]);
    }
    public function edit($id)
    {
        return response()->json(SubCategory::find($id));
    }

    public function update(Request $request)
    {
        SubCategory::where('id', $request->id)->update([
            'categories' => $request->categories,
            'sub_category_name' => $request->sub_category_name
        ]);

        return response()->json(['status' => true]);
    }

    public function destroy($id)
    {
        SubCategory::where('id', $id)->delete();
        return response()->json(['status' => true]);
    }
    public function changeStatus(Request $request)
    {
        $sub = SubCategory::findOrFail($request->id);

        $sub->status = $sub->status == 1 ? 0 : 1;
        $sub->save();

        return response()->json([
            'status' => true,
            'new_status' => $sub->status
        ]);
    }
}
