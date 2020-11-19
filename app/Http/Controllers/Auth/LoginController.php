<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function redirectTo()
    {
         $roles =auth()->user()->getRoleNames();//getRoleNames

        if($roles[0] == 'customer'){
            $user=auth()->user()->customer;
            if($user->status==1)
            {
                Session::flash('message', "Your account has been suspended. Please contact administrator");
                Auth::logout();
                return 'frontendlogin';
            }else{

                return '/';
            }

        }
        elseif($roles[0] == 'deliver')
        {
            $user=auth()->user()->deliver;
            if($user->status==1)
            {
                Session::flash('message', "Your account has been suspended. Please contact administrator");
                Auth::logout();
                return 'frontendlogin';
            }else{
               return '/'; 
            }

        }else{
            return 'customer';
        }
           
            //Check user role
            // switch ($roles[0]) {
            //     case 'admin':
            //         return 'customer';
            //         break;

            //         default:
            //             return '/';
            // }
        

    }

}
