<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $faker = Faker\Factory::create();

        User::create([
            'name'      => $faker->userName,
            'email'     => 'test@test.com',
            'password'  => bcrypt('test')
        ]);
    }
}
