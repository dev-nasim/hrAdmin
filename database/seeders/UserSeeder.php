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
        $model = new User();
        $userArray = [
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('123456'),
        ];

        $model->fill($userArray);
        $model->save();
    }
}
