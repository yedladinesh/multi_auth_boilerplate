<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Auth;

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
        $this->middleware('guest')->except('attemptLogout');
        $this->middleware('guest:admin')->except('attemptLogout');
        $this->middleware('guest:editor')->except('attemptLogout');
    }

    // attemptLogin
    public function attemptLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if($request->role_id === "1"){
            $customerAttempt = Auth::guard('admin')->attempt($this->credentials($request), $request->has('remember'));
            if($customerAttempt){
                return redirect()->intended('/admin');
            }
            $this->commmonValidation("email");
        }else{
            $customerAttempt = Auth::guard('editor')->attempt($this->credentials($request), $request->has('remember'));
            if($customerAttempt){
                return redirect()->intended('/editor');
            }
            $this->commmonValidation("email");
        }
    }

    public function commmonValidation($variable)
    {
        throw ValidationException::withMessages([
            $variable => [trans('auth.failed')],
        ]);
    }


    public function attemptLogout(Request $request)
    {
        if(Auth::guard('admin')->check()){
             Auth::guard('admin')->logout();
        }else{
            Auth::guard('editor')->logout();
        }
        return redirect('/login');
    }

    
}
