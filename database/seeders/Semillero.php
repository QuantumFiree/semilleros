<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Semillero extends Seeder
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
               
                'nombre'=>'Green Clouds',
                'correo'=>'marcelaguerrero1396@gmail.com',
                'descripcion'=>'Análisis del uso y aplicación de las herramientas de la Web 2.0 ',
                'mision'=>'analizar el uso y aplicación de las herramientas de la Web 2.0  sede Ipiales. ',
                'valores'=>'Objetividad, Respeto, Responsabilidad',
                'objetivo'=>' implementar procesos investigativos encaminados al emprendimiento e innovación en el área de las Ciencias de la Computación y la Ingeniería de Sistemas',
                'lineas_investigacion'=>'web 2.0',
                'presentacion'=>'Analizar el uso y aplicación de las herramientas de la Web 2.0',
                'fecha_creacion'=>'2019/12/13',
                'numero_resolucion'=>'003',
                'logo'=>'null',
                'cod_coordinador'=>'3100'     
            ]


     
          
        ];

        DB::table('semillero')->insert($datos);
    }
}
