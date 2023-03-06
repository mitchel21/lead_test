<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function fetchCity(Request $request)
        {
            $data['cities'] = City::where("province_id", $request->province_id)
                ->get(["name", "id"]);
            return response()->json($data);
        }
}
