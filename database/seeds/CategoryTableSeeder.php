<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::truncate();
        Categoria::create([
            'nombre'=>"Vestidos",
            'detalle'=>"Para mujer",
           
        ]);
        Categoria::create([
           'nombre'=>"Camperas",
           'detalle'=>"Unisex",
          
       ]);
      
       Categoria::create([
        'nombre'=>"Remeras",
        'detalle'=>"Para hombre y mujer",
       
    ]);
    Categoria::create([
        'nombre'=>"Pantalones",
        'detalle'=>"Para hombre y mujer",
       
    ]);
    Categoria::create([
        'nombre'=>"Camisas",
        'detalle'=>"Solo para varones",
       
    ]);
    }
}
