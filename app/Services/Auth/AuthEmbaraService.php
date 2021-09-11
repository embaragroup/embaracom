<?php

namespace App\Services\Auth;

use App\Repositories\Auth\AuthEmbaraRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthEmbaraService {

    protected $authEmbaraRepository;

    public function __construct()
    {
        $this->authEmbaraRepository = new AuthEmbaraRepository;
    }

    public function LoginPost($data){
        try {
            $adminEmbara = $this->authEmbaraRepository->findByEmail($data['email']);
            if (!$adminEmbara) {
                return returnCustom("The email is wrong!");
            }
            if (!Hash::check($data['password'], $adminEmbara->password)) {
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
