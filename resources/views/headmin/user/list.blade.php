@extends('layouts.headmin')

<style type="text/css">

.btn-primary {
  background: none !important;
  color: #666 !important;
  border: none !important;
}

#optionen li {
  float: left;
  margin: 0px 10px 0px 10px;
}

#optionen li:first-child {
  margin: 0px 10px 0px 0px
}
    .active {
      color: red !important;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List User</div>

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
                                    <a class="d-block w-100 card-header active" href="{{ url('headmin/user') }}" style="padding: .25rem 1.5rem;">
                                        Benutzer Anzeigen
                                    </a>
                                    <a class="d-block w-100" href="{{ url('headmin/user/create') }}" style="padding: .25rem 1.5rem;">
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
                          List User
                        </div>
                        <div class="card-body">
                          @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif


                          <h3>Alle Benutzer</h3>
                          <div class="table-responsive">
                              <table style="width:100%;" class="table">
                                  <thead>
                                  <tr>
                                      <th>Vorname</th>
                                      <th>E-Mail</th>
                                      <th style="width: 20%;">Optionen</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @forelse($users as $user)
                                      <tr>
                                          <td>{{$user->name}}</td>
                                          <td>{{$user->email}}</td>

                                          <td>
                                              <ul id="optionen">
                                                  <li><a href="{{route('user.show' ,$user->id)}}"><i class="fas fa-eye fa-lg icon"></i></a></li>
                                                  <li><a href="{{route('user.edit' ,$user->id)}}"><i class="fas fa-pencil-alt fa-lg icon"></i></a></li>
                                                  <li><a href="javascript: return false;" data-toggle="modal" data-target="#exampleModal" id='{{route('user.destroy' ,$user->id)}}' class="delete"><i class="fas fa-trash-alt fa-lg icon" style="color: red;"></i></a></li>
                                              </ul>
                                          </td>
                                      </tr>
                                  @empty
                                      <tr>No Group</tr>
                                  @endforelse
                                  </tbody>
                              </table>
                              @if($users)
                                <div class="text-center">
                                  {!! $users->render() !!}
                                </div>
                              @endif
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kunde löschen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Sind Sie sicher das Sie den Kunden löschen wollen? <br>
        <span style="color: red">Dieser Vorgang kann nicht rückgängig gemacht werden!</span>
      </div>
      <div class="modal-footer">
        <form method="post" action="">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
       <button  i style="padding: 5px !important;" type="submit" class="btn btn-danger btn-sm"> Löschen</button>
    </form>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Abbrechen</button>
      </div>
    </div>
  </div>
</div>
@endsection
