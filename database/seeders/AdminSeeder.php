<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'admin@admin.com',
            'password' => '12345678',
        ]);
        $user->assignRole('admin');

        $admin = Admin::create([
            'user_id' => $user->id,
            'name' => 'Admin nya',
        ]);

        $user->update([
            'pemilik_id' => $admin->id
        ]);
    }
}
