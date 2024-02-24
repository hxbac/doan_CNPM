<?php

namespace App\Http\Controllers\Client;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Show list order for user
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $user = Auth::user();
        $orders = Order::where('userID', $user->id)->orderBy('id', 'DESC')->get();
        return view('client.order.index', ['orders' => $orders]);
    }

    /**
     * Show detail order
     *
     * @param integer $id order
     * @return \Illuminate\Contracts\View\View
     */
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

    /**
     * Handle user cancel order
     *
     * @param integer $id order
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
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
