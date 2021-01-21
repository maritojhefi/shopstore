@extends('dashboard2.master')   
@section('content')

<div >
    <section class="p-y3">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <h1 class="font-weight-bold mb-0">Registro:{{$product->nombre}} </h1>
          </div>
          <div class="col-lg-3 d-flex">
          </div>
        </div>
      </div>

    </section>
   
      <div class="container">
       
              <h4>  Comentarios totales:{{$total}}</div></h4>

              @foreach ($comentarios as $comentario)
              <div class="form-group">
                  <label for="nombre" class="bmd-label-floating">Usuario:  {{ $comentador->find($comentario->user_id)->name }}</label>
              <label for="" class="form-control">Comentario     :{{$comentario->message}}</label>
              @if ($comentario->response!=null)
              <label for="nombre" class="bmd-label-floating">Respuesta: </label>
              <label for="" class="form-control">{{$comentario->response}}</label>
              @endif
              
              
              <form action="{{route('respondercoment')}}" method="POST">
                  
                  @csrf
              <div class="row">
                  
                  <div class="col-2">
                      <button type="submit" class="btn btn-success ">Responder</button>
                  </div>
                 <div class="col-9">
                     <input  type="text" name="respuesta" class="form-control bmd-label-floating">
                 </div>
                <input type="hidden" name="id_comentario" value="{{$comentario->id}}">
              </div>
              </form>
              </div>
              @endforeach
      
</div>


@endsection
