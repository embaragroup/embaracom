<?php

namespace App\Repositories\RegisterAgent;

use App\Models\Agent\Agent;

class RegisterAgentRepository {

    public function findByEmail($email)
    {
        return Agent::where('email', $email)->first();
    }

}
