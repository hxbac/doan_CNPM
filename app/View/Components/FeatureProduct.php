<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class FeatureProduct extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // $products = Product::query()->orderBy('created_at', 'DESC')->take(8)->get();
        $products = Product::query()
            ->leftJoin(
                DB::raw('(
                    SELECT productID, SUM(quantity) AS total_quantity FROM order_details
                    GROUP BY productID
                ) AS total'),
                'products.id', 'total.productID'
            )
            ->orderBy('total.total_quantity', 'DESC')
            ->take(8)
            ->get();
        return view('components.feature-product', [
            'products' => $products
        ]);
    }
}
