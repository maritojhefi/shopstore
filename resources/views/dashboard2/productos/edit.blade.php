@extends('dashboard2.master')   
@section('content')

<div id="content">
    <section class="p-y3">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <h1 class="font-weight-bold mb-0">Supervisor </h1>
          </div>
          <div class="col-lg-3 d-flex">
          </div>
        </div>
      </div>

    </section>
    <section class="bg-mix">
      <div class="container">
        <div class="card rounded-0">
          <div class="card-body">
              <h4> Editar Producto </h4>
              <form action="{{route("producto.update",$producto->id)}}" method="POST">
                @method('PUT')
               @include('dashboard2.productos._form')      
              </form>
              <br>
              <form action="{{route("producto.image",$producto)}}" method="POST" enctype="multipart/form-data">
               @csrf
                  
                    <input type="file" name="image" id="" class="form-control ">
              
                  
                  
                    <input type="submit" class="btn btn-success btn-round " value="SUBIR IMAGEN">
              
                  
                
              
              
              </form>
    </section>
    @if ($producto->images!=null)


    <div class="card">
      <div class="card-header card-header-info">
          <h4 class="card-title">
           Imagenes del Producto
          </h4>
         
      </div>
      <div class="card-body">
    <div class="row mt-3">
      @foreach ($producto->images as $image)
      <div class="col-mt-3 col-lg-3 card">
        <div class=" card-profile">
          <div class="card-avatar">
      <img class="w-100 img" src="{{asset('images')}}/{{$image->image}}" alt="">
          </div>
        </div>
      
      <div class="row">
        <div class="col-6">
          <a href="{{route('producto.imageDownload',$image->id)}}" class="btn-block  btn btn-success btn-sm mt-2" ><i class="fa fa-download"></i></a>
    
        </div>
    
        <div class="col-6">
          <form action="{{route('producto.imagedelete',$image->id)}}" method="POST">
            @method("DELETE")
            @csrf
          <button  class="btn-block  btn btn-danger btn-sm mt-2 type="submit"><i class="fa fa-trash"></i></button>
        </form>
        </div>
       
      </div>
    
      </div>
    @endforeach
    </div>
      </div>
    </div>
           
           
    
    @endif
  </div>
</div>
</div>

@endsection
