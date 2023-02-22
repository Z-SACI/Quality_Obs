@extends('layouts.layout')
@section('content')    
        <!-- Main Content -->
        <div class="main">
            <div class="container-fluid">
                <div class="row main-content bg-success text-center">
                    <div class="col-md-4 text-center company__info">
                        <span class="company__logo">
                            <img class="logo" src="{{ url('/img/logo.png') }}" alt="Logo">
                        </span>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                        <div class="container-fluid">
                            <div class="row">
                                <h2>Enregistrement</h2>
                            </div>
                            <div class="row">
                                <form control="" class="form-group" method="POST" action="{{route('register')}}">
                                    @if ( Session::get('success'))
                                        <span class="alert alert-success" role="alert">
                                                <strong>{{Session::get('success')}}</strong>
                                        </span>
                                    @endif
                                    @if ( Session::get('error'))
                                        <span class="alert alert-success" role="alert">
                                                <strong>{{Session::get('error')}}</strong>
                                        </span>
                                    @endif
                                    @csrf
                                    <div class="row">
                                        <input id="name" type="text" placeholder="Prénom" class="form__input input2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror    
                                    </div>
                                    <div class="row">
                                    <input id="lastname" type="text" placeholder="Nom" class="form__input input2 @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}"  autocomplete="lastname" autofocus>
                                        @error('lastname')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <input id="jobtitle" type="text" placeholder="Poste Occupé" class="form__input input2 @error('jobtitle') is-invalid @enderror" name="jobtitle" value="{{ old('jobtitle') }}"  autocomplete="jobtitle" autofocus>

                                        @error('jobtitle')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <input id="email" type="email" placeholder="E-mail" class="form__input input2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <input id="password" type="password" placeholder="Mot de Passe" class="form__input input2 @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <input id="password-confirm" type="password" placeholder="Confirmer MDP" class="form__input input2" name="password_confirmation"  autocomplete="new-password">
                                    </div>
                                    <div class="row">
                                        <input type="submit" value="Submit" class="btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection