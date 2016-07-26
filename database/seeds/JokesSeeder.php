<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JokesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jokes')->truncate();

        factory(App\Joke::class, 10)->create();
    }
}
