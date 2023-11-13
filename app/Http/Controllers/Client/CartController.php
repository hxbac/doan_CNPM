<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $cart = Cart::select('products.*', 'carts.quantity')
            ->join('products', 'products.id', 'carts.productID')
            ->where('carts.userID', Auth::id())
            ->get();

        return view('client.cart.index', [
            'cart' => $cart,
        ]);
    }

    public function add(Request $request) {
        $productID = $request->productID;
        $quantity = $request->quantity;
        $user = Auth::user();
        $checkExist = Cart::where('userID', $user->id)->where('productID', $productID)->first();
        if ($checkExist) {
            $checkExist->quantity += $quantity;
            $checkExist->save();
        } else {
            Cart::insert([
                'userID' => $user->id,
                'productID' => $productID,
                'quantity' => $quantity,
            ]);
        }
        return redirect()->route('cart.index');
    }

    public function remove($productID) {
        Cart::where('userID', Auth::id())->where('productID', $productID)->delete();
        return redirect()->route('cart.index');
    }
}
