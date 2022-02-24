<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
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

    public function index() {
        return datatables()->eloquent(User::where('is_active', 1))
                           ->filterColumn('age', function($query, $keyword) {
                                $sql = "TIMESTAMPDIFF(YEAR,users.birthday,CURDATE()) like ?";
                                $query->whereRaw($sql, ["%{$keyword}%"]);
                            })
                           ->addColumn('btn', 'actions')
                           ->rawColumns(['btn'])
                           ->toJson();
    }

    public function destroy($user_id) {
        $user = User::find($user_id);
        $user->is_active = 0;
        $user->save();

        return redirect('admin')->with('deleted_message', 'Registro eliminado exitosamente');
    }
}
