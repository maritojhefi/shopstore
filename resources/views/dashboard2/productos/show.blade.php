@extends('dashboard2.master')   
@section('content')

<div >
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
   
      <div class="container">
        <div class="card rounded-0">
          <div class="card-body">
              <h4> Vista del Producto </h4>

  <div class="form-group">
    <label for="nombre" class="bmd-label-floating">Producto</label>
<input type="text" readonly name="nombre" class="form-control" id="nombre" value="{{$producto->nombre}}">
    @error('nombre')

    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="precio" class="bmd-label-floating">Precio</label>
    <input type="text" name="precio"readonly class="form-control" id="precio" value="{{$producto->precio}}">

</div>

<div class="form-group">
    <label for="detalle" class="bmd-label-floating">Detalle</label>
    <input type="text" name="detalle"readonly class="form-control" id="detalle" value="{{$producto->detalle}}">

</div>


<div class="form-group">
    <label for="foto" class="bmd-label-floating">Fecha de publicacion</label>
    <input type="text" name="foto"readonly class="form-control" id="foto" value="{{$producto->created_at}}">

</div>

<div class="form-group">
    <label for="foto" class="bmd-label-floating">Numero de interesados</label>
    <input type="text" name="foto"readonly class="form-control" id="foto" value="0">

</div>


<a href="{{route('producto.index')}}" button type="submit" class="btn btn-primary mb-2">Regresar </a>


    

  </div>

@endsection
