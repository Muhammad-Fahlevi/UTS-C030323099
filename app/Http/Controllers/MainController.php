<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function view () {
        $mains = Main::all(); 
        return view('index', ['mains' => $mains]); 
    }
}
