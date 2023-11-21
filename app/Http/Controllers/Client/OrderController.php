<?php

namespace App\Http\Controllers\Client;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        $user = Auth::user();
        $orders = Order::where('userID', $user->id)->orderBy('id', 'DESC')->get();
        return view('client.order.index', ['orders' => $orders]);
    }

    public function detail($id) {
        $order = Order::where('id', $id)->where('userID', Auth::id())->firstOrFail();
        $orderDetail = OrderDetail::select('products.*', 'order_details.quantity', 'order_details.price')
            ->join('products', 'products.id', 'order_details.productID')
            ->where('orderID', $order->id)
            ->get();
        return view('client.order.detail', [
            'order' => $order,
            'orderDetail' => $orderDetail
        ]);
    }

    public function cancel($id) {
        $order = Order::where('id', $id)
            ->where('userID', Auth::id())
            ->where('status', OrderStatus::ORDER)
            ->firstOrFail();
        $order->status = OrderStatus::CANCEL_ORDER;
        $order->message = 'Người dùng hủy đặt hàng';
        $order->save();
        return redirect()->route('order.index');
    }
}
