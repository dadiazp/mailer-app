<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCitiesByState($state_id) {
        $city = City::select('id', 'name')
                      ->where('state_id', $state_id)
                      ->get()
                      ->toArray();

        return response()->json($city);
    }
}
