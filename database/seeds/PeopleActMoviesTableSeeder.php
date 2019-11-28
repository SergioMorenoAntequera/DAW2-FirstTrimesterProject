<?php

use Illuminate\Database\Seeder;

class PeopleActMoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people_act_movies')->truncate();

        for($j = 1; $j <= 8; $j++){
            $people = Array();
            for($i = 1; $i <= 5; $i++){
                do {
                    $person = rand(1, 8);
                } while(in_array($person, $people));
                $people[] = $person;
                DB::table('people_act_movies')->insert(['person_id' => $person, 'movie_id' => $j,]);
            }
            $people = null;
        }
    }
}
