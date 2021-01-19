<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="{{route('home')}}">Tienda de Ropa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        
        
        
          @if (auth()->user()->rol_id==3 || auth()->user()->rol_id==2)
          @if (auth()->user()->rol_id==3)
          <li class="nav-item {{ Request::path()=='dashboard/main' ? 'active':''}}">
            <a class="nav-link" href="{{route('main.index')}}">
             
              <p>Dashboard</p>
            </a>
          </li>
          @endif
        
         
         
         <li class="nav-item {{ Request::path()=='dashboard/cat' ? 'active':''}}">
           <a class="nav-link" href="{{route('cat.index')}}">
            
             <p>Categorias</p>
           </a>
         </li>
         <li class="nav-item {{ Request::path()=='dashboard/user' ? 'active':''}}">
           <a class="nav-link" href="{{route('user.index')}}">
            
             <p>Usuarios</p>
           </a>
         </li>
          @endif
           @if (auth()->user()->rol_id==4)
           <li class="nav-item {{ Request::path()=='dashboard/producto/ventas' ? 'active':''}}">
            <a class="nav-link" href="{{route('ventas.contador')}}">
             
              <p>Ventas</p>
            </a>
          </li>
           @endif
         
           <li class="nav-item {{ Request::path()=='dashboard2/producto' ? 'active':''}}">
             <a class="nav-link" href="{{route('producto.index')}}">
               
               <p>Productos</p>
             </a>
           </li>
          
           <li class="nav-item dropdown ml-auto">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Bienvenid@! {{auth()->user()->name}}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
  Cerrar sesion
              </a>
  
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('home')}}">
              
              <p>Ir a la tienda</p>
            </a>
          </li>
        
          
       
         
          
        
      </ul>
      
     
    </div>
  </nav>