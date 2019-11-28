<?php

use Illuminate\Database\Seeder;

class PeopleDirectMoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people_direct_movies')->truncate();

        $peopleIds = array();
        for($j = 1; $j <= 8; $j++){
            for($i = 1; $i <= 2; $i++){
                do {
                    $personId = rand(1, 8);
                } while(in_array($personId, $peopleIds));
                array_push($peopleIds, $personId);
                DB::table('people_direct_movies')->insert(['movie_id' => $j, 'person_id' => $personId]);
            }
            unset($peopleIds);
            $peopleIds = array();
        }
    }
}
