<?php

namespace App\Services\KategoriTrip;

use App\Models\PaketTrip\KategoriTrip;
use App\Repositories\KategoriTrip\KategoriTripRepository;
use Illuminate\Support\Facades\Storage;

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

                if (isset($data['image'])) {
                    Storage::delete('public/'.$findId->image);
                    $data['image'] = $request->file('image')->store('admin-embara/kategori-trip', 'public');
                }

                $findId->update($data);
                return returnCustom('Category was successfully edited', true);
            } else {
                if ($data['image']) {
                    $data['image'] = $request->file('image')->store('admin-embara/kategori-trip', 'public');
                }

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
