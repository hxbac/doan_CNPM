<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::get();
        return view("admin.menu.index", [
            "listMenus" => $menus
        ]);
    }

    public function create()
    {
        return view("admin.menu.create");
    }

    public function store(Request $request)
    {
        Menu::create([
            "name" => $request->name,
            "route" => $request->route,
            "order" =>$request->order
        ]);
        return redirect()->route('admin.menu.index');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        return view("admin.menu.edit",[
            "itemMenu" => $menu
        ]);
    }

    public function update(Request $request)
    {
        $menu = Menu::find($request->id);
        $menu->name = $request->name;
        $menu->route = $request->route;
        $menu->order = $request->order;

        $menu->save();

        return redirect()->route('admin.menu.index');
    }

    public function delete($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('admin.menu.index');
    }
}
