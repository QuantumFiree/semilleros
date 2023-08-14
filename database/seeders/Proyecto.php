<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Proyecto extends Seeder
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
               
                'titulo'=>'Computación en la nube',
                'cod_semillero'=>'1001',
                'tipo_proyecto'=>'Proyecto de investigación',
                'estado'=>'En curso',
                'fecha_inicio'=>'2023-08-05',
                'fecha_finalizacion'=>'2023-08-09',
                'propuesta'=>'Aprovechar la computación en la nube',
                'proyecto_final'=>'Cloud computing'       
            ]


    
          
        ];

        DB::table('proyecto')->insert($datos);
    }
}
