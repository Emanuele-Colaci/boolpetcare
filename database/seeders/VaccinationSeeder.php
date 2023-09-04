<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Vaccination;
use Illuminate\Support\Str;

class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5 ; $i++) { 
            $vaccination = new Vaccination();
            $vaccination->vaccine_name = $faker->firstName;
            $vaccination->vaccination_date = $faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d');
            $vaccination->dosage = $faker->randomFloat(2, 0.1, 10.0);
            $vaccination->notes = $faker->sentence;
            $vaccination->save();
        }
    }
}
