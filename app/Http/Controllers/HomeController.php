<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin() {
        $countries = Country::all();
        $data['countries'] = $countries;

        return view('admin', $data);
    }
}
