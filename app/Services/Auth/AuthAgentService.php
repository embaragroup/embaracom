<?php

namespace App\Services\Auth;

use App\Repositories\Auth\AuthAgentRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthAgentService {


    protected $authAgentrepository;

    public function __construct()
    {
        $this->authAgentrepository = new AuthAgentRepository;
    }

    public function LoginPost($data){
        try {
            $agent = $this->authAgentrepository->findByEmail($data['email']);
            if (!$agent) {
                return returnCustom("The email is wrong!");
            }
            if (!Hash::check($data['password'], $agent->password)) {
                return returnCustom("The password is wrong!");
            }
            return returnCustom("Yeay, you have successfully logged in.", true);
        } catch (\Throwable $e) {
            return returnCustom($e->getMessage());
        }
    }

    public function Logout()
    {
        try {
            return returnCustom("Successfully log out", true);
        } catch (\Exception $e) {
            return returnCustom($e->getMessage());
        }
    }
}
