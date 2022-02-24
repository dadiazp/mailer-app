<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
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

    public function getStatesByCountry($country_id) {
        $states = State::select('id', 'name')
                      ->where('country_id', $country_id)
                      ->get()
                      ->toArray();

        return response()->json($states);
    }
}
