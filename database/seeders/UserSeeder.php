<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Haris',
            'email' =>  'haris@test.test',
            'roles' => 'ADMIN',
            'password'  => bcrypt('password')
        ]);
        User::create([
            'name'  => 'joko',
            'email' =>  'joko@test.test',
            'password'  => bcrypt('password')
        ]);
    }
}
