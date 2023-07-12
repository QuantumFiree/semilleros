<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class categorias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nombreCategoria' => 'Dispensa',
                'descripcion' => 'Mercancia Dispensa diaria',
            ],
            [
                'nombreCategoria' => 'Bebidas',
                'descripcion' => 'Licores y Gaseosas',
            ],
            [
                'nombreCategoria' => 'Aseo Hogar',
                'descripcion' => 'Limpieza y Aseo',
            ],
            [
                'nombreCategoria' => 'Fruver',
                'descripcion' => 'Frutas y verduras',
            ],
        ];
        DB::table('categorias')->insert($data);

    }
}
