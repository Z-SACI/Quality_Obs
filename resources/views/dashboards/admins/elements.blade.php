@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title',"Elements de l'Ouvrage")
@section('content')
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3>Gérer les Eléments d'Ouvrages</h3>
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
					<div class="col-sm-6" style="">
                        <form class="form-inline">
                        @csrf
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
                        </form>	
                    </div>
                    <div class="col-sm-6">    
                        <a href="" class="btn btn-success" style="float:right; border-color:#fff" data-toggle="modal" onclick="hidediv()"><i class="material-icons">&#xE147;</i> <span>Ajouter</span></a>		
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
                                        <form class="form-horizontal" method="POST" action="{{ route('AddElement') }}" id="" style="color:black">
                                            @csrf
                                            <div class="form-group row" >
                                                <label for="elem_ouvrage" class="col-sm-3 col-form-label">Code Elément</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="{{$elemdata[0]->elem_ouvrage}}" name="elem_ouvrage" hidden>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Code Element</th>
                    <th scope="col">Element</th>
                    <th scope="col">Ouvrage</th>
                    <th scope="col" style="text-align:center">Opérations</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($elemdata as $row)
                    <tr>
                        <div>
                            <td scope="row">{{$row->elem_code}}</td>
                            <td>{{$row->elem_nom}}</td>
                            <td>{{$row->ouv_nom}}</td>
                            <td  style="text-align:center">
                                
                                <a href="/admin/ouvrages/elements/update/{{$row->elem_id}}" >
                                    <i class="fas fa-edit" style="color:#c58000" onMouseOver="this.style.color='orange'" onMouseOut="this.style.color='#c58000'"></i>
                                </a>
                                <a href="/admin/ouvrages/elements/delete/{{$row->elem_id}}">
                                    <i class="fas fa-trash-alt" style="color:red" onMouseOver="this.style.color='#900000'" onMouseOut="this.style.color='red'"></i>
                                </a><br>                   
                            </td>
                            <td>
                            <div class="row">
                                    <div class="row" >
                                        <a href="admin/ouvrages/elements{{$row->elem_id}}/prelevements" class="btn btn-outline-primary btn-sm" sata-toggle="modal"><span>Data CTC</span></a>		
                              <a href="admin/ouvrages/elements{{$row->elem_id}}/prelevementsEntreprise" class="btn btn-outline-secondary btn-sm" sata-toggle="modal"><span>Data Entreprise</span></a>
                                    </div>
                                </div>  
                            </td>
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
@endsection

