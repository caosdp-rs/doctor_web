<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(5)->create();
        $faker = Faker::create();
        \App\Models\User::factory()->create([
            'name' => 'Carlos Silva',
            'email' => 'caosdp@gmail.com',
            'password' => bcrypt('password'),
            'type' => 'doctor'
        ]);

        foreach (range(2,5) as $index) {
            \App\Models\User::factory()->create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password'), //'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'type' => 'doctor'
                //'password' => bcrypt('secret'),
            ]);
        }
        
        $this->call(DoctorsTableSeeder::class);
    }
}
        