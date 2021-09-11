<?php

namespace App\Services\RegisterAgent;

use App\Models\Agent\Agent;
use App\Repositories\RegisterAgent\RegisterAgentRepository;
use Illuminate\Support\Facades\Hash;

class RegisterAgentService {

    protected $registerAgentRepository;

    public function __construct()
    {
        $this->registerAgentRepository = new RegisterAgentRepository;
    }

    public function registerPost($agent)
    {
        try {
            $checkEmail = $this->registerAgentRepository->findByEmail($agent['email']);
            if ($checkEmail) {
                return returnCustom("Registration failed because email is already registered!");
            }
            $agent = Agent::create([
                'name' => $agent['name'],
                'email' => $agent['email'],
                'password' => Hash::make($agent['password']),
                'phone' => '08994407084',
                'address' => 'Tangerang',
                'city' => 'Tangerang',
                'province' => "Banten",
                'country' => 'Indonesia',
            ]);
            return returnCustom("Registration is successful, please contact agent with the account that has been registered!", true);
        } catch (\Exception $e) {
            return returnCustom($e->getMessage());
        }
    }
}
