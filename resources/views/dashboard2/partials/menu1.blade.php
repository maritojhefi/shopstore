
<html>
<head>
  @yield('title')
<title>Cliente </title>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
 
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
<link href="{{asset('templatemain/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
</head>
<doctype html>
</html>
@section('sidebar')
<html lang="en">

<body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">


<body background="../imagenes/fon.jpg">


<nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="/anonimo">E.R.M. Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @guest
      <li class="nav-item active">
        <a class="nav-link" href="/login">Iniciar <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/registro">Registrarse</a>
      </li>
      @endguest
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
>
    Categorias
  </button>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    @foreach ($categorias as $item)
            
        <a href="{{route('indexPersonalizado',$item->id)}}" class="list-group-item">{{$item->nombre}}</a>
            @endforeach

  </div>
</div>
@auth
<li class="nav-item">
<label class="nav-link" href="">Bienvenido {{auth()->user()->name}}</label>
  </li>
<li class="nav-item">
<a class="nav-link" href="{{route('producto.index')}}">Ir al Panel</a>
</li>
@endauth
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Acerca De...</a>
      </li>
    </ul>

    <a href="/Compras" class="d-block text-light p-3"><i class="icon ion-ios-cart"></i>       <span class="badge badge-light"> 4 </span></a>
    <ion-icon name="cart-outline"></ion-icon>







    <form action="{{route('producto.index2')}}" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>












</body>
<script src="{{asset("js/app.js")}}"></script>
<script src="{{asset("templatemain/vendor/bootstrap/js/bootstrap.min.js")}}"></script>

<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
</html>
@show
  
  @yield('content')