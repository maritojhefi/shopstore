@extends('dashboard2.master')   
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">article</i>
            </div>
            <p class="card-category">Categorias Registradas</p>
            <h3 class="card-title">{{$categorias}}
              
            </h3>
          </div>
         
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">assignment_ind</i>
            </div>
            <p class="card-category">Usuarios Registrados</p>
          <h3 class="card-title">{{$usuarios}}</h3>
          </div>
         
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">fact_check</i>
            </div>
            <p class="card-category">Productos Registrados</p>
            <h3 class="card-title">{{$productos}}</h3>
          </div>
         
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="material-icons">shopping_cart</i>
            </div>
            <p class="card-category">Ventas Realizadas</p>
            <h3 class="card-title">{{$ventas}}</h3>
          </div>
          
        </div>
      </div>
    </div>
    
   
  </div>
</div>
@endsection