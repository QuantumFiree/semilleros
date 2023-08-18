<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ParticipantesPresentacionProyectoEvento extends Seeder
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
               
                'cod_presentacion_proyecto'=>'4100',
                'cod_semillerista'=>'1100'      
            ],

            [
               
                'cod_presentacion_proyecto'=>'4100',
                'cod_semillerista'=>'1100'      
            ]
     
          
        ];

        DB::table('participantes_presentacion_proyecto')->insert($datos);
    }
}
