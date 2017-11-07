<?php

use App\Aluno;
use Illuminate\Database\Seeder;

class AlunosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pt_br');
                
        for($i = 0; $i < 100; $i++) {
            
            Aluno::create([
                'nome' => $faker->firstName() . ' ' . $faker->lastName(),
                'cidade' => $faker->city()
            ]);
        }
    }
}
