<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'siswa'];

        foreach ($roles as $r) {
            Role::create([
                'name' => $r,
                'guard_name' => 'web'
            ]);
        }
    }
}
