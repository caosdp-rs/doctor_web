<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // foreach (range(1,5) as $index) {
        //     DB::table('doctors')->insert([
        //         'doc_id' => $index,
        //         'category' => $faker->randomElement(['Dental','General','Gynecology','Dermaalogy','Cardiology']), //$faker->word,
        //         'patients' => rand(0, 100),
        //         'experience' => rand(1, 20),
        //         'bio_data' => $faker->text(100),
        //         'status' => rand(0, 1) ? 'active' : 'inactive',
        //         'created_at' => $faker->date(),
        //         'updated_at' => $faker->date(),
        //         //'password' => bcrypt('secret'),
        //     ]);
        // }
        for ($i = 1; $i <= 20; $i++) {
            $reviews = [
                [
                    'doc_id' => rand(1, 5),
                    'user_id' => rand(1, 5),
                    'reviewed_by' => $faker->name,
                    'status' => rand(0, 1) ? 'active' : 'inactive', 
                    'ratings' => rand(1, 5),
                    'reviews' => $faker->randomElement([
                        'Eu fui muito bem atendido pelo médico, ele foi muito atencioso e solícito.',
                        'A equipe médica foi incrível, eles foram muito profissionais e carinhosos.',
                        'Eu me senti muito seguro e cuidado durante todo o processo médico.',
                        'Eu estou muito satisfeito com o atendimento médico, todos foram muito profissionais e compreensivos.',
                        'A equipe médica foi incrível, eles me fizeram sentir muito confortável.',
                        'Eu tive uma experiência muito ruim com o atendimento médico, não recomendo.',
                        'Eu fiquei muito insatisfeito com a falta de atenção e profissionalismo da equipe médica.',
                        'Fiquei muito insatisfeito com a falta de informação e transparência durante o meu tratamento.',
                        'Eu me senti completamente ignorado e esquecido pelo médico e pela equipe médica.'
                    ]),
                    'created_at' => $faker->date(),
                    'updated_at' => $faker->date(),
                ],
            ];
            DB::table('reviews')->insert($reviews);
        }
    }
}
