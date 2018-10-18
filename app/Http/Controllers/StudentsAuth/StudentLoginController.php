<?php

namespace App\Http\Controllers\StudentsAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class StudentLoginController extends Controller
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

    public function username()
    {
        return 'username';
    }

    public function showLoginForm()
    {
        return view('StudentsAuth.studentsLogin');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('student')->attempt(['username' => $request->username,
            'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('student.dashboard'));
        }
        session()->flash('alert','Incorrect username/password!');
        return redirect()->back()->withInput($request->only('username','remember'));
    }

    public function studentLogout()
    {
        Auth::guard('student')->logout();
        //return redirect('/');
        return redirect(\URL::previous());
    }
}
