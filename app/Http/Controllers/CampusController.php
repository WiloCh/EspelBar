<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CampusPostRequest;
use App\Campus;
use Illuminate\Support\Facades\Gate;


class CampusController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $campuses = Campus::all();
        return view('campuses.index', compact('campuses'));
    }

    public function show(Request $request, Campus $campus)
    {
        return view('campuses.show', compact('campus'));
    }

    public function create()
    {
        return view('campuses.create');
    }

    public function store(CampusPostRequest $request)
    {
        $this->authorize('create', Campus::class);
        $data = $request->validated();
        $campus = Campus::create($data);
        return redirect()->route('campuses.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Campus $campus)
    {
        $this->authorize('edit', $campus);
        return view('campuses.edit', compact('campus'));
    }

    public function update(CampusPostRequest $request, Campus $campus)
    {
        $this->authorize('edit', $campus);
        $data = $request->validated();
        $campus->fill($data);
        $campus->save();
        return redirect()->route('campuses.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Campus $campus)
    {
        $this->authorize('delete', $campus);
        $campus->delete();
        return redirect()->route('campuses.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
