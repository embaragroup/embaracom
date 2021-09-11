<?php

namespace App\Repositories\AdminEmbara;

use App\Models\AdminEmbara\AdminEmbara;

class AdminEmbaraRepository {

    public function getAdmin()
    {
        $dataAdmin = AdminEmbara::with([])->get();
        return $dataAdmin;
    }

    public function findById($id)
    {
        return AdminEmbara::with([])->find($id);
    }
}
