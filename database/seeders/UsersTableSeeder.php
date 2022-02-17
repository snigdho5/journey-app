<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Snigdho Upadhyay',
            'email' => 'snigdho@gmail.com',
            "phone" => "9735117684",
            'password' => Hash::make('Test@123')
        ]);
    }
}
