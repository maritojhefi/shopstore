<?php

namespace App\Http\Controllers\dashboard;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $categorias=Categoria::orderBy('id','desc')->paginate(10);
       
         return view('dashboard.categorias.index',['categorias'=>$categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function store(StoreComment $request)
    {
        
      Comment::create($request->validated());

      return back()->with('status','Categoria  Registrada!');

      
    }
}
