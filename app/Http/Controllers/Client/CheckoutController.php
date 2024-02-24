<?php

namespace App\Http\Controllers\Client;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Show checkout page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $user = Auth::user();
        $cart = Cart::select('carts.*', 'products.price', 'products.name')
            ->join('products', 'products.id', 'carts.productID')
            ->where('userID', $user->id)
            ->get();
        return view('client.checkout.index', [
            'cart' => $cart,
        ]);
    }

    /**
     * Handle add order for user
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function order(Request $request) {
        $user = Auth::user();

        $order = Order::create([
            'userID' => $user->id,
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => 0,
            'status' => OrderStatus::ORDER,
            'note' => $request->note,
        ]);

        $dataOrderInsert = [];
        $total = 0;
        $cart = Cart::select('carts.*', 'products.price')
            ->join('products', 'products.id', 'carts.productID')
            ->where('userID', $user->id)
            ->get();
        foreach ($cart as $item) {
            array_push($dataOrderInsert, [
                'orderID' => $order->id,
                'productID' => $item->productID,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
            $total += $item->price * $item->quantity;
        }
        OrderDetail::insert($dataOrderInsert);

        $order->total = $total;
        $order->save();

        Cart::where('userID', $user->id)->delete();

        return redirect()->route('order.index');
    }
}
