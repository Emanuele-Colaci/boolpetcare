<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Illness;
use Illuminate\Support\Str;

class IllnessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) { 
            $illness = new Illness();
            $illness->name = $faker->name;
            $illness->slug = Illness::generateSlug($illness->name);
            $illness->diagnosis = $faker->word;
            $illness->treatment = $faker->word;
            $illness->notes = $faker->sentence;
            $illness->save();
        }
    }
}
