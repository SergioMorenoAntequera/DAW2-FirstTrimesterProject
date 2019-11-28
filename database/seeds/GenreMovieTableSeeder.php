<?php

use Illuminate\Database\Seeder;

class GenreMovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genre_movie')->truncate();

        for($j = 1; $j <= 8; $j++){
            $arr = Array();
            for($i = 1; $i <= 3; $i++){
                do {
                    $genreID = rand(1, 12);
                } while (in_array($genreID, $arr));
                array_push($arr, $genreID);
                DB::table('genre_movie')->insert(['genre_id' => $genreID, 'movie_id' => $j,]);
            }
            unset($arr);
        }
    }
}
