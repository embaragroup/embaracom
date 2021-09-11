<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use App\Models\PaketTrip\PaketTrip;
use App\Repositories\AdminEmbara\AdminEmbaraRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->AdminEmbaraRepository = new AdminEmbaraRepository;
    }

    public function index(){
        $adminBackend  = $this->AdminEmbaraRepository->getAdmin();
        $homePaketTrip = PaketTrip::with([])->paginate(3);
        return view('frontend.pages.home.home', compact('homePaketTrip', 'adminBackend'));
    }
}
