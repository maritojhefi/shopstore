<?php

namespace App\Http\Controllers;

use App\Product;
use App\Categoria;
use App\Subcategoria;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $subcategorias = Subcategoria::pluck('id','nombre');
        
        $productos=DB::table('products')->where('estado','=','concesionado')->paginate(10);
      $categorias =DB::table('categorias')->get();
     $productimages=DB::table('product_images')->get();
    
         return view('dashboard2.vista_general.accesorios',
         ['productos'=>$productos,
         'categorias'=>$categorias, 
         'imagenes'=> $productimages,
         'subcategorias'=>$subcategorias]);
    }

    public function indexPersonalizado(Request $request, Categoria $categoria){
        $categorias =DB::table('categorias')->get();
     $productimages=DB::table('product_images')->get();
        $productos=Product::where('category_id','=',$categoria->id)->where('estado','=','concesionado')->paginate(10);
        return view('dashboard2.vista_general.accesorios',['productos'=>$productos,'categorias'=>$categorias,'imagenes'=> $productimages]);
    }
}
