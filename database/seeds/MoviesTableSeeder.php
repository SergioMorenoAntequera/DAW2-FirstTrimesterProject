<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // INTRODUCCION DE DATOS ///////////////////////////////////////////////////////////////////////////
        $titles = Array("El Este del Edén", "El niño con el pijama de rayas","La lista de Schindler", 
                "Un burka por amor", "Shrek", "Shrek 2", "Shrek 3", "Shrek felices para siempre");
        $years = Array(1955, 2008, 1993, 2009, 2001, 2004, 2007, 2010);
        $durations = Array(115, 94, 195, 73, 87, 93, 92, 93);
        $ratings = Array(7, 6.9, 8, 5.1, 7, 7.3, 5.9, 5.9);
        $covers = Array("ElEsteDelEden.png", "NinoRayas.png", "LalistadeSchindler.png", "BurkaAmor.png",
                "Shrek.png", "Shrek2.png", "Shrek3.png", "Shrek4.png");
        $filepath = "movies";
        $filenames = Array("El_Este_del_Eden.mp4", "NinoRayas.mp4", "La_lista_de_Schindler.mp4", "BurkaAmor.mp4",
                "Shrek.mp4", "Shrek2.mp4", "Shrek3.mp4", "Shrek4.mp4");
        $externalUrls = Array("464305.html", "728544.html", "656153.html", "778779.html",
                "494558.html", "333949.html", "416894.html", "948443.html");

        // ENVIO //////////////////////////////////////////////////////////////////////////////////////////
        DB::table('movies')->truncate();
        for($i = 0; $i < 8; $i++){
            DB::table('movies')->insert([    
                //La id no se pone porque se autoincrementa sola
                'title' => $titles[$i],
                'year' => $years[$i],
                'duration' => $durations[$i],
                'rating' => $ratings[$i],
                'cover' => $covers[$i],
                'filepath' => $filepath,
                'filename' => $filenames[$i],
                'external_url' => 'https://www.filmaffinity.com/es/film'.$externalUrls[$i],
                'created_at' => date('Y-m-d H-m-s'),
                'updated_at' => date('Y-m-d H-m-s'),
            ]);
        }
        
    }
}
