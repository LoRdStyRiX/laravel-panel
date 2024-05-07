<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new App\Models\User;
        $user->name = "Raihan Ksatria Aframadhan";
        $user->email = "raihan.aframadhan@gmailcom";
        $user->level = "admin";
        $user->password = "raihan30102007";
        $user->save();
    }
}
