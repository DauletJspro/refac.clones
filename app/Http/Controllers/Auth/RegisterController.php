<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserInfo;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'last_name' => ['required', 'min:2'],
            'username' => ['required'],
            'social_id' => ['required'],
            'phone' => ['required'],
            'inviter_id' => ['required'],
            'sponsor_id' => []
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'username' => $data['username'],
                'is_active' => $data['is_active'],
                'activated_date' => date('Y-m-d H:i:s'),
                'inviter_id' => $data['inviter_id'],
            ]);

            $userInfo = UserInfo::create([
                'user_id' => $user->id,
                'last_name' => $data['last_name'],
                'speaker_id' => $data['speaker_id'],
                'office_director_id' => $data['office_director_id'],
                'is_speaker' => false,
                'is_director_office' => false,
                'office_id' => 1, ## TODO correct value
                'social_id' => $data['social_id'],
                'sponsor_id' => $data['sponsor_id']
            ]);

            $user->assignRole('client');
            DB::commit();
            return $user;
        } catch (\Exception $exception) {
            DB::rollback();
            var_dump($exception->getLine() . ' ' . $exception->getMessage());
        }

    }
}
