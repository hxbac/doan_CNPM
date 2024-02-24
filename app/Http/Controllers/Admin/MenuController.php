<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Show list menu
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $menus = Menu::get();
        return view("admin.menu.index", [
            "listMenus" => $menus
        ]);
    }

    /**
     * Show form create menu
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.menu.create");
    }

    /**
     * Handle create menu
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Menu::create([
            "name" => $request->name,
            "route" => $request->route,
            "order" =>$request->order
        ]);
        return redirect()->route('admin.menu.index');
    }

    /**
     * Show form edit menu
     *
     * @param integer $id menu
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view("admin.menu.edit",[
            "itemMenu" => $menu
        ]);
    }

    /**
     * Handle update menu
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $menu = Menu::findOrFail($request->id);
        $menu->name = $request->name;
        $menu->route = $request->route;
        $menu->order = $request->order;

        $menu->save();

        return redirect()->route('admin.menu.index');
    }

    /**
     * Handle delete menu
     *
     * @param integer $id menu
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('admin.menu.index');
    }
}
