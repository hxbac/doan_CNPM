<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request) {
        $query = [
            'ram' => $request->input('ram'),
            'memory' => $request->input('memory'),
            'price' => $request->input('price'),
        ];

        $products = Product::query();
        if ($query['ram']) {
            $products = $products->where('ram', $query['ram']);
        }
        if ($query['memory']) {
            $products = $products->where('memory', $query['memory']);
        }

        return view('client.shop.index', [
            'products' => $products->paginate(9),
            'query' => $query,
        ]);
    }

    public function detail($slug, $id) {
        try {
            $product = Product::findOrFail($id);
            return view('client.shop.detail', [
                'product' => $product
            ]);
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
