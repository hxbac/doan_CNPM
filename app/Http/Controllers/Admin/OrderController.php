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
    /**
     * Show list order
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $orders = Order::select('orders.*', 'users.name')
            ->join('users', 'users.id', 'orders.userID')
            ->orderBy('orders.id', 'DESC')
            ->get();
        return view('admin.order.index', [
            'orders' => $orders,
        ]);
    }

    /**
     * Show detail order
     *
     * @param integer $id order
     * @return \Illuminate\Contracts\View\View
     */
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

    /**
     * Handle update status accept order
     *
     * @param integer $id order
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function accept($id) {
        $order = Order::where('status', OrderStatus::ORDER)->where('id', $id)->firstOrFail();
        $order->status = OrderStatus::CONFIRM_ORDER;
        $order->message = Auth::user()->name . ' đã xác nhận đơn hàng.';
        $order->save();
        return redirect()->route('admin.order.detail', [
            'id' => $id
        ]);
    }

    /**
     * Handle update status success order
     *
     * @param integer $id order
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function success($id) {
        $order = Order::where('status', OrderStatus::CONFIRM_ORDER)->where('id', $id)->firstOrFail();
        $order->status = OrderStatus::ORDER_SUCCESS;
        $order->message = Auth::user()->name . ' đã xác nhận đơn hàng giao thành công.';
        $order->save();
        return redirect()->route('admin.order.detail', [
            'id' => $id
        ]);
    }

    /**
     * Handle update status cancel order
     *
     * @param integer $id order
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function cancel($id) {
        $order = Order::where('status', OrderStatus::ORDER)->where('id', $id)->firstOrFail();
        $order->status = OrderStatus::CANCEL_ORDER;
        // $order->message = $request->reason;
        $order->message = Auth::user()->name . ' đã hủy đơn hàng.';
        $order->save();
        return redirect()->route('admin.order.detail', [
            'id' => $id
        ]);
    }
}
