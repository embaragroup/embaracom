<?php

namespace App\Repositories\Auth;

use App\Models\AdminEmbara\AdminEmbara;

class AuthEmbaraRepository {

    public function findByEmail($email)
    {
        return AdminEmbara::where('email', $email)->first();
    }
}
