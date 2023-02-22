@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Ouvrages')
@section('content')

<link rel="stylesheet" href="css/app.css">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-sm-4 offset-sm-2  mt-5">
              <h1>Prélèvement CTC</h1>
            </div>
            <div class="col-4  mt-5" style="float:right"><b>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Ajouter un Nouveau Prélèvement CTC</li>
                    </ol>
                </b>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- ICIIII -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card col-8 text-center p-0 mt-3 mb-3">
                <div class="card-body">
                    <form method="POST" action="{{route('SaveEprouvette')}}" class="msform">
                        @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Informations Affaire</strong></li>
                            <li id="personal"><strong>Personal</strong></li>
                            <li id="payment"><strong>Image</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="form-group row mr-2 ml-2">
                                    <label for="pe_date" class="col-sm-3 col-form-label">Affaire</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="prj" placeholder="Insérez le Code Affaire" class="form-control" name="elem_affaire" id="info_affaire">
                                    </div>
                                </div>
                                <div class="form-group row mr-2 ml-2">
                                    <label for="pe_date" class="col-sm-3 col-form-label">Site</label>
                                    <div class="col-sm-9">
                                        <select id="site" class="form-control" name="elem_site" disabled>
                                            <option>Site</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mr-2 ml-2">
                                    <label for="pe_date" class="col-sm-3 col-form-label">Bloc</label>
                                    <div class="col-sm-9">
                                        <select id="ouvrage" class="form-control" name="elem_bloc" disabled>
                                            <option>Bloc</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="button" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="form-group row mr-2 ml-2 " id="input1">
                                    <label for="elem_ouvrage" class="col-sm-3 col-form-label">Elément d'Ouvrage</label>
                                    <div class="col-sm-8">
                                        <select id="elem" class="form-control" id="input11" name="elem_id" disabled>
                                            <option>Elément d'Ouvrage</option>
                                        </select>
                                        <input type="text" value="NULL" id="input11" name="elem_nom" hidden>
                                    </div>
                                    <div class="col-sm-1">
                                        <a class="btn btn-md bg-danger col-sm-12" onclick="hidediv1()" class="btn btn-lg btn-danger mr-2" style="float:right">+</a>
                                    </div>
                                </div>
                            </div>
                            <!-- HIDDEN DIV -->
                            <div class="card" id="hidediv1" style="display:none;">
                                <div class="card-header">
                                    <h5 class="mb-0 ml-2"><b>Ajouter un Element d'Ouvrage</b></h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row mr-2 ml-2">
                                        <label class="col-sm-3 col-form-label">Référence de l'Element</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" id="input13">
                                            <span class="text-danger error-text email_error"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row mr-2 ml-2">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Element d'Ouvrage</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" id="input14">
                                            <span class="text-danger error-text email_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  END OF HIDEN DIV -->
                            <input type="button" class="next action-button" value="Next" />
                            <input type="button" class="previous action-button-previous" value="Previous" />

                        </fieldset>

                        <fieldset>
                            <div id="msform" class="msform">
                                <!-- progressbar -->
                                <div class="form-group row mr-2 ml-2 " id="input2">
                                    <label for="elem_ouvrage" class="col-sm-2 col-form-label">Prélèvement</label>
                                    <div class="col-sm-9 ">
                                        <select id="prelev" class="form-control" class="input21" name="pe_id" disabled>
                                            <option>Prélèvement</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <ahref="" class="btn btn-md bg-danger col-sm-12" onclick="hidediv2()" class="btn btn-lg btn-danger mr-2" style="float:right">+</a>
                                    </div>
                                </div>

                                <!-- HIDDEN DIV AJOUT PRELEV-->
                                <!-- fieldsets -->
                                <div id="hidediv2" style="display:none;">
                                    <div class="progress progress2">
                                        <div class="progress-bar progress-bar2 progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <br>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="form-group row mr-2 ml-2">
                                                <label for="pe_date" class="col-sm-3 col-form-label">Référence du Prélèvement</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Introduisez le Code" id="input22">
                                                </div>
                                            </div>
                                            <div class="form-group row mr-2 ml-2">
                                                <label for="pe_date" class="col-sm-3 col-form-label">Date de Coulage</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" placeholder="Introduisez le Code" id="#pe_data" name="pe_date">
                                                </div>
                                                <label for="pe_heure" class="col-sm-3 col-form-label">Heure de Coulage</label>
                                                <div class="col-sm-3">
                                                    <input type="time" class="form-control" placeholder="Introduisez le Code" id="#pe_data" name="pe_heure">
                                                </div>
                                            </div>
                                            <div class="form-group row mr-2 ml-2">
                                                <label for="pe_heure" class="col-sm-3 col-form-label">Localisation de l'chantillon</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Introduisez le Code" id="#pe_data" name="pe_local_ech">
                                                </div>
                                            </div>

                                            <div class="form-group row mr-2 ml-2">
                                                <label for="inputEmail" class="col-sm-3 col-form-label">Affaissement du Cone</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" name="pe_affais_cone">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" class="next action-button" value="Suivant" />
                                        <input type="button"  onclick="simulclick('rowhide2')" class="action-button-previous" value="Précédent" />
                                        <input type="button"  onclick="annuler2()" class="action-button-previous" value="X" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="form-group row mr-2 ml-2">
                                                <h5 class="col-sm-12">Informations sur le Constituant : Granulas</h5>
                                            </div>
                                            <hr class=" mb-2 mt-2">
                                            <div class="form-group row mr-2 ml-2">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Provenance</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_gran_prov">
                                                </div>
                                            </div>
                                            <div class="form-group row mr-2 ml-2">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">dMax</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_gran_dmax">
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Dosage</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_gran_dosage">
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next" />
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="form-group row mr-2 ml-2">
                                                <h5 class="col-sm-12">Informations sur le Constituant : Sables</h5>
                                            </div>
                                            <hr class=" mb-2 mt-2">
                                            <div class="form-group row mr-2 ml-2">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Provenance</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_sable_prov">
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row mr-2 ml-2">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Dosage</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_sable_dosage">
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next" />
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="form-group row mr-2 ml-2">
                                                <h5 class="col-sm-12 p-0">Informations sur le Constituant : Ciment</h5>
                                            </div>
                                            <hr class=" mb-2 mt-2">
                                            <div class="form-group row mr-2 ml-2">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Provenance</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_cim_prov">
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row mr-2 ml-2">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_cim_type">
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Dosage</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_cim_dosage">
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next" />
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="form-group row mr-2 ml-2">
                                                <h5 class="col-sm-12 p-0">Informations sur le Constituant : Adjuvant</h5>
                                            </div>
                                            <hr>
                                            <div class="form-group row mr-2 ml-2">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Provenance</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_adj_prov">
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row mr-2 ml-2">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_adj_type">
                                                </div>
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Dosage</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_adj_dosage">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next" />
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="form-group row mr-2 ml-2">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Rapport E/C</label>
                                                <div class="col-sm-4">
                                                    <input type="number" step=".01" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_cim_ec">
                                                </div>
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Mode de Production</label>
                                                <div class="col-sm-4">
                                                    <select class="custom-select" name="pe_mode_prod">
                                                        @foreach($modes as $mode)
                                                        <option value="{{$mode->mode_id}}" selected>{{$mode->mode_prod}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mr-2 ml-2">
                                                <label for="inputEmail" class="col-sm-3 col-form-label">Observation</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Introduisez l'élément de l'ouvrage" value="" name="pe_obs">
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" onclick="simulclick('rowhide1')" class="action-button" value="Next" />
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                </div>
                            </div>
                            <input type="button" id="rowhide1" class="next action-button" value="Next" />
                            <input type="button" id="rowhide2" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="firm-group ml-2 mr-2">
                                            <label>
                                                <h5><b>Informations Propre aux Eprouvettes</b></h5>
                                            </label>
                                            <input type="number" style="float:right" class="col-sm-3 form-control add_eprv" placeholder="Nombre d'éprouvettes" id="#pe_data" min="0" name="pe_nbre_prv">
                                        </div>
                                    </div>
                                    <div class="card-body eprv">

                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="action-button">Enregistrer</button>
                            <input type="button" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- needed fo tables and submition -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- for lhih form -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->


    <!-- test Vanilla JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script> -->
    <script>
        $(document).on('ready', function() {
            // initialization of form validation
            $.HSCore.components.HSValidation.init('.js-validate');
        });
    </script>

    <script>
        // Get Sites List 
        var code_affaire = '';


        $(document).ready(function() {
            $('#prj').keyup(function() {
                var prj = $('#prj').val();
                code_affaire = prj;
                $('#site').html('');
                $.ajax({
                    url: 'admin/sites/' + prj,
                    type: 'GET',
                    data: {},
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(key, sites) {
                            $('#site').prop('disabled', false).append('<option value="' + sites.code_site + '" >' + sites.code_site + '</option>');
                        });
                        // console.log(data);
                        if (data.length === 1) {
                            (function() {
                                var site = $('#site').val();
                                console.log(site)
                                $('#ouvrage').html('');
                                $.ajax({
                                    url: 'admin/bloc/' + code_affaire + '/' + site,
                                    type: 'GET',
                                    data: {},
                                    success: function(data) {
                                        console.log(data);
                                        $.each(data, function(key, ouvrages) {
                                            // console.log(ouvrages.Code_Bloc);
                                            $('#ouvrage').prop('disabled', false).append('<option value="' + ouvrages.code_bloc + '">' + ouvrages.code_bloc + '</option>');
                                        });
                                    }
                                });
                            })()
                        } else {
                            $('#ouvrage').html('');
                        }
                    }
                });
            });
        });

        // Get ouvrage List
        $(document).ready(function() {
            $('#site').change(function() {
                var site = $('#site').val();
                // console.log(site)
                // console.log(code_affaire);
                $('#ouvrage').html('');
                $.ajax({
                    url: 'admin/bloc/' + code_affaire + '/' + site,
                    type: 'GET',
                    data: {},
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        $.each(data, function(key, ouvrages) {
                            // console.log(ouvrages.code_bloc);
                            $('#ouvrage').prop('disabled', false).append('<option value="' + ouvrages.code_bloc + '">' + ouvrages.code_bloc + '</option>');
                        });


                    }
                });
                // $.ajax({
                //        url:'admin/blocs/'+code_affaire+'/'+site,

                //        success:function(data)
                //        {
                //            $.each(data, function(key, ouvrages){ 
                //                $('#ouvrage').prop('disabled', false).append('<option value="'+ouvrages.elem_bloc_rctc+'">'+ouvrages.elem_bloc_rctc+'</option>');
                //             });
                //        }
                // });
            });
        });

        // Get Elements List
        $(document).ready(function() {
            $('#ouvrage').change(function() {
                var bloc = $('#ouvrage').val();
                var site = $('#site').val();
                console.log(bloc);
                console.log(site);
                $('#elem').html('');
                $.ajax({
                    url: 'admin/elements/' + code_affaire + '/' + site + '/' + bloc,
                    type: 'GET',
                    data: {},
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $.each(data, function(key, elements) {
                            console.log(elements.elem_nom);
                            $('#elem').prop('disabled', false).append('<option value="' + elements.elem_id + '">' + elements.elem_nom + '</option>');
                        });
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#ouvrage').change(function() {
                var bloc = $('#ouvrage').val();
                var site = $('#site').val();
                console.log(bloc);
                console.log(site);
                $('#elem').html('');
                $.ajax({
                    url: 'admin/elements/' + code_affaire + '/' + site + '/' + bloc,
                    type: 'GET',
                    data: {},
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $.each(data, function(key, elements) {
                            console.log(elements.elem_nom);
                            $('#elem').prop('disabled', false).append('<option value="' + elements.elem_id + '" selected>' + elements.elem_nom + '</option>');
                        });
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#elem').change(function() {
                var elem = $('#elem').val();
                console.log(elem);
                $('#prelev').html('');
                $.ajax({
                    url: 'admin/prelevements/' + elem,
                    type: 'GET',
                    data: {},
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $.each(data, function(key, prelevements) {
                            console.log(prelevements.pe_id);
                            $('#prelev').prop('disabled', false).append('<option value="' + prelevements.pe_id + '" selected>' + prelevements.pe_id + '</option>');
                        });
                    }
                });
            });
        });
        // $.ajax({
        //     url:'admin/getPrelevement/'+prelev,
        //     type:'GET', 
        //     data:{},
        //     dataType: "json",
        //     async: true,
        //     success:function(data)
        //     {
        //         $.each(data, function(key, prelevements)
        //         {  
        //         $('#prelev').prop('disabled', false).append('<option value="'+prelevements.pe_id+'">'+prelevements.pe_id+'</option>');
        //         });
        //     }
        // });


        // A terminer
        // $(document).ready(function () {

        //     $(document).on('click', '.EditForm' ,function () {

        //         $('#EditForm').modal('show');
        //         var epr_id=$(this) .val();
        //         // console.log(epr_id);
        //         $.ajax({
        //             type:"GET",
        //             url:"admin/eprouvettes/"+epr_id,
        //             data: {},
        //             // dataType: "json",
        //             success: function (response) {
        //             // console.log(response);
        //             console.log(response.eprouvettes.epr_date_ecras);
        //                 $('#epr_id').val(epr_id);
        //                 $('#epr_ref').val(response.eprouvettes.epr_ref);
        //                 $('#epr_date_ecras').val(response.eprouvettes.epr_date_ecras);
        //                 $('#epr_type').val(response.eprouvettes.epr_type);
        //                 $('#epr_fci').val(response.eprouvettes.epr_fci);
        //             }
        //         }) 
        //     });
        // });

        // Get daynamic data for search Info AFFAIRE from DB RCTC
    </script>
    @endsection