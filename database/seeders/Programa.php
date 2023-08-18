<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class Programa extends Seeder
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
               
                'nombre_programa'=>'Ingeniería de Sistemas',
                'facultad'=>'30'      
            ],


            [
                
                'nombre_programa'=>'Ingeniería Electronica',
                'facultad'=>'30'   
            ],


            [
                
                'nombre_programa'=>'Ingeniería Civil',
                'facultad'=>'30'
            ]


          
        ];

        DB::table('programa')->insert($datos);
    }
}
