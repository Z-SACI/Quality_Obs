<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <base href="{{ \URL::to('/') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

  <!-- Theme style -->
    <link rel="stylesheet" href="css/animista.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/> -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <style>
    .content{
      overflow-x:hidden;
    }
  </style>

  <!-- map themes -->
  <link rel="stylesheet" href="css/map/resources/ol.css">
  <link rel="stylesheet" href="css/map/resources/fontawesome-all.min.css">
  <link rel="stylesheet" type="text/css" href="css/map/resources/horsey.min.css">
  <link rel="stylesheet" type="text/css" href="css/map/resources/ol3-search-layer.min.css">
  <link rel="stylesheet" href="css/map/resources/ol-layerswitcher.css">
  <link rel="stylesheet" href="css/map/resources/qgis2web.css">
  <link rel="stylesheet" href="css/map/resources/map.css">
  <link href="css/map/resources/ol-geocoder.min.css" rel="stylesheet">
  <link href="css/map/resources/ol-geocoder.min.css" rel="stylesheet">

 
</head>

<!-- sidebar-collapse -->
<body class="hold-transition sidebar-mini "> 
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}" role="button" style="font-size:1.2rem;"><b>@yield('title')</b></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" >
      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a href="{{ route('AddPvEssais') }}" class="btn btn-md btn-lg ml-2" style="float:right;"></i>Renseigner Un PV d'Essais</a>
      </li>
      
      <li class="nav-item">
        <a href="{{ route('AddEprv') }}" class="btn btn-md btn-lg ml-2" style="float:right;"></i>Renseigner Un Prélèvement CTC</a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
      <li class="nav-item">
        <form  action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="nav-link" role="button" style="border:0px solid; background-color:#00000000">
                <i class="fas fa-sign-in-alt"></i>
            </button>
        </form>
        
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="position-fixed main-sidebar sidebar-dark-primary navbar-collapse elevation-4 show " style="background:linear-gradient(rgba(0, 0, 0, 0.6),rgba(201, 53, 69, 0.3)),url(../img/background.jpg); background-repeat:no-repeat; background-size: cover; background-position: left;">
    <!-- Brand Logo -->
      <!-- <img src="img/logo2.png" alt="Obs qualité Logo" class="elevation-4" style="width:40%; border-radius:50%, "> -->
      <a href="{{ \URL::to('/admin/dashboard')}}" class="brand-link">
        <img src="img/LOGO-CTC-2016.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Observatoire Qualité</b></span>
       </a>
    <!-- Sidebar position-fixed-->
    <div class="sidebar " >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex"  >
        <div class="image" >
        <i alt="User Image" class="nav-icon fas fa-user-circle fa-xl" style="color:white;font-size:200%;"></i>
        </div>
        <div class="info" >
          <a href="#" class="d-block">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-chart-line"  style="color:white;"></i>
                <p>
                    Dashboard
                </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="{{ route('admin.affaires') }}" class="nav-link">
            <i class="nav-icon fas 	fa fa-briefcase"  style="color:white;"></i>
                <p>
                    Affaires
                </p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="{{ route('admin.ouvrages') }}" class="nav-link">
            <i class="nav-icon fas fa-hard-hat"  style="color:white;"></i>
                <p>
                    Ouvrages
                </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="{{ route('ShowPrelevements') }}" class="nav-link">
            <i class="nav-icon fa fa-compress-alt" style="color:white"></i>
                <p>
                    Liste des Prélèvements CTC
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('ShowEssais') }}" class="nav-link">
            <i class="nav-icon fa fa-compress-alt" style="color:white"></i>
                <p>
                    Liste des PV d'Essais Entreprise
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Eprouvettes') }}" class="nav-link">
            <i class="nav-icon fas fa-vial"  style="color:white;"></i>
                <p>
                    Liste des Eprouvettes
                </p>
            </a>
          </li>
          

          <li class="nav-item">
            <a href="{{route('admin.profile')}}" class="nav-link">
              <i class="nav-icon fas fa-user"  style="color:white;"></i>
                <p>
                    Profile
                </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="{{route('admin.settings')}}" class="nav-link">
              <i class="nav-icon fas fa-cog"  style="color:white;"></i>
                <p>
                    Settings
                </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#e7ded4">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content p-0">
        
          @yield('content')
    </div>
  </div>

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
    $.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
    });
    $(function(){
    /* UPDATE ADMIN PERSONAL INFO */
    $('#AdminInfoForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
           url:$(this).attr('action'),
           method:$(this).attr('method'),
           data:new FormData(this),
           processData:false,
           dataType:'json',
           contentType:false,
           beforeSend:function(){
               $(document).find('span.error-text').text('');
           },
           success:function(data){
                if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
                  $('.admin_name').each(function(){
                     $(this).html( $('#AdminInfoForm').find( $('input[name="name"]') ).val() );
                  });
                  alert(data.msg);
                }
           }
        });
    });
    
    $('#changePasswordAdminForm').on('submit', function(e){
         e.preventDefault();
         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#changePasswordAdminForm')[0].reset();
                alert(data.msg);
              }
            }
         });
    });
    
  });

    // $(function () {
    //      alert('works');
    // })
</script>
</body>
</html>
<script src="dist/js/hidediv.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap.min.js"></script>


<script>
  $(document).ready(function () {
    $('#myTable').DataTable({
        "language": {
            "lengthMenu": "Afficher _MENU_ par page",
            "zeroRecords": "Aucun Résultat Trouvé",
            "info": "_PAGE_ Sur _PAGES_ Pages Affichées",
            "infoEmpty": "Aucun Résultat",
            "infoFiltered": "(Filtrés depuis _MAX_ Enregistrements)"
        }
    });
    $('#myTable2').DataTable({
        "language": {
            "lengthMenu": "Afficher _MENU_ par page",
            "zeroRecords": "Aucun Résultat Trouvé",
            "info": "_PAGE_ Sur _PAGES_ Pages Affichées",
            "infoEmpty": "Aucun Résultat",
            "infoFiltered": "(Filtrés depuis _MAX_ Enregistrements)"
        }
    });
});
</script>

