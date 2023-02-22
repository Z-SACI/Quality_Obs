@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Ouvrages')
@section('content')
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Mettre à Jour l'Elément</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item" ><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Ouvrages</li>
                <li class="breadcrumb-item active">Element {{$element_data->elem_code}}</li>
                <li class="breadcrumb-item active">Mise à jour</li>
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
<div class="row">
<div class="col-lg-10" style="margin:auto;">
    <div class="card scale-up-ver-top">
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="admin/ouvrages/elements/save/{{$element_data->elem_id}} "  style="color:black">
            @csrf
                <div class="form-group row" >
                    <label for="elem_ouvrage" class="col-sm-3 col-form-label">Code Ouvrage</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{$element_data->elem_id}}" name="elem_id" hidden>
                        <input type="text" value="{{$element_data->elem_ouvrage}}" name="elem_ouvrage" hidden>
                        <input type="text" class="form-control"  placeholder="Introduisez le Code"  value="{{ $element_data->ouv_code }}" disabled>
                            
                    </div>
                </div>

                <div class="form-group row" >
                    <label for="elem_ouvrage" class="col-sm-3 col-form-label">Nom Ouvrage</label>
                    <div class="col-sm-9">
                        <input type="text" value="" name="elem_ouvrage" hidden>
                            <input type="text" class="form-control"  placeholder="Introduisez le Code"  value="{{ $element_data -> ouv_nom }}" disabled>
                            
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Code de l'Elément</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="{{$element_data -> elem_code}}" name="elem_code" >
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Nom de l'Elément</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Introduisez l'élément de l'ouvrage" value="{{$element_data -> elem_nom}}" name="elem_nom" >
                        
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-10 col-sm-2" >
                        <button type="submit" class="btn btn-success" >Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection