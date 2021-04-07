<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
            'Perhotelan', 'Tataboga',
            'Otomatisasi Tata Kelola Perkantoran',
            'Bisnis Daring dan Pemasaran',
            'Multimedia',
            'Teknik Komputer dan Jaringan',
            'Rekayasa Perangkat Lunak',
        ];

        foreach ($jurusan as $j) {
            Jurusan::create([
                'name' => $j,
            ]);
        }
    }
}
