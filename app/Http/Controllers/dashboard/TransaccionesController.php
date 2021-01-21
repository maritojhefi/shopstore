<?php

namespace App\Http\Controllers\dashboard;

use App\Venta;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransaccionesController extends Controller
{
    public function comprar(Request $request)
    {
     
     //DB::table('comments')->insert(
     // ['titulo'=> 'comentario','message' => $request->message, 'product_id' => $request->idproducto, 'user_id'=>$request->idcliente]
  //);
  
      Venta::create(['product_id'=> $request->id
      ,'comprador_id' => auth()->user()->id, 'total'=>$request->precio ,'vendedor_id'=>$request->user]);
      DB::table('products')->where('id','=',$request->id)->decrement('cantidad');

      return back()->with('status','Venta  Registrada!');

      
    }
    public function index2(Request $request)
    {
      
   
     
            $productos=Product::with('categoria')->where('estado','=','aprobado')->orderBy('id','desc');
        
            $productos=Product::with('categoria')->orderBy('id','desc');
        
        
        if($request->has('search')){
            $productos=$productos
            ->where('nombre','like','%'.request('search').'%');
            //->orWhere('category_id','like','%'.request('search').'%');
    
        }
        if($request->has('categorysearch')){
            $productos=$productos
           
            ->where('category_id','like','%'.request('categorysearch').'%');
    
        }
       $productos=$productos->paginate(6);
        $cantidad=$productos->total();
       
        $categorias =DB::table('categorias')->get();
        $productimages=DB::table('product_images')->get();
         return view('dashboard2.vista_general.accesorios',['productos'=>$productos,'cantidad'=>$cantidad,'categorias'=>$categorias,'imagenes'=>$productimages]);
    }
}
