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
        $products = Product::select('products.*', 'categories.name as category_name')
            ->join('categories', 'products.id_category', 'categories.id')
            ->get();
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
        $imgPath = $this->uploadFile($request->file('image'), 'product');
        Product::create([
            "id_category" => $request->id_category,
            "name" => $request->name,
            "image" => $imgPath,
            "price" => $request->price,
            "describe" => $request->describe,
            "screen" => $request->screen,
            "cpu" => $request->cpu,
            "card" => $request->card,
            "battery" => $request->battery,
            "mass" => $request->mass,
            "ram" => $request->ram,
            "memory" => $request->memory,
        ]);
        return redirect()->route('admin.product.index');
    }

    public function edit($id)
    {
        $categories = Category::get();
        $product = Product::findOrFail($id);
        return view("admin.product.edit",[
            "itemProduct" => $product,
            "listCategory" => $categories,
        ]);
    }

    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        if ($request->changeImage) {
            $imgPath = $this->uploadFile($request->file('image'), 'product');
            $product->image = $imgPath;
        }
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
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
