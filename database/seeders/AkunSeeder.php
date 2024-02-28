<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@gmail.com',
               'nip'=>'admin NIP',
               'type'=>1,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'Resepsionis User',
               'email'=>'resepsionis@gmail.com',
               'nip'=>'resepsionis NIP',
               'type'=> 2,
               'password'=> bcrypt('12345678'),
            ],
        ];

        // Memasukkan data ke dalam tabel 'users'
        DB::table('users')->insert($users);
    }
}
