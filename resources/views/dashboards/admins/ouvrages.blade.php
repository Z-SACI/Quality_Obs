@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Ouvrages')
@section('content')

<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Gérer les Ouvrages</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item" ><a style="color:#008080" href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Ouvrages</li>
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
    <div class="card-header" style="border-top: 3px solid #008080; color:#fff;">
                <div class="row " >
					<div class="offset-sm-7 col-sm-5" style="float: right;">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
                        </form>	
                    </div>
                    
                </div>
    </div>
        <!-- <h5 class="card-header" style="background-color:#008080; color: white;"><b>Ouvrages</b></h5> -->
        <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">N°Convention</th>
                <th scope="col">Site</th>
                <th scope="col">Ouvrage</th>
                <th scope="col">Fck</th>
                <th scope="col">Classe Béton</th>
                <th scope="col"  style="text-align:center">Opérations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                <th scope="row">num 123</th>
                <td>{{$row->ouv_site}}</td>
                <td>{{$row->ouv_nom}}</td>
                <td>{{$row->ouv_fck}}</td>
                <td>{{$row->ouv_class}}</td>
                <td  style="text-align:center">
                    <a href="/admin/ouvrages/elements/{{ $row->ouv_id }}" >
                        <i class="fas fa-eye" ></i>
                    </a>
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
@endsection

