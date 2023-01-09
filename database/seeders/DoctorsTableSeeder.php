<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Doctor;
use Faker\Factory as Faker;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // protected $fillable = ['doc_id', 'category', 'patients', 'experience', 'bio_data', 'status'];

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,5) as $index) {
            DB::table('doctors')->insert([
                'doc_id' => $index,
                'category' => $faker->randomElement(['Dental','General','Gynecology','Dermaalogy','Cardiology']), //$faker->word,
                'patients' => rand(0, 100),
                'experience' => rand(1, 20),
                'bio_data' => $faker->text(100),
                'status' => rand(0, 1) ? 'active' : 'inactive',
                'created_at' => $faker->date(),
                'updated_at' => $faker->date(),
                //'password' => bcrypt('secret'),
            ]);
        }

        // DB::table('doctors')->insert([
        //     'doc_id' => 1,
        //     'category' => $faker->randomElement(['Dental','General','Gynecology','Dermaalogy','Cardiology']), //$faker->word,
        //     'patients' => rand(0, 100),
        //     'experience' => rand(1, 20),
        //     'bio_data' => $faker->text(100),
        //     'status' => rand(0, 1) ? 'active' : 'inactive',
        // ]);
        // DB::table('doctors')->insert([
        //     'doc_id' => 2,
        //     'category' => $faker->randomElement(['Dental','General','Gynecology','Dermaalogy','Cardiology']), //$faker->word,
        //     'patients' => rand(0, 100),
        //     'experience' => rand(1, 20),
        //     'bio_data' => $faker->text(100),
        //     'status' => rand(0, 1) ? 'active' : 'inactive',
        // ]);

        // Doctor::factory()
        // ->count(1)
        // ->create();
    }
}
