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
                <div class="card-header">Show Group</div>

                <div class="card-body">
                    <p>Willkommen <span style="text-transform: capitalize; font-weight: 600;">{{ Auth::user()->name }},</span><br />
                    was möchtest du erledigen?</p>

                  <div class="row">
                    <div class="col-3">      
                        <div id="accordion">
                          <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-link active" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Gruppen
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                <a class="d-block w-100 card-header active" href="{{ url('headmin/group') }}" style="padding: .25rem 1.5rem;">
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
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Benutzer
                                </button>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                <div class=" dropdown-menu-right">
                                    <a class="d-block w-100" href="{{ url('headmin/user') }}" style="padding: .25rem 1.5rem;">
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
                          Show Group
                        </div>
                        <div class="card-body">
                          <div>
                            <label for="">Group Name:</label>
                            <input type="text" class="form-control" id="" placeholder="Group Name" name="name" value="{{ $groupdata[0]->name }}" readonly>

                          </div>

                          <div>
                            <label for="">Postal Code:</label>
                            <input type="text" class="form-control" id="" placeholder="Address" name="address" value="{{ $groupdata[0]->postal_code }}" readonly>

                          </div>

                          <div>
                            <label for="">City:</label>
                            <input type="text" class="form-control" id="" placeholder="Address" name="address" value="{{ $groupdata[0]->city }}" readonly>

                          </div>

                          <div>
                            <label for="">Street:</label>
                            <input type="text" class="form-control" id="" placeholder="Address" name="address" value="{{ $groupdata[0]->street }}" readonly>

                          </div>

                          <div>
                            <label for="">Street Number:</label>
                            <input type="text" class="form-control" id="" placeholder="Address" name="address" value="{{ $groupdata[0]->street_num }}" readonly>

                          </div>


                          <div>
                            <label for="">Group Leader:</label>

                            @forelse($users as $user)

                                <input type="text" class="form-control" id="" placeholder="Group Leader" name="address" value="{{ $user->name }}" readonly>

                            @empty
                              <input type="text" class="form-control" id="" placeholder="Group Leader" name="address" readonly>
                            @endforelse
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

@endsection
