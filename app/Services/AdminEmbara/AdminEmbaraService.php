<?php

namespace App\Services\AdminEmbara;

use App\Models\AdminEmbara\AdminEmbara;
use App\Repositories\AdminEmbara\AdminEmbaraRepository;

class AdminEmbaraService
{
    protected $adminEmbaraRepository;

    public function __construct()
    {
        $this->adminEmbaraRepository = new AdminEmbaraRepository();
    }

    public function getAdminEmbara()
    {
        try {
            $AdminEmbara = $this->adminEmbaraRepository->getAdmin();
            if (!$AdminEmbara) {
                return returnCustom("Data does not exist!");
            }
            return $AdminEmbara;
        } catch (\Throwable $th) {
            return returnCustom($th->getMessage());
        }
    }

    public function findById ($id)
    {
        try {
            $dataAdminEmbara = $this->adminEmbaraRepository->findById($id);
            if (!$dataAdminEmbara) {
                return returnCustom("Data does not exist!");
            }
            return $dataAdminEmbara;
        } catch (\Throwable $th) {
            return returnCustom($th->getMessage());
        }
    }

    public function storeAdminEmbara($request, $id = null)
    {
        try {
            $data = $request->all();
            if ($id) {
                $findId = $this->adminEmbaraRepository->findById($id);
                if (!$findId) {
                    return returnCustom("Data does not exist!");
                }
                $findId->update($data);
                return returnCustom("Product was successfully edited", true);
            } else {
                AdminEmbara::create($data);
                return returnCustom('Created Successfully', true);
            }
        } catch (\Throwable $th) {
            return returnCustom($th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $findId = $this->adminEmbaraRepository->findById($id);
            $findId->delete();
            return returnCustom("Product delete successfully", true);
        } catch (\Throwable $th) {
            return returnCustom($th->getMessage());
        }
    }
}
