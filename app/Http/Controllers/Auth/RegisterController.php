<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validatorArray = [
            'name' => ['required', 'string', 'max:100'],
            'password' => ['sometimes', 'confirmed'],
            'birthday' => ['required', 'date', function($attribute, $value, $fail) {
                $age = Carbon::parse($value)->age;
                if ($age < 18) {
                    return $fail('El usuario debe ser mayor a 18 años de edad');
                };
            }],
            'phone_number' => ['sometimes', 'string', 'min:10', 'max:10'],
            'city_id' => ['required']
        ];

        if (!isset($data['id'])) {
            $validatorArray['password'] = ['required', 'string', 'min:8', 'confirmed'];
            $validatorArray['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
            $validatorArray['id_number'] = ['required', 'string', 'max:11'];

        }

        return Validator::make($data, $validatorArray);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::find($data['id']);

        if (!isset($data['password']) && isset($user)) {
            $password =  $user->password;
        } else {
            $password = Hash::make($data['password']);
        }

        return User::updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => $password,
            'id_number' => $data['id_number'],
            'birthday' => $data['birthday'],
            'city_id' => $data['city_id']
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath())->with('message', 'Registro guardado exitosamente');
    }
}
