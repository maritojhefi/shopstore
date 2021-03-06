<?php

namespace App\Http\Controllers\dashboard;

use App\Rol;
use App\User;
use App\Venta;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\EditUser;
use App\Http\Requests\StoreUser;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rol.admin']);
    }
    public function index()
    {
        $users=User::orderBy('id','desc')->paginate(8);
       
         return view('dashboard2.user.index',['users'=>$users]);
    }

    public function muestra(){
        return view('dashboard2.productos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listRols=Rol::pluck('id','nombre','detalle');

         return view("dashboard2.user.create",['user'=>new User(),'listRols'=>$listRols]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        
      User::create($request->validated());

      
      return back()->with('status','Hecho!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $productos=Product::with('categoria')->where('user_id','=',$user->id)->orderBy('id','desc');
        $productos=$productos->count();
        $ventas=Venta::where('comprador_id',$user->id)->count();
        return view ('dashboard2.user.show',["user"=>$user,"total"=>$productos,'ventas'=>$ventas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $listRols=Rol::pluck('id','nombre','detalle');
        $pass=$user->password;
        return view('dashboard2.user.edit',["user"=>$user,'listRols'=>$listRols,"password"=>$pass]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUser $request, User $user)
    {
        $user->update($request->validated());
        return back()->with('status','User Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('status','User Eliminado!');
    }
}
