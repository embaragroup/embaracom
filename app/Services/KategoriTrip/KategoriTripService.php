<?php

namespace App\Services\KategoriTrip;

use App\Models\PaketTrip\KategoriTrip;
use App\Repositories\KategoriTrip\KategoriTripRepository;

class KategoriTripService
{
    protected $kategoriTripRepository;

    public function __construct()
    {
        $this->kategoriTripRepository = new KategoriTripRepository();
    }

    public function getDataKategori()
    {
        try {
            $kategori = $this->kategoriTripRepository->getKategori();
            if (!$kategori) {
                return returnCustom("Data does not exist!");
            }
            return $kategori;
        } catch (\Throwable $th) {
            return returnCustom($th->getMessage());
        }
    }

    public function findById ($id)
    {
        try {
            $dataKategoriTrip = $this->kategoriTripRepository->findById($id);
            if (!$dataKategoriTrip) {
                return returnCustom("Data does not exist!");
            }
            return $dataKategoriTrip;
        } catch (\Throwable $th) {
            return returnCustom($th->getMessage());
        }
    }

    public function storeKategori($request, $id = null)
    {
        try {
            $data = $request->all();
            if ($id) {
                $findId = $this->kategoriTripRepository->findById($id);
                if (!$findId) {
                    return returnCustom("Data does not exist!");
                }
                $findId->update($data);
                return returnCustom('Category was successfully edited', true);
            } else {
                KategoriTrip::create($data);
                return returnCustom('Created Successfully', true);
            }
        } catch (\Throwable $th) {
            return returnCustom($th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $findId = $this->kategoriTripRepository->findById($id);
            $findId->delete();
            return returnCustom("Product delete successfully", true);
        } catch (\Throwable $th) {
            return returnCustom($th->getMessage());
        }
    }
}
