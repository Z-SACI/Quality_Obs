<!DOCTYPE html>
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
  <!-- Theme style -->
    <link rel="stylesheet" href="css/animista.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito%20Sans.css">
    <link rel="stylesheet" href="assets/css/Open%20Sans.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/Section-Title.css">
    <link rel="stylesheet" href="assets/css/Vertical-Left-SideBar-by-Jigar-Mistry.css">
</head>

<body style="filter: contrast(143%) saturate(113%) sepia(0%);backdrop-filter: opacity(1) blur(0px);background: rgb(211,211,211);">
    <div class="container-fluid">
        <div class="row flex-column flex-sm-row wrapper min-vh-100">
            <div class="col-sm-1 bounce animated" data-bss-disabled-mobile="true">
                <div class="main-leftsidebar-div" data-component="leftsidebar">
                    <div class="leftsidebar">
                        <ul class="nav d-block list-group flex-column d-inline-block first-menu scrollbar-indigo thin first-main-menu" style="margin-left: 22px;background: #1d97ff;box-shadow: -1px 0px 10px 1px var(--bs-list-group-disabled-color);color: rgba(33,37,41,0);margin-top: -51px;margin-bottom: 120px;padding-bottom: 0px;padding-top: 35px;">
                            <li class="nav-item list-group-item ps-1 py-2"><a class="nav-link" data-bss-hover-animate="swing" href="#" style="color: var(--bs-list-group-bg);"><i class="fa fa-dashboard"><span class="ml-2 align-middle" href="#">Dashboard</span></i></a></li>
                            <li class="nav-item list-group-item ps-1 py-2"><a class="nav-link" data-bss-hover-animate="swing" href="#" style="color: var(--bs-list-group-bg);"><i class="fa fa-ticket"><span class="ml-2 align-middle" href="#">Ticket</span></i></a></li>
                            <li class="nav-item list-group-item ps-1 py-2"><a class="nav-link" data-bss-hover-animate="swing" href="#" style="color: var(--bs-list-group-bg);"><i class="fa fa-ticket"><span class="ml-2 align-middle" href="#">Ticket</span></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-11 wrapper">
                <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                
                <!-- /.content-header -->

                <!-- Main content -->
                    <div class="content">
                        
                        @yield('content')
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
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