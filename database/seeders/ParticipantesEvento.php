<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ParticipantesEvento extends Seeder
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
               
                'cod_evento'=>'3100',
                'identificacion'=>'1085326103',
                'correo'=>'arteagafelipe@gmail.com',     
            ],

            [
               
                'cod_evento'=>'3101',
                'identificacion'=>'1085316105',
                'correo'=>'arteagafelipe@gmail.com',     
            ]

          
        ];

        DB::table('participantes_evento')->insert($datos);
    }
}
