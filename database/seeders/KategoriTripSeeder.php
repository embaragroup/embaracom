<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_trips')->insert([
            [
                'kategori_trip' => 'Wisata Keluarga'
            ],
            [
                'kategori_trip' => 'Wisata Anak'
            ],
            [
                'kategori_trip' => 'Wisata Photograpy'
            ],
            [
                'kategori_trip' => 'Wisata Muslim'
            ],
        ]);
    }
}
