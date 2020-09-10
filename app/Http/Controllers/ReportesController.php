<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Bar;
use App\Campus;
use App\Menu;
use App\Preferencia;

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
        $campus=Campus::all();
        $bares=Bar::join('campuses', 'bars.campus_id', '=', 'campuses.id')
        ->select('bars.nombre','bars.abierto','bars.campus_id')
        ->where('bars.abierto','1')
        ->get();
        return view('reportes.BaresDisponibles',compact('bares', 'campus'));
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

    public function PreferenciaDia(Request $request)
    {
        $bares = Bar::all();
        $menus = Menu::all();
        $preferencias = DB::table('preferencias')
        ->join('menus', 'preferencias.menu_id', '=', 'menus.id')
        ->select('menus.nombre', 'preferencias.fecha', DB::raw('count(menu_id) as contador'))
        ->where('menus.id','=',$request->id)
        ->groupBy('menus.nombre', 'preferencias.fecha')
        ->get();

        return view('reportes.PreferenciaDia',compact('bares','menus','preferencias'));
    }
}
