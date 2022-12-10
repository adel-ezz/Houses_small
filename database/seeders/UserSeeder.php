<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(['email'=>'admin@admin.com'],[
            'email' => 'admin@admin.com',
            'name'=>'admin',
            'password' => Hash::make('123123'),
            'type'=>'admin'
        ]);
    }
}
