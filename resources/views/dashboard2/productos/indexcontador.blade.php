
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

</div>
  <section class="bg-mix">
    <div class="container">
      <div class="card rounded-0">
          <div class="card-body">
            <h4>Productos.</h4>
            <table class="table">
              <thead>
                <td style="color:#FF7126 ">
                  PRODUCTO
              </td>
              
              
              <td>
                COMPRADOR
            </td>
            <td>
              VENDEDOR
          </td>
            <td>
              ESTADO
          </td>
           
          <td>
            TOTAL
        </td>
       
            
         
          
          
        
     
          </tr>
              </thead>
              <tbody>
             
                <tr>
                  @foreach ($ventas as $venta)
                  <tr>
                     
                      <td>
                         

                          {{ $productos->find($venta->product_id)->nombre }}
                      </td>
                     
                      
                      <td>
                        {{ $comprador->find($venta->comprador_id)->name }}
                    </td>
                    <td>
                      {{ $comprador->find($venta->vendedor_id)->name }}
                  </td>
                    <td>
                  
                      <a href="" data-id="{{$venta->id}}" data="{{$venta->comprador_id}}" class="approved btn btn-{{$venta->estado=='pendiente'? "warning": "success"}} btn-sm  btn-round" data-toggle="modal" data-target="#confirmarestado">{{$venta->estado}}</a>
                     
                      
                  </td>
                  <td>
                  
                    {{$venta->total}}
                   
                    
                </td>
                  
                
                 <div class="modal fade" id="confirmasrestado-{{$venta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Porque fue rechazado?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('comentrechazado')}}" method="post">
                          @csrf
                        <textarea name="comentario" id="" class="form-control"></textarea>
                        <input type="hidden" value="{{$venta->id}}" name="id">
                      </div>
                      <div class="modal-footer">
                        
                      <button  type="submit" class=" btn btn-success" >Enviar Comentario</button>
                    </form>
                      </div>
                    </div>
                  </div>
                </div>
                
            
           
       
                      
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

<script>



  document.querySelectorAll(".approved").
forEach(link=>link.addEventListener("click", function(){

var id=link.getAttribute("data-id");
var user=link.getAttribute("data");
$.ajax({
  method: "POST",
  url: "{{URL::to("/")}}/dashboard/venta/cambiarestado/"+id,
  data:{'_token': '{{csrf_token()}}','id':id,'user':user}
})
  .done(function( approved ) {
   if(approved=="entregado"){
     $(link).removeClass('btn-success');
     $(link).addClass('btn-warning');
     $( link).text("pendiente")
   }
   else if(approved=="pendiente"){
     $(link).removeClass('btn-warning');
     $(link).addClass('btn-success');
     $( link).text("entregado")
   
   }
 
  });
}))



    

  </script>

@endsection