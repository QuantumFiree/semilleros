<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Evento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos =[
            [
                'nombre'=>'Inteligencia Artificail',
                'descripcion'=>'ingenieros del futuro',
                'fecha_inicio'=>'2023-08-05',
                'fecha_fin'=>'2023-08-07',
                'lugar'=>'Pasto',
                'tipo'=>'foro',
                'modalidad'=>'virtual',
                'clasificacion'=>'uno',
                'observaciones'=>'ninguna'      
            ],

            [
                'nombre'=>'Realidad virtual',
                'descripcion'=>'nuevas tecnologias',
                'fecha_inicio'=>'2023-07-02',
                'fecha_fin'=>'2023-07-05',
                'lugar'=>'Pasto',
                'tipo'=>'foro',
                'modalidad'=>'presencial',
                'clasificacion'=>'dos',
                'observaciones'=>'ninguna'      
            ]



    
          
        ];

        DB::table('evento')->insert($datos);
    }
}
