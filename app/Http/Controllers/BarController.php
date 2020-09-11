<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BarPostRequest;
use App\Bar;
use Illuminate\Support\Facades\Gate;


class BarController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $bars = Bar::all();
        return view('bars.index', compact('bars'));
    }

    public function show(Request $request, Bar $bar)
    {
        return view('bars.show', compact('bar'));
    }

    public function create()
    {
        $this->authorize('create', Bar::class);
        return view('bars.create');
    }

    public function store(BarPostRequest $request)
    {   
        $data = $request->validated();
        $bar = Bar::create($data);
        return redirect()->route('bars.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Bar $bar)
    {
        $this->authorize('edit', $bar);
        return view('bars.edit', compact('bar'));
    }

    public function update(BarPostRequest $request, Bar $bar)
    {
        $this->authorize('update', $bar);
        $data = $request->validated();
        $bar->fill($data);
        $bar->save();
        return redirect()->route('bars.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Bar $bar)
    {
        $this->authorize('delete', $bar);
        $bar->delete();
        return redirect()->route('bars.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
