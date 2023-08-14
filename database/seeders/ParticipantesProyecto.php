<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ParticipantesProyecto extends Seeder
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
               
                'cod_proyecto'=>'2101',
                'cod_semillerista'=>'1100',
                'numero_participantes'=>'3'     
            ],

            [
               
                'cod_proyecto'=>'2101',
                'cod_semillerista'=>'1100',
                'numero_participantes'=>'5'     
            ]



     
          
        ];

        DB::table('participantes_proyecto')->insert($datos); 
    }
}
