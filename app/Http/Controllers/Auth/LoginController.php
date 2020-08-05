<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    protected function redirectTo() {
        //$user = new User;
        $user = Auth::user()->id;
        \Debugbar::info($user);
        $profile = Profile::where('user_id', $user)->first();
        \Debugbar::info($profile);
        if(empty($profile)) {
             return '/profile/create';
        }else{
            return '/home';
        }
     }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '\home'; 
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function authenticated(\Illuminate\Http\Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }
        return redirect()->intended($this->redirectPath());
    }

}
