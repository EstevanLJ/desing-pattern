<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Estevan Junges',
            'email' => 'estevan@junges.com',
            'password' => bcrypt('teste123')
        ]);
    }
}
