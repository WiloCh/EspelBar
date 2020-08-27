<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Snack;

class PublicController extends Controller
{
    public function index()
    {   
        $menus = Menu::all();
        $snacks = Snack::all();
        return view('welcome',compact('snacks','menus'));
    }
}
