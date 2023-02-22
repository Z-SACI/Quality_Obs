@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Info Affaires')
@section('content')

<!-- MODAL VISUALIZATION -->
<div class="modal fade" id="EditForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Informations Générales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="" action="" id="" style="color:black">
          @csrf
          <div class="form-group row" >
            <label for="pe_date" class="col-sm-3 col-form-label">Code Projet: </label>
              <div class="col-sm-9">
                  <input type="text" value="" id="prjcon" class="form-control" disabled>
              </div> 
              </div> 
              <div class="form-group row" >
              <label for="pe_date" class="col-sm-3 col-form-label">Direction Régionale: </label>
              <div class="col-sm-9">
                  <input type="text" value="" id="prjid" hidden>
                  <input type="text" value="" id="prjdir" class="form-control" disabled>
              </div>
              </div> 
              <div class="form-group row" >
              <label for="pe_date" class="col-sm-3 col-form-label">Agence: </label>
              <div class="col-sm-9">
                  <input type="text" value="" id="prjagn" class="form-control" disabled>
              </div> 
              </div> 
              <div class="form-group row" >
              <label for="pe_date" class="col-sm-3 col-form-label">Intitulé: </label>
              <div class="col-sm-9">
                  <input type="text" value="" id="prjnom" class="form-control" disabled>
              </div> 
              </div> 
          </div>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Liste Sites Modal -->
<div class="modal fade" id="listModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Liste des Sites</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            </div>
        </div>
    </div>
</div>

<!-- Visible Content -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-5 offset-sm-1">
              <h1>Liste de Projets</h1>
            </div>
            <div class="col-sm-5">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item" ><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active text-danger">Info Affaires</li>
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
            <div class="card scale-up-ver-top">
                <div class="card-header" style="border-top: 3px solid rgb(201, 53, 69); ">
                    <div class="row " >
                        <div class="col-sm-8" style="color:black">    
                                <h4>Informations Affaires</h4>
                        </div>
                </div>
            </div>
            <!-- <h5 class="card-header" style="background-color:#008080; color: white;"><b>Ouvrages</b></h5> -->
            <div class="card-body">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Direction</th>
                            <th scope="col">Agence</th>
                            <th scope="col">Code</th>
                            <th scope="col">Projet</th>
                            <th scope="col">Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prj as $affaire)
                            <tr>
                                <td class="prjdir">{{$affaire->dr_acronyme}}</td>
                                <td class="prjagn">{{$affaire->agn_nom}}</td>
                                <td class="prjcon">{{$affaire->prj_nconvention}}</td>
                                <td class="prjnom">{{$affaire->prj_intitule}}</td>
                                <td>
                                    <button type="button" value="{{$affaire->prj_id}}" class="btn EditForm" data-toggle="modal" data-target="#EditForm" >
                                        <i class="fas fa-eye" style="color:#007bff" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='#007bff'"></i>
                                    </button>
                                    <button type="button" value="{{$affaire->prj_id}}" class="btn listModal" data-toggle="modal" data-target="#listModal" >
                                        <i class="fas fa-list" style="color:rgb(201, 53, 69)"></i>
                                    </button>
                                </td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {

        $(document).on('click', '.EditForm' ,function () {

            $('#EditForm').modal('show');
            var prj_id=$(this) .val();
            // console.log(prj_id);
            var prjdir=$(this).parents("tr").find(".prjdir").text();
            var prjagn=$(this).parents("tr").find(".prjagn").text();
            var prjcon=$(this).parents("tr").find(".prjcon").text();
            var prjnom=$(this).parents("tr").find(".prjnom").text();
            
            $('#prjdir').val(prjdir);
            $('#prjid').val(prj_id);
            $('#prjagn').val(prjagn);
            $('#prjcon').val(prjcon);
            $('#prjnom').val(prjnom);
            console.log(prjdir);
            console.log(prjagn);
            console.log(prjcon);
            console.log(prjnom);
            console.log(prj_id);
        });

        $(document).on('click', '.listModal' ,function () {

        $('#listModal').modal('show');
        var prj_id=$(this) .val();
        console.log(prj_id);
        
        });
    });
</script>
@endsection