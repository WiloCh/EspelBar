<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Bar;
use App\Campus;

class ReportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public  function users()
    {
        $users=User::all();
        return view('reportes.users',compact('users'));
    }

    public function BaresDisponibles(Request $request)
    {
        $bares=DB::table('bars')
        ->join('campuses', 'bars.campus_id', '=', 'campuses.id')
        ->select('bars.nombre','bars.abierto','campuses.nombre')
        ->where('bars.abierto','1')
        ->groupBy('bars.nombre','bars.abierto','campuses.nombre') 
        ->get();
        return view('reportes.BaresDisponibles',compact('bares'));
    }

    public function ElementosDisponibles(Request $request)
    {
        $snacks=DB::table('snacks')
        ->join('bars', 'snacks.bar_id', '=', 'bars.id')
        ->select('snacks.nombre','snacks.precio','snacks.disponible')
        ->where('snacks.disponible','1')
        ->groupBy('snacks.nombre','snacks.precio','snacks.disponible') 
        ->get();

        $menus=DB::table('menus')
        ->join('bars', 'menus.bar_id', '=', 'bars.id')
        ->select('menus.nombre','menus.precio','menus.disponible')
        ->where('menus.disponible','1')
        ->groupBy('menus.nombre','menus.precio','menus.disponible') 
        ->get();

        return view('reportes.ElementosDisponibles',compact('snacks','menus'));
    }
}
