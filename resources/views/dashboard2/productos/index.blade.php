
@extends('dashboard2.master')   
@section('content')




  

<div id="content">
  <section class="p-y3">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1 class="font-weight-bold mb-0">Tienes el rol de {{auth()->user()->rol->nombre}}</h1>
          <p class="lead text-muted">Revisa la última información</p>
        </div>
        
      </div>
    </div>
  </section>
  
  <form action="{{route('producto.index')}}" method="" class="form-inline">
    <label for="" class="nav-link">Buscar por categoria</label>
    <div class="form-group dropdown mr-2">
     
<select name="categorysearch" class="form-control" id="categorysearch"  >
  <option selected class="dropdown-item text-white"  value="">Seleccione</option>
  @foreach ($listCategorias  as $nombre=>$id)
  <option class="dropdown-item" aria-labelledby="dropdownMenuButton" value="{{$id}}">{{$nombre}}</option>
  
      @endforeach

 

</select>
  </div>
  <input type="text" class="form-control" name="search" placeholder="Buscar por Nombre" value="{{request('search')}}">
    <button type="submit" class="ml-2 btn btn-success btn-round btn-sm" >Buscar</button>
    </form>
</div>
  <section class="bg-mix">
    <div class="container">
      <div class="card rounded-0">
          <div class="card-body">
            <h4>Productos.</h4>
            <a href="{{route('producto.create')}}" class="btn btn-success  btn-round">Crear</a><div class="btn-sm mt-3 mb-3 ml-3">{{$productos->appends(['search'=>request('search')])->links()}}</div>
            <table class="table">
              <thead>
                <td style="color:#FF7126 ">
                  PRODUCTO
              </td>
              
              
              <td>
                PRECIO
            </td>
            <td>
              CATEGORIA
          </td>
           
          <td>
            CANTIDAD
        </td>
       
             <td>
             ESTADO
  
             </td>
         
          
          
        
      <td>
        FECHA REGISTRO
    </td>
    <td>
      USUARIO
  </td>
            
              <td>
                  ACCIONES
              </td>
          </tr>
              </thead>
              <tbody>
             
                <tr>
                  @foreach ($productos as $producto)
                  <tr>
                     
                      <td>
                          {{$producto->nombre}}
                      </td>
                     
                      
                      <td>
                        {{$producto->precio}}
                    </td>
                    <td>
                  
                      {{$producto->category_id}}
                     
                      
                  </td>
                  <td>
                  
                    {{$producto->cantidad}}
                   
                    
                </td>
                    @if (auth()->user()->rol_id==2)
                     <td>
                     <a href="" data-id="{{$producto->id}}" class="approved btn btn-{{$producto->estado=='pendiente'? "danger": "success"}} btn-sm  btn-round" data-toggle="modal" data-target="#confirmarestado">{{$producto->estado}}</a>
          
                     </td>
                     @else 
                     <td>
                      <label  class="btn btn-{{$producto->estado=='pendiente'? "danger": "success"}} btn-sm  btn-round" >{{$producto->estado}}</label>
                     </td>
                  
          
                 @endif
                
                 <div class="modal fade" id="confirmarestado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Acaba de cambiar el estado de este producto
                      </div>
                      <div class="modal-footer">
                        
                      <button  type="button" class=" btn btn-success" data-dismiss="modal" >Entendido</button>
                      </div>
                    </div>
                  </div>
                </div>
                
              <td>
                {{$producto->created_at->format('d-M-Y')}}
            </td>
            <td>
                  
              {{$producto->user->name}}
             
              
          </td>   
          @if ($producto->estado=="aprobado")
          <td>
            <label class="btn btn-primary btn-sm  btn-round">BLOQUEADO</label>
          
          </td>
          
          @else
          <td>
            <a href="{{route('producto.show',$producto->id)}}" class="btn btn-primary btn-sm  btn-round"><i class="material-icons">visibility</i></a>
           
            <a href="{{route('producto.edit',$producto->id)}}" class="btn btn-info btn-sm  btn-round"><i class="material-icons">create</i></a>
           
                
                <button class="btn btn-danger btn-sm  btn-round" type="submit" data-toggle="modal" data-target="#deleteModal" data-id="{{ $producto->id}}"><i class="material-icons">delete</i></button>
           
          
          
          </td>
          @endif 
                      
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  
</div>
</div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Borrar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Seguro que desea borrar el registro ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form id="formDelete" method="POST" action="{{route('producto.destroy',0)}}" data-action="{{route('producto.destroy',0)}}">
          @method('DELETE')
      
          @csrf
          <button type="submit" class="btn btn-primary">Confirmar</button>
      </div>
      </form>
        
    </div>
  </div>
</div>
<script>



  document.querySelectorAll(".approved").
forEach(link=>link.addEventListener("click", function(){

var id=link.getAttribute("data-id");
$.ajax({
  method: "POST",
  url: "{{URL::to("/")}}/dashboard/producto/estado/"+id,
  data:{'_token': '{{csrf_token()}}'}
})
  .done(function( approved ) {
   if(approved=="pendiente"){
     $(link).removeClass('btn-success');
     $(link).addClass('btn-danger');
     $( link).text("Pendiente")
   }else{
    $(link).removeClass('btn-danger');
     $(link).addClass('btn-success');
     $( link).text("Aprobado")
   }

  });
}))



      window.onload=function(){
      $('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  var nom=button.data('nombre')
  
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  action = $('#formDelete').attr('data-action').slice(0,-1)
  action+=id
  console.log(action)
  $('#formDelete').attr('action',action)
  var modal = $(this)
  modal.find('.modal-title').text('Vas a borrar al producto: ' + id)

})
}

  </script>

@endsection