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
                                <h2>Se Connecter</h2>
                            </div>
                            <div class="row">
                                @if(Session::get('error'))
                                    <div class="alert alert-danger">
                                        {{Session::get('error')}}
                                    </div>
                                @endif
                                <form control="" class="form-group" method="POST" action="{{route('login')}}">
                                    @csrf
                                    <div class="row">
                                        <input type="text" name="email" id="user_name" class="form__input @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <!-- @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                        @endif -->
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <!-- <span class="fa fa-lock"></span> -->
                                        <input type="password" name="password" id="password" class="form__input @error('password') is-invalid @enderror" placeholder="Mot de Passe"  value="{{ old('password') }}" required autocomplete="password" autofocus>
                                        <!-- @if($errors->has('password'))
                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                        @endif -->
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                    </div>
                                    <!-- <div class="row">
                                        <input type="checkbox" name="remember_me" id="remember_me" class="">
                                        <label for="remember_me">Remember Me!</label>
                                    </div> -->
                                    <div class="row">
                                        <input type="submit" value="Submit" class="btn">
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <p>Don't have an account? Contact the Admin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection