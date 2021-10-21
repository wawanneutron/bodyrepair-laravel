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
            'first_name'  => 'Haris',
            'last_name'  => 'Abdul Hamid',
            'email' =>  'haris@test.test',
            'roles' => 'ADMIN',
            'password'  => bcrypt('password')
        ]);
        User::create([
            'first_name'  => 'Joko',
            'last_name'  => 'Tingkir',
            'email' =>  'joko@test.test',
            'password'  => bcrypt('password')
        ]);
    }
}
