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
               
                'titulo'=>'1995-26-12',
                'cod_semillero'=>'1000',
                'tipo_proyecto'=>'cientifico',
                'estado'=>'aprovado',
                'fecha_inicio'=>'2023-08-05',
                'fecha_finalizacion'=>'2023-08-09',
                'propuesta'=>'Aprovechar los avances cientificos',
                'proyecto_final'=>'El hombre y la ciencia'       
            ]


    
          
        ];

        DB::table('proyecto')->insert($datos);
    }
}
