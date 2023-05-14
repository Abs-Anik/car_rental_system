<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required|max:255',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('username' => $input['username'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_admin == 1) {
                if($request->remember_me === null){
                    setcookie('login_username', $request->username,100);
                    setcookie('login_password', $request->password,100);
                }else{
                    setcookie('login_username', $request->username, time()+60*60*24*100);
                    setcookie('login_password', $request->password, time()+60*60*24*100);
                }
                $notification = array(
                    'Message' => 'Welcome Back!',
                    'alert-type' => 'success'
                );
                return redirect()->route('admin.dashboard')->with($notification);
            }else{
                if($request->remember_me === null){
                    setcookie('login_username', $request->username,100);
                    setcookie('login_password', $request->password,100);
                }else{
                    setcookie('login_username', $request->username, time()+60*60*24*100);
                    setcookie('login_password', $request->password, time()+60*60*24*100);
                }
                $notification = array(
                    'Message' => 'Welcome Back!',
                    'alert-type' => 'success'
                );
                return redirect()->route('user.dashboard')->with($notification);
            }
        }else{

            $notification = array(
                'Message' => 'Invalid Username or Password!',
                'alert-type' => 'warning'
            );
            return redirect()->route('login')->with($notification);
        }

    }
}
