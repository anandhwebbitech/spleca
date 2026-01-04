<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class OrderController extends Controller
{
    //
    public function OrderFetch()
    {
        $orders = OrderItem::with([
            'order.user',
            'product'
        ])
            ->whereHas('order', function ($q) {
                $q->where('status', 2);
            });
        return DataTables()->of($orders)
            ->addIndexColumn()

            ->addColumn('order_id', function ($row) {
                return $row->order
                    ? 'ORD-' . $row->id
                    : '-';
            })

            ->addColumn('customer_name', function ($row) {
                return $row->order->user->name ?? '-';
            })

            ->addColumn('product_name', function ($row) {
                return $row->product->name ?? '-';
            })

            ->addColumn('discount', function ($row) {
                return number_format($row->discount ?? 0, 2);
            })

            ->addColumn('total_amount', function ($row) {
                return number_format($row->original_price ?? 0, 2);
            })

            ->addColumn('order_date', function ($row) {
                return optional($row->order->created_at)->format('d-m-Y');
            })

            ->addColumn('delivery_date', function ($row) {
                if (!empty($row->order->delivery_date)) {
                    return \Carbon\Carbon::parse($row->order->delivery_date)->format('d-m-Y');
                }
                return '-';
            })

            ->addColumn('status', function ($row) {
                switch ($row->order->order_status) {
                    case Order::Complete:
                        return '<span class="badge bg-success">Delivered</span>';

                    case Order::Cancel:
                        return '<span class="badge bg-danger">Cancelled</span>';

                    case Order::Return:
                        return '<span class="badge bg-info">Returned</span>';

                    default:
                        return '<span class="badge bg-warning">Pending</span>';
                }
            })

            ->addColumn('action', function ($row) {
                return '<a 
                        class="btn btn-sm btn-primary">
                        View
                    </a>';
            })

            ->rawColumns(['status', 'action'])
            ->make(true);
    }
    public function PaymentFetch()
    {
        $orders = Payment::with([
            'order',
        ]);
        return DataTables()->of($orders)
            ->addIndexColumn()
            ->addColumn('customer_name', function ($row) {
                return $row->order->user->name ?? '-';
            })

            ->addColumn('product_name', function ($row) {
                return $row->order->product->name ?? '-';
            })

            ->addColumn('total_amount', function ($row) {
                return number_format($row->amount ?? 0, 2);
            })
            ->rawColumns(['customer_name', 'product_name','total_amount'])
            ->make(true);
    }
}
