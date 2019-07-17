<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use App\Student;
use App\UserSocialAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Role;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($driver){
       return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver){
        if(!request()->has('code') || request()->has('denied')){
            session()->flash('message',['danger','sessionFailed']);
            return redirect('login');
        }

        $socialUser = Socialite::driver($driver)->user();
      //  dd($socialUser);

       $user = null;
        $success = true;
        $email = $socialUser->email;
        $check =  User::whereEmail($email)->first();

        if($check){
            $user = $check;
        }else{
            DB::beginTransaction();
            try{

                 $user = User::create([
                     "name" => $socialUser->name,
                     "email" => $email,
                     "slug" => Str::slug($socialUser->name, '-'),
                     'role_id' => Role::STUDENT,
                   ]);
                  
                UserSocialAccount::create([
                   "user_id" => $user->id,
                   "provider"=> $driver,
                   "provider_uid" => $socialUser->id
                ]);

                Student::create([
                  "user_id" => $user->id
                ]);

            }catch(\Exception $exception){
                  $success = $exception->getMessage();
                  DB::rollBack();
            }
        }

            if($success === true){
                DB::commit();
                auth()->LoginUsingId($user->id);
                return redirect(route("home"));
            }

            session()->flash('message2', [$success]);
            return redirect("login");
        
    }
}
