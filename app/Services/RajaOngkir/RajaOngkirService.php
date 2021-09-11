<?php

namespace App\Services\RajaOngkir;

use App\Models\RajaOngkir\Provinsi;
use App\Models\RajaOngkir\Kota;
use App\Repositories\RajaOngkir\RajaOngkirRepository;

class RajaOngkirService{

    protected $rajaOngkirRepository;

    public function __construct()
    {
        $this->rajaOngkirRepository = new RajaOngkirRepository;
    }

    public function getDataProvinsi(){
        $client = $this->rajaOngkirRepository->getClient();
        try {
            $res = $client->request('GET', 'https://api.rajaongkir.com/starter/province?key=28bfff5b05cbee8666bb749b8e0965e5');

            $response = json_decode($res->getBody()->getContents(),true);
            collect($response['rajaongkir']['results'])
            ->each(function($data) {
                Provinsi::updateOrCreate([
                    'province' => $data['province']
                ]);
            });

            return returnCustom('Sukses Load Data Provinsi');
        } catch (\Throwable $e) {
            return returnCustom($e->getMessage());
        }
    }

    public function getDataKota(){
        $client = $this->rajaOngkirRepository->getClient();

        try {
            $res = $client->request('GET', 'https://api.rajaongkir.com/starter/city?key=28bfff5b05cbee8666bb749b8e0965e5');

            $response = json_decode($res->getBody()->getContents(),true);
            collect($response['rajaongkir']['results'])
            ->each(function($data) {
                Kota::updateOrCreate([
                    'province_id' => $data['province_id'],
                    'city' => $data['city_name']
                ]);
            });

            return returnCustom('Sukses Load Data Kota');
        } catch (\Throwable $e) {
            return returnCustom($e->getMessage());
        }
    }
}
