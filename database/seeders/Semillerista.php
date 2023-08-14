<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Semillerista extends Seeder
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
               
                'cod_user'=>'10',
                'nombres'=>'Luis',
                'apellidos'=>'Rosero',
                'identificacion'=>'1085326103',
                'direccion'=>'Aquine 3',
                'telefono'=>'7202020',
                'genero'=>'Masculino',
                'fecha_nacimiento'=>'1995-26-12',
                'foto'=>'png',
                'cod_programa_academico'=>'100',
                'cod_estudiantil'=>'215034302',
                'semestre'=>'9',
                'fecha_vinculacion'=>'2023-08-12',
                'cod_semillero'=>'1000',
                'reporte_matricula'=>'matriculado'          
            ]


     
          
        ];

        DB::table('semillerista')->insert($datos);
    }
}
