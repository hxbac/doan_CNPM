<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::select('orders.*', 'users.name')
            ->join('users', 'users.id', 'orders.userID')
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.order.index', [
            'orders' => $orders,
        ]);
    }

    public function detail($id) {
        $order = Order::where('id', $id)->firstOrFail();
        $orderDetail = OrderDetail::select('products.*', 'order_details.quantity', 'order_details.price')
            ->join('products', 'products.id', 'order_details.productID')
            ->where('orderID', $order->id)
            ->get();
        return view('admin.order.detail', [
            'order' => $order,
            'orderDetail' => $orderDetail
        ]);
    }

    public function accept($id) {
        $order = Order::where('status', OrderStatus::ORDER)->where('id', $id)->firstOrFail();
        $order->status = OrderStatus::CONFIRM_ORDER;
        $order->message = Auth::user()->name . ' đã xác nhận đơn hàng.';
        $order->save();
        return redirect()->route('admin.order.index');
    }

    public function success($id) {
        $order = Order::where('status', OrderStatus::CONFIRM_ORDER)->where('id', $id)->firstOrFail();
        $order->status = OrderStatus::ORDER_SUCCESS;
        $order->message = Auth::user()->name . ' đã xác nhận đơn hàng giao thành công.';
        $order->save();
        return redirect()->route('admin.order.index');
    }

    public function cancel(Request $request, $id) {
        $order = Order::where('status', OrderStatus::ORDER)->where('id', $id)->firstOrFail();
        $order->status = OrderStatus::CANCEL_ORDER;
        // $order->message = $request->reason;
        $order->message = Auth::user()->name . ' đã hủy đơn hàng.';
        $order->save();
        return redirect()->route('admin.order.index');
    }
}
