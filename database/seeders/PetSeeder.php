<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Pet;
use Illuminate\Support\Str;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) { 
            $pet = new Pet();
            $pet->name = $faker->firstName;
            $pet->slug = Pet::generateSlug($pet->name);
            $pet->image = $faker->imageUrl(640, 480, 'project', true);
            $pet->species = $faker->randomElement(['Cane', 'Gatto', 'Pappagallo', 'Coniglio']);
            $pet->date_born = $faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d');
            $pet->genre = $faker->randomElement(['Maschio', 'Femmina']);
            $pet->owner = $faker->name;
            $pet->notes = $faker->sentence;
            $pet->save();
        }
    }
}
