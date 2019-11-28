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
            for($i = 1; $i <= 3; $i++){
                DB::table('genre_movie')->insert(['genre_id' => rand(1, 12), 'movie_id' => $j, ]);
            }
        }
    }
}
