@extends(Auth::user()->admin == '1' ? 'layouts/headmin' : 'layouts/app')

<style type="text/css">


    .buttons .icon {
        margin-top:35px;
    }
</style>

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Profil</div>

                <div class="card-body">
                  @if(!empty($success))
                    <div class="alert alert-success">
                      <strong>Profil gespeichert.</strong>
                    </div>
                  @endif
                    <form action="{{ route('update_profile') }}" method="post">
                      {!! csrf_field() !!}

                      <div>
                        <label for="">Vorname:</label>
                        <input type="text" class="form-control" id="" placeholder="Vorname" name="name" value="{{ Auth::user()->name }}" required>
                        @if ($errors->has('name'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div>
                        <label for="">Nachname:</label>
                        <input type="text" class="form-control" id="" placeholder="Nachname" name="surname" value="{{ Auth::user()->surname }}">
                        @if ($errors->has('surname'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div>
                        <label for="">E-mail:</label>
                        <input type="email" class="form-control" id="" placeholder="E-mail" name="email" value="{{ Auth::user()->email }}" required>
                        @if ($errors->has('email'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div>
                        <label for="">Telefon:</label>
                        <input type="text" class="form-control" id="" placeholder="Telefon" name="phone" value="{{ Auth::user()->phone }}">
                        @if ($errors->has('phone'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                      </div>
<!--
                      <div>
                        <label for="">Mail Address:</label>
                        <input type="text" class="form-control" id="" placeholder="Mail Address" name="mail_address" value="{{ Auth::user()->mail_address }}">
                        @if ($errors->has('mail_address'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('mail_address') }}</strong>
                            </span>
                        @endif
                      </div>
-->


                      <div>
                        <label for="">Neues Passwort:</label>
                        <input type="password" class="form-control" id="" placeholder="Password" name="password">
                        @if ($errors->has('password'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div>
                        <label for="">Passwort bestätigen:</label>
                        <input type="password" class="form-control" id="" placeholder="Confirm Password" name="password_confirmation">
                      </div>

                      <hr/>

                      <button type="submit" class="btn btn-default">Speichern</button>
                    </form>

                </div>




            </div>
        </div>
    </div>
</div>

@endsection
