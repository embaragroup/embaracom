<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agents')->insert([
            'name' => 'admin agent',
            'email' => 'adminagent@gmail.com',
            'password' => Hash::make('adminagent'),
            'phone' => '08994407084',
            'address' => 'Tangerang',
            'city' => 'Tangerang',
            'province' => "Banten",
            'country' => 'Indonesia',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
