<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Show list category
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index',
        ["listCategories" => $categories]);
    }

    /**
     * Show view create category
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Handle create category
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Category::create([
            "name" => $request->name,
            "describe" => $request->describe
        ]);
        return redirect()->route('admin.category.index');
    }

    /**
     * Show view edit category
     *
     * @param integer $id category
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', [
            "itemCategory" => $category
        ]);
    }

    /**
     * Handle update category
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->describe = $request->describe;

        $category->save();

        return redirect()->route('admin.category.index');
    }

    /**
     * Handle delete category
     *
     * @param integer $id category
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index');
    }
}
