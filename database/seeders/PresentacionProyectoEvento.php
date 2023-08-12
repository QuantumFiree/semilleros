<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PresentacionProyectoEvento extends Seeder
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
               
                'participacion'=>'Inteligencia artificial',
                'calificacion'=>'5',
                'certificacion'=>'certifica que asistieron al evento de inteligencia artificial',
                'evidencias'=>'presentacion proyeccto hombre y la ciencia',
                'cod_evento'=>'3100',
                'cod_proyecto'=>'2101'     
            ]


    
          
        ];

        DB::table('presentacion_proyecto')->insert($datos);
    }
}
