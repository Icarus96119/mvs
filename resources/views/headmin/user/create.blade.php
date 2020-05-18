@extends(Auth::user()->admin == '1' ? 'layouts/headmin' : 'layouts/app')

<style type="text/css">


    .buttons .icon {
        margin-top:35px;
    }
    .active {
      color: red !important;
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
                <div class="card-header">Neuen Benutzer anlegen</div>

                <div class="card-body">
                    <p>Willkommen <span style="text-transform: capitalize; font-weight: 600;">{{ Auth::user()->name }},</span><br />
                    was möchtest du erledigen?</p>
                  <div class="row">
                    <div class="col-3">      
                        <div id="accordion">
                          <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Gruppen
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                <a class="d-block w-100" href="{{ url('headmin/group') }}" style="padding: .25rem 1.5rem;">
                                    Gruppen Anzeigen
                                </a>
                                <a class="d-block w-100" href="{{ url('headmin/group/create') }}" style="padding: .25rem 1.5rem;">
                                    Neue Gruppe hinzufügen
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link  active" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Benutzer
                                </button>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                <div class=" dropdown-menu-right">
                                    <a class="d-block w-100" href="{{ url('headmin/user') }}" style="padding: .25rem 1.5rem;">
                                        Benutzer Anzeigen
                                    </a>
                                    <a class="d-block w-100 card-header active" href="{{ url('headmin/user/create') }}" style="padding: .25rem 1.5rem;">
                                        Neuen Benutzer hinzufügen
                                    </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <a class="btn btn-link" href="{{ url('headmin/checklist') }}">
                                  Checkliste
                                </a>
                              </h5>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-9">
                      <div class="card">
                        <div class="card-header">
                          Neuen Benutzer anlegen
                        </div>
                        <div class="card-body">

                          <form action="{{ route('user.store')}}" method="post">
                            <!-- <form action="{{ '/headmin/user'}}" method="post"> -->
                              {!! csrf_field() !!}
                              <!-- <div>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="admin" name="admin" >
                                  <label class="custom-control-label" for="admin">Admin</label>
                                </div>
                              </div> -->
                              <div>
                                <label for="">Vorname:</label>
                                <input type="text" class="form-control" placeholder="Vorname" name="name" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                              </div>

                              <div>
                                <label for="">Nachname:</label>
                                <input type="text" class="form-control" placeholder="Nachname" name="surname" value="{{ old('surname') }}">

                              </div>

                              <div>
                                <label for="">Telefon:</label>
                                <input type="text" class="form-control" placeholder="Telefon" name="phone" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                              </div>

                              <div>
                                <label for="">E-mail:</label>
                                <input type="email" class="form-control" id="" placeholder="E-Mail" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                              </div>

        <!--                      <div>
                                <label for="">Mail Address:</label>
                                <input type="text" class="form-control" id="" placeholder="Adresse" name="mail_address" value="{{ old('mail_address') }}">

                              </div>
        -->
                              <div>
                                <label for="">Passwort:</label>
                                <input type="password" class="form-control" id="" placeholder="Passwort" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              </div>

                              <div>
                                <label for="">Passwort bestätigen:</label>
                                <input type="password" class="form-control" id="" placeholder="Confirm Password" name="password_confirmation" required>

                              </div>

                              <div>
                                <label for="">Gruppe:</label>
                                <select name="group" class="form-control">
                                  <!-- <option value="0"></option> -->
                                  @foreach($groups as $group)
                                      <option value="{{$group->id}}">{{$group->name}}</option>
                                  @endforeach
                                </select>

                              </div>

                              <hr/>
                              <button type="submit" class="btn btn-default">Erstellen</button>
                            </form>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
