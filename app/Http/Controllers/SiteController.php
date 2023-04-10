<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\Region;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        /*Seleziono le due provincie*/
        $regions = Region::all();


        return view('welcome', compact('regions'));
    }

    public function profile()
    {
        return view('profile');
    }
}
