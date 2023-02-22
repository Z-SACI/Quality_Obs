@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Eprouvettes')
@section('content')



<!-- Modal EDIT -->
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
                        @foreach($types as $typ)
                            <option value="{{$typ->eprv_id}}" selected>{{$typ->eprv_type}}</option>
                        @endforeach
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

<!-- Visible Content -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-5 offset-sm-1">
              <h1>Liste d'Eprouvettes</h1>
            </div>
            <div class="col-sm-5">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item" ><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active text-danger">Eprouvettes</li>
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
                                <h4>Eprouvettes</h4>
                        </div>
                        <div class="col-sm-4" style="float:right">    
                        <!-- Button trigger modal -->
                            <a type="" href="{{ route('AddEprv') }}" class="btn btn-success btn-lg" style="float:right" >Ajouter</a>
                                            
                        </div>
                </div>
            </div>
            <!-- <h5 class="card-header" style="background-color:#008080; color: white;"><b>Ouvrages</b></h5> -->
            <div class="card-body">
                <table class="table table-striped" id="">
                    <thead>
                        <tr>
                            <th scope="col">Référence</th>
                            <th scope="col">Laboratoire</th>
                            <th scope="col">Type</th>
                            <th scope="col">Date Prélèvement</th>
                            <th scope="col">Date Ecrasement</th>
                            <th scope="col">Intervalle</th>
                            <th scope="col">FCI</th>
                            <th scope="col">Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eprouvettes as $eprv)
                            <tr>
                                <th>{{$eprv->epr_id}}</th>
                                <th scope="col">@if ( $eprv->epr_entrp_ctc==1) {{ "Externe" }} @else {{ "CTC" }} @endif</th>
                                <th scope="col">{{$eprv->eprv_type}}</th>
                                <th scope="col">{{ date('d-m-Y', strtotime($eprv->pe_date)) }}</th>
                                <th scope="col">{{ date('d-m-Y', strtotime($eprv->epr_date_ecras))  }}</th>
                                <th scope="col">{{ floor((strtotime($eprv->epr_date_ecras) - strtotime($eprv->pe_date)) / 86400) }} Jours</th>
                                <th scope="col">{{$eprv->epr_fci}}</th>
                                <th scope="col">
                                    <button type="button" value="{{$eprv->epr_id}}" class="btn EditForm" data-toggle="modal" data-target="#EditForm" > <i class="fas fa-edit" style="color:blue" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='blue'"></i> </button>
                                    <a href="admin/eprouvettes/del/{{$eprv->epr_id}}">
                                        <i class="fas fa-trash-alt" style="color:red" onMouseOver="this.style.color='#900000'" onMouseOut="this.style.color='red'"></i>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    
                    </tfoot>
                </table>
                </div>
                <div class="card-footer" style="align-items:right;">
                {{ $eprouvettes->links() }}
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-lg-10" style="margin:auto;">
            <div class="card ">
                <div class="card-header" style="border-top: 3px solid rgb(201, 53, 69); ">
                    <div class="row " >
                        <div class="col-sm-8" style="color:black">    
                                <h4>Eprouvettes</h4>
                        </div>
                        <div class="col-sm-4" style="float:right">     -->
                        <!-- Button trigger modal -->
                            <!-- <a type="" href="{{ route('AddEprv') }}" class="btn btn-success btn-lg" style="float:right" >Ajouter</a>
                                            
                        </div>
                </div>
            </div> -->
            <!-- <h5 class="card-header" style="background-color:#008080; color: white;"><b>Ouvrages</b></h5> -->
            <!-- <div class="card-body">
                <table class="table table-striped" id="showTest">
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>Laboratoire</th>
                            <th>Type</th>
                            <th>Date Prélèvement</th>
                            <th>Date Ecrasement</th>
                            <th>Intervalle</th>
                            <th>FCI</th>
                            <th>Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Référence</td>

                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
        </div>
        </div>
    </div> -->
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


<!-- test Vanilla JS -->
<script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>

 
<script>
// $(document).ready(function () {
//     $('#showTest').dataTable( {
//         "serverSide": true,
//         "ajax": {
//             'url':"{{route('EprouvettesTest')}}",
//             'type': "GET",
//         },
//         columns: [
//             { "data": "epr_ref" },
//             { "data": "epr_lab" },
//             { "data": "epr_type" },
//             { "data": "pe_date_prelev" },
//             { "data": "pe_date_ecras" },
//             { "data": "epr_fci" },
//             { "data": "epr_id", "name": "id" }
//         ]
//     } );
// });


    // Get Sites List 
    // var code_affaire = '';


    //   $(document).ready(function(){
    //     $('#prj').keyup(function(){
    //        var prj = $('#prj').val();
    //        code_affaire = prj;
    //     $('#site').html('');
    //         $.ajax({
    //             url:'admin/tsites/'+prj,
    //             type:'GET',
    //             data:{},
    //             dataType: "json",
    //             success:function(data)
    //             {
    //                 $.each(data, function(key, sites)
    //                 {     
    //                     $('#site').prop('disabled', false).append('<option value="'+sites.Code_Site+'" >'+sites.Code_Site+'</option>');
    //                 });
    //                 console.log(data);
    //                 if (data.length === 1) {
    //                     (function(){
    //        var site = $('#site').val();
    //        console.log(site)
    //        $('#ouvrage').html('');
    //         $.ajax({
    //             url:'admin/tblocs/'+code_affaire+'/'+site,
    //             type:'GET',
    //             data:{},
    //             dataType: "json",
    //             success:function(data)
    //             {
    //                 console.log(data);
    //                 $.each(data, function(key, ouvrages)
    //                 {  
    //                     $('#ouvrage').prop('disabled', false).append('<option value="'+ouvrages.Code_Bloc+'">'+ouvrages.Code_Bloc+'</option>');
    //                 });
    //              }
    //         });
    //     })()
    //                 }
    //             }
    //         });
    //     });
    //   });
    
    // // Get ouvrage List
    // $(document).ready(function(){
    //     $('#site').change(function(){
    //        var site = $('#site').val();
    //        console.log(site)
    //        $('#ouvrage').html('');
    //         $.ajax({
    //             url:'admin/tblocs/'+code_affaire+'/'+site,
    //             type:'GET',
    //             data:{},
    //             dataType: "json",
    //             success:function(data)
    //             {
    //                 $.each(data, function(key, ouvrages)
    //                 {  
    //                     $('#ouvrage').prop('disabled', false).append('<option value="'+ouvrages.Code_Bloc+'">'+ouvrages.Code_Bloc+'</option>');
    //                 });
    //             }
    //         });
    //     });
    //   });

    //   // Get Elements List
    // $(document).ready(function(){
    //     $('#ouvrage').change(function(){
    //        var ouv = $('#ouvrage').val();
    //     //    console.log(ouv)
    //        $('#elem').html('');
    //         $.ajax({
    //             url:'admin/getElement/'+ouv,
    //             type:'GET', 
    //             data:{},
    //             dataType: "json",
    //             success:function(data)
    //             {
    //                 $.each(data, function(key, elements){  
    //                     $('#elem').prop('disabled', false).append('<option value="'+elements.elem_id+'" >'+elements.elem_code+'</option>');
    //                 });
    //             }
    //         });
    //     });
    //   });

    //   $(document).ready(function(){
    //     $('#elem').change(function(){
    //        var prelev = $('#elem').val();
    //     //    console.log(ouv)
    //        $('#prelev').html('');
    //         $.ajax({
    //             url:'admin/getPrelevement/'+prelev,
    //             type:'GET', 
    //             data:{},
    //             dataType: "json",
    //             success:function(data)
    //             {
    //                 $.each(data, function(key, prelevements)
    //                 {  
    //                 $('#prelev').prop('disabled', false).append('<option value="'+prelevements.pe_id+'">'+prelevements.pe_id+'</option>');
    //                 });
    //             }
    //         });
    //     });
    //   });
// A terminer
    $(document).ready(function () {

        $(document).on('click', '.EditForm' ,function () {

            $('#EditForm').modal('show');
            var epr_id=$(this) .val();
            // console.log(epr_id);
            $.ajax({
                type:"GET",
                url:"admin/eprouvettes/"+epr_id,
                data: {},
                // dataType: "json",
                success: function (response) {
                // console.log(response);
                console.log(response.eprouvettes.epr_date_ecras);
                    $('#epr_id').val(response.eprouvettes.epr_id);
                    $('#epr_ref').val(response.eprouvettes.epr_ref);
                    $('#epr_date_ecras').val(response.eprouvettes.epr_date_ecras);
                    $('#epr_type').val(response.eprouvettes.epr_type);
                    $('#epr_fci').val(response.eprouvettes.epr_fci);
                }
            }) 
        });
    });

// Get daynamic data for search Info AFFAIRE from DB RCTC

    

    </script> 
@endsection