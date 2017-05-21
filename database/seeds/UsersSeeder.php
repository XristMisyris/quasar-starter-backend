<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Quasar User',
            'email' => 'quasar@quasar-framework.org',
            'password' => bcrypt('quasar')
        ]);
    }
}
