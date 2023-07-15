<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $role = collect(['admin','user']);
        $i = 0;
        while ($i < 20) {
            $email = $faker->email();
            $user = User::create([
                'name' => $faker->name(),
                'email' => $email,
                'username' => $faker->username(),
                'email_verified_at' => now(),
                'password' => Hash::make($email), // password
                'remember_token' => Str::random(10),
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]);
            $user->attachRole($role->random());
            $i++;
        }
    }
}
