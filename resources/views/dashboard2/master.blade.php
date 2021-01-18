<!DOCTYPE html>
<html lang="es">
<head>
 
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
  <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
  <link href="{{asset('templatemain/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <title>ShopStore</title>
</head>
<body>
   

    

        <div class="main-panel">
          @include('dashboard2.partials.nav-header-main')

            <div class="content">
                <div class="container-fluid">
                  <div class="container-fluid">
                      
                    @include('dashboard2.partials.session-flash-status')

   
                    @yield('content')
                    
                  </div>
                </div>
            </div>

        </div>
    
 
</div> 
<script src="{{asset("js/app.js")}}"></script>
<script src="{{asset("templatemain/vendor/bootstrap/js/bootstrap.min.js")}}"></script>

<script src="{{asset('js/bootstrap-select.min.js')}}"></script>

</body>
</html>
