<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = Array("Cesar Vicente", "Francesco Arca", "Travis Fimmel", "Jasika Nicole", 
                "Alyssa Sutherland", "Freddie Highmore", "Jason Statham", "Will Smith");
        $externalUrls = Array("actor-860090", "actor-595867", "actor-104885", "actor-155103",
                "actor-168151", "actor-97468", "actor-28586", "actor-19358");

        // ENVIO //////////////////////////////////////////////////////////////////////////////////////////
        DB::table('people')->truncate();
        for($i = 0; $i < 8; $i++){
            DB::table('people')->insert([    
                //La id no se pone porque se autoincrementa sola
                'name' => $names[$i],
                'photo' => $names[$i].".png",
                'external_url' => "http://www.sensacine.com/actores/".$externalUrls[$i],
                'created_at' => date('Y-m-d H-m-s'),
                'updated_at' => date('Y-m-d H-m-s'),
            ]);
        }

    }
}
