<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.embara.pages.dashboard.dashboard');
    }

    // Backend Embara
    public function backendEmbara ()
    {
        return view('backend.adminBackend.pages.dashboard.dashboard');
    }
}
