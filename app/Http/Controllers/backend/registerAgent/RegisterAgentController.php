<?php

namespace App\Http\Controllers\backend\registerAgent;

use App\Http\Controllers\Controller;
use App\Services\RegisterAgent\RegisterAgentService;
use Illuminate\Http\Request;

class RegisterAgentController extends Controller
{
    protected $registerAgentService;

    public function __construct()
    {
        $this->registerAgentService = new RegisterAgentService;
    }

    public function registerAgent()
    {
        return view('backend.adminBackend.pages.agent.register');
    }

    public function registerAgentPost(Request $request)
    {
        $result = $this->registerAgentService->registerPost($request->all());
        alertNotify($result['status'], $result['message'], $request);
        if (!$result['status']) {
            return redirect()->back();
        }
        return redirect('admin-embara/agent');
    }
}
