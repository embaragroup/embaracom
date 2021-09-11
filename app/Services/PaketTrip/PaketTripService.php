<?php

namespace App\Services\PaketTrip;

use App\Models\PaketTrip\PaketTrip;
use App\Repositories\PaketTrip\PaketTripRepository;
use App\Repositories\RajaOngkir\RajaOngkirRepository;
use App\Repositories\PaketTrip\KategoriTripRepository;
use Illuminate\Support\Facades\Storage;

class PaketTripService {
    protected $paketTripRepository;
    protected $rajaOngkirRepository;
    protected $kategoriTripRepository;

    public function __construct()
    {
        $this->paketTripRepository = new PaketTripRepository;
        $this->rajaOngkirRepository = new RajaOngkirRepository;
        $this->kategoriTripRepository = new KategoriTripRepository;
    }

    public function getAllPaketTrip($paginate)
    {
        try {
            $paketTrip = $this->paketTripRepository->getAllPaketTrip($paginate);
            if (!$paketTrip) {
                return returnCustom("Data does not exist!");
            }
            return $paketTrip;
        } catch (\Exception $e) {
            return returnCustom($e->getMessage());
        }
    }

    public function getDataProvinsi(){
        try {
            $dataProvinsi = $this->rajaOngkirRepository->getDataProvinsi();
            if (!$dataProvinsi) {
                return returnCustom("Data does not exist!");
            }
            return $dataProvinsi;
        } catch (\Exception $e) {
            return returnCustom($e->getMessage());
        }
    }

    public function getDataKota($id){
        try {
            $dataKota = $this->rajaOngkirRepository->getDataKota($id);
            if (!$dataKota) {
                return returnCustom("Data does not exist!");
            }
            return $dataKota;
        } catch (\Exception $e) {
            return returnCustom($e->getMessage());
        }
    }

    public function getDataKategoriTrip(){
        try {
            $dataKategori = $this->kategoriTripRepository->getDataKategoriTrip();
            if (!$dataKategori) {
                return returnCustom("Data does not exist!");
            }
            return $dataKategori;
        } catch (\Exception $e) {
            return returnCustom($e->getMessage());
        }
    }

    public function findById($id)
    {
        try {
            $paketTrip = $this->paketTripRepository->findById($id);
            if (!$paketTrip) {
                return returnCustom("Data does not exist!");
            }
            return $paketTrip;
        } catch (\Exception $e) {
            return returnCustom($e->getMessage());
        }
    }

    public function saveAndEdit($request, $id = null)
    {
        try {
            $data = $request->all();
            if ($id) {
                $findId = $this->paketTripRepository->findById($id);
                if (!$findId) {
                    return returnCustom("Data does not exist!");
                }

                if (isset($data['cover_image'])) {
                    Storage::delete('public/'.$findId->cover_image);
                    $data['cover_image'] = $request->file('cover_image')->store('agent/produk', 'public');
                }
                if (isset($data['detail_image'])) {
                    if (count(json_decode($findId->detail_image)) > 1) {
                        foreach (json_decode($findId->detail_image) as $lastImage) {
                            Storage::delete('public/'. $lastImage);
                        }
                    } else {
                        $lastImage = json_decode($findId->detail_image)[0];
                        Storage::delete('public/'. $lastImage);
                    }

                    if (count($data['detail_image']) > 1) {
                        foreach($data['detail_image'] as $file){
                            $image2[] = $file->store('agent/produk', 'public');
                        }
                    } else {
                        $image2[] = $data['detail_image'][0]->store('agent/produk', 'public');
                    }

                    $data['detail_image'] = json_encode($image2, JSON_UNESCAPED_SLASHES);
                }
                $findId->update($data);
                return returnCustom("Berhasil mengedit paket trip", true);
            } else {
                if ($data['cover_image']) {
                    $data['cover_image'] = $request->file('cover_image')->store('agent/produk', 'public');
                }

                if ($request->hasFile('detail_image')) {
                    foreach($data['detail_image'] as $file){
                        $image[] = $file->store('agent/produk', 'public');
                    }
                    $data['detail_image'] = json_encode($image, JSON_UNESCAPED_SLASHES);
                }

                PaketTrip::create($data);
                return returnCustom("Berhasil membuat paket trip", true);
            }
        } catch (\Exception $e) {
            return returnCustom($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $findId = $this->findById($id);
            Storage::delete('public/'.$findId->cover_image);
            if (count(json_decode($findId->detail_image)) > 1) {
                foreach (json_decode($findId->detail_image) as $lastImage) {
                    Storage::delete('public/'. $lastImage);
                }
            } else {
                $lastImage = json_decode($findId->detail_image)[0];
                Storage::delete('public/'. $lastImage);
            }
            $findId->delete();
            return returnCustom("Berhasil menghapus paket trip", true);
        } catch (\Exception $e) {
            return returnCustom($e->getMessage());
        }
    }
}

