<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SnackPostRequest;
use App\Snack;
use Illuminate\Support\Facades\Gate;


class SnackController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $snacks = Snack::all();
        return view('snacks.index', compact('snacks'));
    }

    public function show(Request $request, Snack $snack)
    {
        return view('snacks.show', compact('snack'));
    }

    public function create()
    {
        $this->authorize('create', Snack::class);
        return view('snacks.create');
    }

    public function store(SnackPostRequest $request)
    {
        $data = $request->validated();
        $snack = Snack::create($data);
        return redirect()->route('snacks.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Snack $snack)
    {
        $this->authorize('edit', $snack);
        return view('snacks.edit', compact('snack'));
    }

    public function update(SnackPostRequest $request, Snack $snack)
    {
        $this->authorize('update', $snack);
        $data = $request->validated();
        $snack->fill($data);
        $snack->save();
        return redirect()->route('snacks.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Snack $snack)
    {
        $this->authorize('delete', $snack);
        $snack->delete();
        return redirect()->route('snacks.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
