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

        if(Auth::user()->hasRole('customer')){
            $user=auth()->user()->customer;
            //dd($user->status);

            if($user->status==1)
            {
                //$message = 'Your account has been suspended. Please contact administrator.';
                // return view('frontend.login')->withMessage($message);
                Session::flash('message', "Your account has been suspended. Please contact administrator");
                $this->redirectTo = 'frontendlogin';
                return $this->redirectTo;

            }

        }
        elseif (Auth::user()->hasRole('deliver'))
        {
            $user=auth()->user()->deliver;
            //dd($user->status);
            if($user->status==1)
            {
                Session::flash('message', "Your account has been suspended. Please contact administrator");
                $this->redirectTo = 'frontendlogin';
                return $this->redirectTo;
            }

        }
           
            //Check user role
            switch ($roles[0]) {
                case 'admin':
                    return 'customer';
                    break;

                    default:
                        return '/';
            }
        

    }

}
