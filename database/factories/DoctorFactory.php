<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Laravel\Jetstream\Features;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Doctor::class;
    
    //protected $fillable = ['doc_id', 'category', 'patients', 'experience', 'bio_data', 'status'];
    public function definition()
    {
        $faker = Faker::create();
        return [
            'doc_id' => 1,
            'category' =>  $faker->word,
            'patients' =>rand(0, 100),
            'experience' =>rand(0, 50),
            'bio_data' => Str::random(10),
            'status' => rand(0, 1) ? 'active' : 'inactive',
        ];
    }
}
