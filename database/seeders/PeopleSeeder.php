<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('App\people');

        for($i=1; $i <=200; $i ++)
        {
        DB::table('people')->insert([
            'Name' => $faker->name(),
            'Surname' => $faker->lastName(),
            'Phone_Number' => $faker->phoneNumber(),
            'Email_Adress' => $faker->email(),
            'Country' => $faker->country(),
            'City' => $faker->city(),
            'Street' => $faker->streetName(),
            'Apartment_Number' => $faker->numberBetween(1,999),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),            
            
        ]);
        }
    }
}
