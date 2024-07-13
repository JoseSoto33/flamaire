<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        $defaults = Ajuste::getGeneralData();
        return view('home.index', compact('defaults'));
    }
}
