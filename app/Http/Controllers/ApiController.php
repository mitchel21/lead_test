<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function fetchCity(Request $request)
        {
            $data['cities'] = City::where("province_id", $request->province_id)
                ->get(["name", "id"]);
            return response()->json($data);
        }
    public function fetchProvince(Request $request)
    {
        $data['provinces'] = Province::where("region_id", $request->region_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }
}
