<?php

namespace Database\Seeders;

use App\Models\Partai;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(20)->create();
         User::create([
             'name'=>'admin',
             'username'=>'admin',
             'active' => true,
             'role'=> 'admin',
             'password' => Hash::make('admin123'),
         ]);
        Partai::factory(20)->create();
    }
}
