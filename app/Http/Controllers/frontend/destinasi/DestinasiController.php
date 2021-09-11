<?php

namespace App\Http\Controllers\frontend\destinasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Destinasi\DestinasiService;

class DestinasiController extends Controller
{
    protected $destinasiService;

    public function __construct()
    {
        $this->destinasiService = new DestinasiService;
    }
    public function index(){
        $paketTrip = $this->destinasiService->getDestininasi(6);
        return view('frontend.pages.destinasi.destinasi', compact('paketTrip'));
    }


    public function details($id){
        $paketTrip = $this->destinasiService->getDetail($id);
        return view('frontend.pages.destinasi.destinasi-details', compact('paketTrip'));
    }

    public function cart(){
        return view('frontend.pages.cart.cart');
    }

    public function addToCart($id){
        $this->destinasiService->addToCart($id);
        return redirect('/destinasi')->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request){
        $this->destinasiService->updateCart($request);
    }

    public function deleteCart(Request $request){
        $this->destinasiService->deleteCart($request);
    }
}
