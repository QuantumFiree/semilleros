<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Coordinador extends Seeder
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
                'cod_user'=>'50',
                'nombres'=>'Luis',
                'apellidos'=>'Obeymar',
                'identificacion'=>'12988183',
                'direccion'=>'Unidad Residencial Torobajo',
                'telefono'=>'7202020',
                'genero'=>'masculino',
                'fecha_nacimiento'=>'1900-05-07',
                'foto'=>'30',
                'cod_programa_academico'=>'100',
                'cod_docente'=>'1085326103',
                'area_conocimiento'=>'ingeniero de sistemas',
                'fecha_vinculacion'=>'1900-05-07',
                'acuerdo_nombramiento'=>'001'     
            ]


     
          
        ];

        DB::table('coordinador')->insert($datos);
    }
}
