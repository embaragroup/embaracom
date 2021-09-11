<?php

namespace App\Services\Destinasi;

use App\Repositories\Destinasi\DestinasiRepository;
use Illuminate\Support\Facades\Storage;

class DestinasiService {

    protected $destinasiRespository;

    public function __construct()
    {
        $this->destinasiRespository = new DestinasiRepository;
    }


    public function getDestininasi($paginate){
        try {
            $destinasi = $this->destinasiRespository->getDestinasi($paginate);
            if (!$destinasi) {
                return returnCustom("Data does not exist!");
            }
            return $destinasi;
        } catch (\Exception $e) {
            return returnCustom($e->getMessage());
        }
    }

    public function getDetail($id){
        try {
            $detail = $this->destinasiRespository->findById($id);
                if (!$detail) {
                    return returnCustom("Data does not exist!");
                }
            return $detail;

        } catch (\Throwable $e) {
            return returnCustom($e->getMessage());
        }
    }


    public function addToCart($id){
        try {
            $product = $this->destinasiRespository->findById($id);
            $cart = session()->get('cart', []);

            if(isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "name" => $product->title,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->cover_image
                ];
            }

            session()->put('cart', $cart);

        } catch (\Throwable $e) {
            return returnCustom($e->getMessage());
        }
    }

    public function updateCart($request){
        try {
            if($request->id && $request->quantity){
                $cart = session()->get('cart');
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                return session()->flash('success', 'Cart updated successfully');
            }
        } catch (\Throwable $e) {
            return returnCustom($e->getMessage());
        }
    }

    public function deleteCart($request){
        try {
            if($request->id) {
                $cart = session()->get('cart');
                if(isset($cart[$request->id])) {
                    unset($cart[$request->id]);
                    session()->put('cart', $cart);
                }

                return session()->flash('success', 'Product removed successfully');
            }
        } catch (\Throwable $e) {
            return returnCustom($e->getMessage());
        }
    }
}
