<?php

namespace App\Http\Controllers\frontend\tentangKami;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index () {
        return view('frontend.pages.tentang.tentang');
    }
}
