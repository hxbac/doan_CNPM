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
            'search' => $request->input('search'),
            'category' => $request->input('category'),
        ];

        $products = Product::query();
        if ($query['ram']) {
            $products = $products->where('ram', $query['ram']);
        }
        if ($query['memory']) {
            $products = $products->where('memory', $query['memory']);
        }
        if ($query['price']) {
            switch ($query['price']) {
                case 1:
                    $products = $products->where('price', '<', 5000000);
                    break;
                case 2:
                    $products = $products->where('price', '>=', 5000000)->where('price', '<=', 10000000);
                    break;
                case 3:
                    $products = $products->where('price', '>=', 10000000)->where('price', '<=', 15000000);
                    break;
                case 4:
                    $products = $products->where('price', '>=', 15000000)->where('price', '<=', 20000000);
                    break;
                case 5:
                    $products = $products->where('price', '>=', 20000000);
                    break;
            }
        }
        if ($query['search']) {
            $products = $products->where('name', 'LIKE', '%'. $query['search'] .'%');
        }
        if ($query['category']) {
            $products = $products->where('id_category', $query['category']);
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
