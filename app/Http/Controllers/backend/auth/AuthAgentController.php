<?php

namespace App\Http\Controllers\backend\auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\AuthAgentService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthAgentController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3;
    protected $decayMinutes = 5;
    protected $authAgentService;

    public function __construct()
    {
        $this->middleware('guest:agent')->except('Logout');
        $this->authAgentService = new AuthAgentService;
    }

    protected function guard()
    {
        return Auth::guard('agent');
    }

    public function Login()
    {
        return view('backend.agent.pages.auth.login');
    }

    public function username()
    {
        return 'email';
    }

    public function LoginPost(Request $request)
    {
        $result = $this->authAgentService->LoginPost($request->all());
        alertNotify($result['status'], $result['message'], $request);
        if (!$result['status']) {
            $this->incrementLoginAttempts($request);
            return redirect()->back();
        } else {
            if (auth()->guard('agent')->attempt($request->only('email', 'password'))) {
                $request->session()->regenerate();
                $this->clearLoginAttempts($request);
                return redirect()->intended('/admin');
            }
        }
    }

    public function Logout(Request $request)
    {
        $result = $this->authAgentService->Logout();
        alertNotify($result['status'], $result['message'], $request);

        if (!$result['status']) {
            return redirect()->back();
        }

        $sessionKey = $this->guard()->getName();
        $this->guard()->logout();
        $request->session()->forget($sessionKey);
        return redirect('/admin/login');
    }
}
