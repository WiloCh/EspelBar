<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuPostRequest;
use App\Menu;
use Illuminate\Support\Facades\Gate;


class MenuController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function show(Request $request, Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    public function create()
    {
        $this->authorize('create', Menu::class);
        return view('menus.create');
    }

    public function store(MenuPostRequest $request)
    {
        $data = $request->validated();
        $menu = Menu::create($data);
        return redirect()->route('menus.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Menu $menu)
    {
        $this->authorize('edit', $menu);
        return view('menus.edit', compact('menu'));
    }

    public function update(MenuPostRequest $request, Menu $menu)
    {
        $this->authorize('update', $menu);
        $data = $request->validated();
        $menu->fill($data);
        $menu->save();
        return redirect()->route('menus.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Menu $menu)
    {
        $this->authorize('delete', $menu);
        $menu->delete();
        return redirect()->route('menus.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
