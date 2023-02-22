@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title',"Elements de l'Ouvrage")
@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un Nouveau Prélèvement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{route('admin.prelevement_add')}}" id="" style="color:black">
          @csrf
          <div class="form-group row" >
              <label for="pe_date" class="col-sm-3 col-form-label">Date de Prélèvement</label>
              <div class="col-sm-3">
                  <input type="text" value="{{$prelevdata[0]->pe_element}}" name="pe_element" hidden>
                  <input type="text" class="form-control"  placeholder="Introduisez le Code" id="#pe_data"  name="pe_date">
                  <span class="text-danger error-text name_error"></span>
              </div>
              <label for="inputEmail" class="col-sm-3 col-form-label">Affaissement du Cone</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_affais_cone" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Prouvenance Granulas</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_gran_prov" >
                  <span class="text-danger error-text email_error"></span>
              </div>
              <label for="inputEmail" class="col-sm-3 col-form-label">dMax Granulas</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_gran_dmax" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Provenance Sable</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_sable_prov" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Type du Ciment</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_cim_type" >
                  <span class="text-danger error-text email_error"></span>
              </div>
              <label for="inputEmail" class="col-sm-3 col-form-label">Provenance Ciment</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_cim_prov" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">E/C</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_cim_ec" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Mode de Production</label>
              <div class="col-sm-9">
                <select name="pe_mode_prod">
                    @foreach($modes as $mode)
                        <option value="{{$mode->mode_id}}">{{$mode->mode_prod}}</option>
                    @endforeach
                </select>
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Observation</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_obs" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-md btn-primary">Enregistrer</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal EDIT -->
<div class="modal fade" id="EditForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mise A Jours</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{ route('UpdPrelevement') }}" id="" style="color:black">
          @csrf
          <div class="form-group row" >
              <label for="pe_date" class="col-sm-3 col-form-label">Date de Prélèvement</label>
              <div class="col-sm-3">
                  <input type="text"  id="pe_id" name="pe_id" hidden>
                  <input type="text" value="" id="pe_date" class="form-control"  placeholder="Introduisez le Code"  name="pe_date">
                  <span class="text-danger error-text name_error"></span>
              </div>
              <label for="inputEmail" class="col-sm-3 col-form-label">Affaissement du Cone</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_affais_cone" id="pe_affais_cone" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Prouvenance Granulas</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_gran_prov" id="pe_gran_prov" >
                  <span class="text-danger error-text email_error"></span>
              </div>
              <label for="inputEmail" class="col-sm-3 col-form-label">dMax Granulas</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_gran_dmax" id="pe_gran_dmax" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Provenance Sable</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_sable_prov" id="pe_sable_prov" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Type du Ciment</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" id="pe_cim_type" name="pe_cim_type" >
                  <span class="text-danger error-text email_error"></span>
              </div>
              <label for="inputEmail" class="col-sm-3 col-form-label">Provenance Ciment</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" id="pe_cim_prov" name="pe_cim_prov" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">E/C</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_cim_ec" id="pe_cim_ec" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Mode de Production</label>
              <div class="col-sm-9">
                <select  id="pe_mode_prod" name="pe_mode_prod">
                    <option id="mode_prod" selected></option> 
                      @foreach($modes as $mode)
                        <option value="{{$mode->mode_id}}">{{$mode->mode_prod}}</option>
                      @endforeach
                </select>
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Observation</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" id="pe_obs" name="pe_obs" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-md btn-primary">Enregistrer</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal List EPROUVETTES -->
<div class="modal fade" id="ListEpr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Liste d'Eprouvettes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Référence <p id="ep_id"></p></th>
              <th scope="col">Date Ecrasement</th>
              <th scope="col">FCI</th>
              <th scope="col">Type Eprouvette</th>
            </tr>
          </thead>
          <tbody id="eprouvList">
            <!-- @foreach($eprouvettes as $epr)
                <tr>
                  <td>{{$epr->epr_ref}}</td>
                  <td>{{$epr->epr_date_ecras}}</td>
                  <td>{{$epr->epr_fci}}</td>
                  <td>{{$epr->eprv_type}}</td>
                </tr>    
            @endforeach -->
          </tbody>
        </table>
        <!-- <form class="form-horizontal" method="POST" action="{{route('admin.prelevement_add')}}" id="" style="color:black">
          @csrf
          <div class="form-group row" >
              <label for="pe_date" class="col-sm-3 col-form-label">Date de Prélèvement</label>
              <div class="col-sm-3">
                  <input type="text" value="{{$prelevdata[0]->pe_element}}" name="pe_element" hidden>
                  <input type="text" class="form-control"  placeholder="Introduisez le Code" id="#pe_data"  name="pe_date">
                  <span class="text-danger error-text name_error"></span>
              </div>
              <label for="inputEmail" class="col-sm-3 col-form-label">Affaissement du Cone</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_affais_cone" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Prouvenance Granulas</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_gran_prov" >
                  <span class="text-danger error-text email_error"></span>
              </div>
              <label for="inputEmail" class="col-sm-3 col-form-label">dMax Granulas</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_gran_dmax" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Provenance Sable</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_sable_prov" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Type du Ciment</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_cim_type" >
                  <span class="text-danger error-text email_error"></span>
              </div>
              <label for="inputEmail" class="col-sm-3 col-form-label">Provenance Ciment</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_cim_prov" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">E/C</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_cim_ec" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Mode de Production</label>
              <div class="col-sm-9">
                <select name="pe_mode_prod">
                    @foreach($modes as $mode)
                        <option value="{{$mode->mode_id}}">{{$mode->mode_prod}}</option>
                    @endforeach
                </select>
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Observation</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_obs" >
                  <span class="text-danger error-text email_error"></span>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-md btn-primary">Enregistrer</button> -->
      </div>
      <!-- </form> -->
    </div>
  </div>
</div>

<!-- ################################################################################ -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h4>Prélèvements CTC</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item" ><a style="color:red" href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.ouvrages')}}">Ouvrages</a></li>
                <li class="breadcrumb-item active">Eléments</li>
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
<div class="row justify-content-center">
<div class="col-lg-10" >
    <div class="card scale-up-ver-top">
        <div class="card-header" style="border-top: 3px solid #008080; color:#fff;">
                <div class="row" >
                    <div class="col-sm-12">    
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-success btn-sm" style="float:right;" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="material-icons">&#xE147;</i> <span>Ajouter</span>
                      </button>                   
                    </div>
                </div>
                <div class="row" id="hidediv" style="display:none;">
                    <div class="col-lg-12">
                        <hr>
                    </div>
                    <div class="col-lg-10" style="margin:auto">
                        <div class="card scale-up-ver-top" style="border: 0.5px solid #7b7b7bef">
                            <div class="card-body" style="box-shadow: 5px 5px 3px #7b7b7bef">
                                <div class="tab-content" >
                                    <div class="active tab-pane">
                                        <form class="form-horizontal" method="POST" action="" id="" style="color:black">
                                            @csrf
                                            <div class="form-group row" >
                                                <label for="elem_ouvrage" class="col-sm-3 col-form-label">Code Elément</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="" name="elem_ouvrage" hidden>
                                                    <input type="text" class="form-control"  placeholder="Introduisez le Code"  name="elem_code">

                                                    <span class="text-danger error-text name_error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-3 col-form-label">Nom de l'Elément</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="" name="elem_nom" >
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-7 col-sm-3" >
                                                    <button type="submit" class="btn btn-success" >Enregistrer</button>
                                                </div>
                                                <div class=" col-sm-2" >
                                                    <a type="" class="btn btn-danger" onclick="annuler()">Annuler</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- <h5 class="card-header" style="background-color:#008080; color: white;"><b>Ouvrages</b></h5> -->
        <div class="card-body">
            
            <table id="myTable" class="table table-striped no-wrap">
                <thead>
                    <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Affaissement</th>
                    <th scope="col">Prov Granulas</th>
                    <th scope="col">Dmax</th>
                    <th scope="col" style="text-align:center">Opérations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prelevdata as $row)
                      <tr >
                        <td>{{$row->pe_date}}</td>
                        <td>{{$row->pe_affais_cone}}</td>
                        <td>{{$row->pe_gran_prov}}</td>
                        <td>{{$row->pe_gran_dmax}}</td>
                        <td  style="text-align:center">
                          <button class="btn btn-primary btn-sm ListEpr" class="clickable" data-toggle="collapse" id="collapse{{$row->pe_id}}" data-target=".collapse{{$row->pe_id}}">Eprouvettes</button>
                          <button type="button" value="{{$row->pe_id}}" class="btn EditForm" data-toggle="modal" data-target="#EditForm" > <i class="fas fa-edit" style="color:red" onMouseOver="this.style.color='#900000'" onMouseOut="this.style.color='red'"></i> </button>
                          <a href="admin/ouvrages/prelevements/delete/{{$row->pe_id}}">
                            <i class="fas fa-trash-alt" style="color:red" onMouseOver="this.style.color='#900000'" onMouseOut="this.style.color='red'"></i>
                          </a>
                        </td>
                      </tr>
                      <!-- <tr class="collapse collapse{{$row->pe_id}}">
                        <td colspan="5">
                          <table class="table scale-up-ver-top table-stripped table-dark col-11" style="margin:auto">
                            <thead>
                              <tr>
                                <th scope="col">Référence</th>
                                <th scope="col">Date Ecrasement</th>
                                <th scope="col">FCI</th>
                                <th scope="col">Type Eprouvette</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($eprouvettes->where('epr_prelev','=',$row->pe_id) as $epr)
                                <tr>
                                  <td>{{$epr->epr_ref}}</td>
                                  <td>{{$epr->epr_date_ecras}}</td>
                                  <td>{{$epr->epr_fci}}</td>
                                  <td>{{$epr->eprv_type}}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </td>
                    </tr> -->
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
              var pe_id=$(this) .val();
              console.log(pe_id);
              $.ajax({
                type:"GET",
                url:"admin/ouvrages/upd_prelevement/"+pe_id,
                success: function (response) {
                  console.log((response));
                  $('#pe_id').val(response.prelev_ecras.pe_id);
                  $('#pe_date').val(response.prelev_ecras.pe_date);
                  $('#pe_affais_cone').val(response.prelev_ecras.pe_affais_cone);
                  $('#pe_gran_prov').val(response.prelev_ecras.pe_gran_prov);
                  $('#pe_gran_dmax').val(response.prelev_ecras.pe_gran_dmax);
                  $('#pe_sable_prov').val(response.prelev_ecras.pe_sable_prov);
                  $('#pe_cim_type').val(response.prelev_ecras.pe_cim_type);
                  $('#pe_cim_type').val(response.prelev_ecras.pe_cim_type);
                  $('#pe_cim_prov').val(response.prelev_ecras.pe_cim_prov);
                  $('#pe_cim_ec').val(response.prelev_ecras.pe_cim_ec);
                  $('#pe_obs').val(response.prelev_ecras.pe_obs);
                  $('#pe_mode_prod').val(response.prelev_ecras.pe_mode_prod);
                }
              }) 
            });

            // $(document).on('click', '.ListEpr' ,function () {

            // $('#ListEpr').modal('show');
            // var pe_id=$(this).val();
            // console.log(pe_id);
          //   $.ajax({
          //       type:"GET",
          //       url:"admin/ouvrage/prelevements/eprouvettes/"+pe_id,
          //       cache:true,
          //       dataType: 'JSON',
          //       success: function (response) {
          //         console.log((response));
          //         var data= response;
          //         $.each(response.eprouvettes, function (key, value) {
          //           $('#eprouvList').append("<tr>\
          //               <td hidden>"+value.epr_id+"</td>\
          //               <td>"+response.epr_ref+"</td>\
          //               <td>"+response.epr_date_ecras+"</td>\
          //               <td>"+response.epr_fci+"</td>\
          //               <td>"+response.epr_type+"</td>\
          //             </tr>");
          //         })
          //       }
          //   })
          //   // console.log(pe_id);
          //   //  alert(pe_id);
          // });
        });
    </script>
    
@endsection