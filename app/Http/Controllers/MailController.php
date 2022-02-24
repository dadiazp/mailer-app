<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMailRequest;
use App\Models\Mail;
use App\Models\User;
use App\Jobs\SendEmailJob;
use App\Mail\SendEmail;
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
        $data['usersMail'] = $users;
        return view('mail', $data);
    }

    public function index()
    {
        if (Auth::user()->is_admin) {
            return datatables()->eloquent(Mail::query())
                ->addColumn('btn', 'mail_actions')
                ->addColumn('recipient', function(Mail $mail) {
                    return $mail->recipient->email;
                })
                ->addColumn('sender', function(Mail $mail) {
                return $mail->sender->email;
                })
                ->rawColumns(['btn'])
                ->toJson();
        }

        return datatables()->eloquent(Mail::where('sender_id', Auth::user()->id)->orWhere('recipient_id', Auth::user()->id))
                ->addColumn('btn', 'mail_actions')
                ->addColumn('recipient', function(Mail $mail) {
                    return $mail->recipient->email;
                })
                ->addColumn('sender', function(Mail $mail) {
                return $mail->sender->email;
                })
                ->filterColumn('status', function($query, $keyword) {
                    $sql = "users.is_admin like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->orderColumn('status', false)
                ->rawColumns(['btn'])
                ->toJson();
      
    }

    public function create(CreateMailRequest $request) 
    {
        Mail::create($request->all());

        $pendingMails = Mail::where('is_sent', 0)->with('recipient')->get();
        SendEmailJob::dispatch($pendingMails);

        return redirect()->route('home.mails')->with('mail_message', 'Email enviado a la cola correctamente');
    }
}
