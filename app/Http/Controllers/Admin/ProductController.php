<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ()
    {
        $products = Product::get();
        return view('admin.product.index',
        [ "listProduct" => $products]);
    }

    public function create ()
    {
        $categories = Category::get();
        return view('admin.product.create', [
            "listCategory" => $categories
        ]);
    }

    public function store (Request $request)
    {
        Product::create([
            "id_category" => $request->id_category,
            "name" => $request->name,
            "image" => $request->image,
            "price" => $request->price,
            "describe" => $request->describe,
            "screen" => $request->screen,
            "cpu" => $request->cpu,
            "card" => $request->card,
            "battery" => $request->battery,
            "mass" => $request->mass
        ]);
        return redirect()->route('admin.product.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view("admin.product.edit",[
            "itemProduct" => $product
        ]);
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->describe = $request->describe;
        $product->screen = $request->screen;
        $product->cpu = $request->cpu;
        $product->card = $request->card;
        $product->battery = $request->battery;
        $product->mass = $request->mass;
        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
