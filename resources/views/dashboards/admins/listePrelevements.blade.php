@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Prélèvements')
@section('content')
<!-- Modal EDIT Prelevement -->
<div class="modal fade" id="EditForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLongTitle">Mise A Jours</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{ route('UpdEprouvettes') }}" id="" style="color:black">
        @csrf
            <div class="form-group row mr-2 ml-2" >
                <label for="pe_date" class="col-sm-3 col-form-abel">Référence Eprouvette</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"  placeholder="Num de Référence" id="epr_id" name="epr_id" hidden>
                    <input type="text" class="form-control"  placeholder="Num de Référence" id="epr_ref" name="epr_ref" disabled>
                </div>
            </div>
            <div class="form-group row mr-2 ml-2">
                <label for="pe_date" class="col-sm-3 col-form-label">Date Ecrasement</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="epr_date_ecras"  name="epr_date_ecras">
                </div>
            </div>
            <div class="form-group row mr-2 ml-2">
                <label for="inputEmail" class="col-sm-3 col-form-label">Type Eprouvette</label>
                <div class="col-sm-9">
                    <select name="epr_type" class="form-control" id="epr_type">
                        
                            <option value="" selected></option>
                       
                    </select>
                </div>
                
            </div>
            <div class="form-group row mr-2 ml-2">
                <label for="inputEmail" class="col-sm-3 col-form-label">FCI</label>
                <div class="col-sm-9">
                    <input type="number" step=".01" class="form-control"  placeholder="Fci" id="epr_fci" name="epr_fci" >
                </div>
            </div>
          <hr>
        <div class="form-group row mr-2 ml-2 mb-0">
            <div class="col-sm-12">
                <a type="" class="btn btn-danger" >Annuler</a>
                <button type="submit" class="btn btn-md btn-info" style="float:right">Enregistrer</button>
            </div>
        </div>
      </div>
      
      </form>
    </div>
  </div>
</div>

<!-- Modal EDIT -->
<div class="modal fade" id="EditForm2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mise A Jours</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{route('EprouvetteUpd')}}" id="" style="color:black">
            @csrf
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th scope="col">Référence</th>
                        <th scope="col">Date Ecrasement</th>
                        <th scope="col">Fci</th>
                    </tr>
                </thead>
                <tbody id="content_eprv">
                    
                </tbody>
            </table>
            <hr>
            <button type="submit" class="btn btn-md btn-primary" style="float:right;">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Visible Content -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-5 offset-sm-1">
              <h1>Liste de Prélèvements</h1>
            </div>
            <div class="col-sm-5">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item" ><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active text-danger">Prélèvements</li>
              </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
    
        <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-10" style="margin:auto;">
            <div class="card ">
                <div class="card-header" style="border-top: 3px solid rgb(201, 53, 69); ">
                    <div class="row " >
                        <div class="col-sm-8" style="color:black">    
                                <h4>Prélèvements</h4>
                        </div>
                        <div class="col-sm-4" style="float:right">    
                        <!-- Button trigger modal -->
                            <a type="" href="{{ route('AddEprv') }}" class="btn btn-success btn-lg" style="float:right" >Ajouter</a>
                        </div>
                    </div>
                </div>
            <!-- <h5 class="card-header" style="background-color:#008080; color: white;"><b>Ouvrages</b></h5> -->
             <div class="card-body">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Code Bloc</th>
                            <th scope="col">Code Prélèvement</th>
                            <th scope="col">Date Prélèvement</th>
                            <!-- <th scope="col">mode de production</th> -->
                            <th scope="col">affaissement du cone</th>
                            <!-- <th scope="col">Type du Ciment</th> -->
                            <th scope="col">E/C</th>
                            <th scope="col">Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prelevements as $prelev)
                            <tr>
                                <td scope="col">{{$prelev->elem_affaire}}-{{$prelev->elem_site}}-{{$prelev->elem_bloc}}</td>
                                <td scope="col">{{$prelev->pe_id}}</td>
                                <td scope="col">{{$prelev->pe_date}}</td>
                                <!-- <th scope="col">{{$prelev->mode_prod}}</th> -->
                                <td scope="col">{{$prelev->pe_affais_cone}}</td>
                                <!-- <th scope="col">{{$prelev->pe_cim_type}}</th> -->
                                <td scope="col">{{$prelev->pe_cim_ec}}</td>
                                <td scope="col">
                                    <button type="button" value="{{$prelev->pe_id}}" class="btn EditForm" data-toggle="modal" data-target="#EditForm" > <i class="fas fa-edit" style="color:blue" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='blue'"></i> </button>
                                    <button type="button" value="{{$prelev->pe_id}}" class="btn EditForm2" data-toggle="modal" data-target="#EditForm2" > <i class="fas fa-edit" style="color:black" onMouseOver="this.style.color='grey'" onMouseOut="this.style.color='black'"></i> </button>
                                    <a href="admin/ouvrages/prelevements/delete/{{$prelev->pe_id}}">
                                        <i class="fas fa-trash-alt" style="color:red" onMouseOver="this.style.color='#900000'" onMouseOut="this.style.color='red'"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
<script>
    // Get Sites List 
     
      $(document).ready(function(){
        $('#prj').change(function(){
           var prj = $('#prj').val();
           console.log(prj)
           $('#site').html('');
            $.ajax({
                url:'admin/getSite/'+prj,
                type:'GET',
                data:{},
                dataType: "json",
                success:function(data)
                {
                    
                    $.each(data, function(key, sites)
                    {     
                    console.log(sites.site_id);
                    $('#site').prop('disabled', false).append('<option value="'+sites.site_id+'">'+sites.site_code+'</option>');
                    });
                }
            });
        });
      });

    // Get ouvrage List
    $(document).ready(function(){
        $('#site').change(function(){
           var site = $('#site').val();
           console.log(site)
           $('#ouvrage').html('');
            $.ajax({
                url:'admin/getOuvrage/'+site,
                type:'GET',
                data:{},
                dataType: "json",
                success:function(data)
                {
                    $.each(data, function(key, ouvrages)
                    {  
                    $('#ouvrage').prop('disabled', false).append('<option value="'+ouvrages.ouv_id+'">'+ouvrages.ouv_code+'</option>');
                    });
                }
            });
        });
      });

      // Get Elements List
    $(document).ready(function(){
        $('#ouvrage').change(function(){
           var ouv = $('#ouvrage').val();
        //    console.log(ouv)
           $('#elem').html('');
            $.ajax({
                url:'admin/getElement/'+ouv,
                type:'GET', 
                data:{},
                dataType: "json",
                success:function(data)
                {
                    $.each(data, function(key, elements)
                    {  
                    $('#elem').prop('disabled', false).append('<option value="'+elements.elem_id+'">'+elements.elem_code+'</option>');
                    });
                }
            });
        });
      });

    $(document).ready(function () { 

        $(document).on('click', '.EditForm2' ,function () {

            $('#EditForm2').modal('show');
            var pe_id=$(this) .val();
            var epr_array=[];
            console.log(pe_id);
            $.ajax({
                type:"GET",
                url:"admin/ouvrage/prelevements/eprouvettes/"+pe_id,
                dataType: "json",
                success: function (data) {
                    $('#content_eprv').empty();
                    $.each(data, function(key, p)
                    {  
                        epr_array.push(p.epr_id);
                        $('#content_eprv').append('<tr><td>'+p.epr_id+'<input type="text" name="epr_id[]" value="'+p.epr_id+'" hidden></input></td><td><input type="date" name="epr_date_ecras[]" value="'+p.epr_date_ecras+'"></input></td><td><input type="number" name="epr_fci[]" value="'+p.epr_fci+'"></input></td></tr>');
                    });
                    $('#content_eprv').append('<tr><td><input type="text" name="epr_array[]" value="'+epr_array+'" disabled>');
                    console.log(array);
                }
            }) 
        });
        $(document).on('click', '.EditForm' ,function () {

        $('#EditForm').modal('show');
        var pe_id=$(this) .val();
        var epr_array=[];
        console.log(pe_id);
        $.ajax({
            type:"GET",
            url:"admin/ouvrages/upd_prelevement/"+pe_id,
            dataType: "json",
            success: function (data) {
                $('#content_eprv').empty();
                $.each(data, function(key, p){  
                    epr_array.push(p.epr_id);
                    $('#content_eprv').append('<tr><td>'+p.epr_id+'<input type="text" name="epr_id[]" value="'+p.epr_id+'" hidden></input></td><td><input type="date" name="epr_date_ecras[]" value="'+p.epr_date_ecras+'"></input></td><td><input type="number" name="epr_fci[]" value="'+p.epr_fci+'"></input></td></tr>');
                });
                $('#content_eprv').append('<tr><td><input type="text" name="epr_array[]" value="'+epr_array+'" disabled>');
                console.log(array);
            }
        }) 
        });
    });


    </script> 
@endsection