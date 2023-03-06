<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        /*Seleziono le due provincie*/
        $provinces = Province::where('name', 'Lodi')->orWhere('name', 'Milano')->get();


        return view('welcome', compact('provinces'));
    }

    public function profile()
    {
        return view('profile');
    }
}
