<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Show list product
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $query = [
            'ram' => $request->input('ram'),
            'memory' => $request->input('memory'),
            'price' => $request->input('price'),
            'search' => $request->input('search'),
            'category' => $request->input('category'),
        ];

        $products = Product::query()
            ->leftJoin(
                DB::raw('(
                    SELECT productID, SUM(quantity) AS total_quantity FROM order_details
                    GROUP BY productID
                ) AS total'),
                'products.id', 'total.productID'
            );
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
            'products' => $products->paginate(6),
            'query' => $query,
        ]);
    }

    /**
     * Show product detail
     *
     * @param string $slug
     * @param integer $id
     * @return \Illuminate\Contracts\View\View
     */
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
