<?php

namespace App\Repositories\Auth;
use App\Models\Agent\Agent;

class AuthAgentRepository {

    public function findByEmail($email)
    {
        return Agent::where('email', $email)->first();
    }

}
