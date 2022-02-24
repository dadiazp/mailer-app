<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;
use App\Models\User;
use Auth;

class MailController extends Controller
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
    public function home()
    {
        $users = User::where('is_active', 1)->get();
        $data['users'] = $users;
        return view('mail', $data);
    }

    public function index()
    {
        return datatables()->eloquent(Mail::query())
                           ->addColumn('btn', 'mail_actions')
                           ->addColumn('sender', function(Mail $mail) {
                             return $mail->sender->name;
                           })
                           ->rawColumns(['btn'])
                           ->toJson();
    }

    public function create(Request $request) 
    {

    }
}
