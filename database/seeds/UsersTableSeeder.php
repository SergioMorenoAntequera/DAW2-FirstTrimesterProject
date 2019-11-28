<?php

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
        DB::table('users')->truncate();
        //Users::truncate(); // Opativo: vacía la tabla antes de rellenarla
        for($i = 0; $i <= 5; $i++){
            DB::table('users')->insert([    
                //La id no se pone porque se autoincrementa sola
                'nick' => 'user'.$i,
                'email' => ' user'.$i.'@email.com',
                'password' => Hash::make('mysupersecretpassword'),
                'type' => 0,
                'created_at' => date('Y-m-d H-m-s'), 
                'updated_at' => date('Y-m-d H-m-s'),
            ]);
        }
    }
}
