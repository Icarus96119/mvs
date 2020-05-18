@extends('layouts.app')

@section('content')



<link rel="stylesheet" type="text/css" href="css/login.css">


                     <p style="text-align: center;"><img src="img/logo.png"></p>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                

                <div class="card-body">

                    <h3>{{ __('Login') }}</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf



                        <div class="form-group">
                           

                            <div class="col-md-12">
                                <input id="email" placeholder="E-Mail Adresse" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

</div>
                           <div class="form-group">

                            <div class="col-md-12">
                                <input id="password" placeholder="Passwort" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">

                             <button type="submit" style="margin-left: 15px;" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Passwort vergessen?') }}
                                </a>

</div>
                        </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
