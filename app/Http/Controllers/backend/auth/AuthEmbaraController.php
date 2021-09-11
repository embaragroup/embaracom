<?php

namespace App\Http\Controllers\backend\auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\AuthEmbaraService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthEmbaraController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3;
    protected $decayMinutes = 5;
    protected $authEmbaraService;

    public function __construct()
    {
        $this->middleware('guest:admin-embara')->except('Logout');
        $this->authEmbaraService = new AuthEmbaraService;
    }

    protected function guard()
    {
        return Auth::guard('admin-embara');
    }

    public function Login()
    {
        return view('backend.adminBackend.pages.auth.login');
    }

    public function username()
    {
        return 'email';
    }

    public function LoginPost(Request $request)
    {
        $result = $this->authEmbaraService->LoginPost($request->all());
        alertNotify($result['status'], $result['message'], $request);
        if (!$result['status']) {
            $this->incrementLoginAttempts($request);
            return redirect()->back();
        } else {
            if (auth()->guard('admin-embara')->attempt($request->only('email', 'password'))) {
                $request->session()->regenerate();
                $this->clearLoginAttempts($request);
                return redirect()->intended('/admin-embara');
            }
        }
    }

    public function Logout(Request $request)
    {
        $result = $this->authEmbaraService->Logout();
        alertNotify($result['status'], $result['message'], $request);

        if (!$result['status']) {
            return redirect()->back();
        }

        $sessionKey = $this->guard()->getName();
        $this->guard()->logout();
        $request->session()->forget($sessionKey);
        return redirect('/admin-embara/login');
    }
}
