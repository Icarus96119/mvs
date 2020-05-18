
@extends(Auth::user()->admin == '1' ? 'layouts/headmin' : 'layouts/app')

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

</style>
@section('content')
    <div class="container" style="background:#fff; padding-top: 15px;">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    <form action="{{route('search')}}" method="POST" >
                    @csrf
                      <h2 style="float: left;">Kunden</h2>
                      <input type="hidden" name="user_id" value="{{$user->id}}">
                      <input type="text" style="float: left; margin-right: 5px; margin-left: 20px;" placeholder="Vorname" name="filter_Vorname">
                      <input type="text" style="float: left; margin-right: 5px;" placeholder="Nachname" name="filter_Nachname">
                      <input type="text" style="float: left; margin-right: 5px;" placeholder="KundenID" name="filter_KundenID">
                      <input type="text" style="float: left; margin-right: 5px;" placeholder="Stadt" name="filter_Stadt">
                      <input type="submit" class="btn btn-sm btn-success" value="Suchen">
                    </form>

                    </div>

                    <div class="panel-body">



                       <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>KundenID</th>
        <th>Anrede</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Straße</th>
        <th>PLZ</th>
        <th>Stadt</th>
        <th>Telefon</th>
        <th>Geburtsdatum</th>
        <th>User</th>
        <th>Group</th>
        <th style="width: 150px;">Optionen</th>
      </tr>
    </thead>

    @if(count($kundens)>0)

    <tbody>
   @foreach($kundens as $kunden)
      <tr>
        <td><a href="/mvs/mvs/public/admin/kunden/{{ $kunden->id }}/view">{{ $kunden->id }}</a></td>
        <td>{{ $kunden->anrede!=''?ucfirst($kunden->anrede):'-' }}</td>
        <td>{{ $kunden->vorname }}</td>
        <td>{{ $kunden->nachname }}</td>
        <td>{{ $kunden->strasse }}</td>
        <td>{{ $kunden->plz }}</td>
        <td>{{ $kunden->wohnort }}</td>
        <td>{{ $kunden->telefon }}</td>
        <td>{{ $kunden->geburtsdatum }}</td>
        @if(isset($kunden->myuser))
          <td>{{ $kunden->myuser->name }}</td>
          <td>@if(isset($kunden->myuser->mygroup))
              {{ $kunden->myuser->mygroup->name }}
              @else
              @endif
          </td>
          <td>
            <ul id="optionen">
              <li><a href="{{route('kunden.show',$kunden->id)}}"><i class="fas fa-eye fa-lg icon"></i></a></li>
              <li>
                @if(Auth::user()->admin == "1")
                  <a href="{{route('kunden.edit',$kunden->id)}}"><i class="fas fa-pencil-alt fa-lg icon"></i></a>
                @else
                  @if($kunden->myuser->mygroup !== null)
                    @if($kunden->myuser->mygroup->name == Auth::user()->mygroup->name )
                      <a href="{{route('kunden.edit',$kunden->id)}}"><i class="fas fa-pencil-alt fa-lg icon"></i></a>
                    @else
                      <a href="{{route('kunden.edit',$kunden->id)}}" onclick="javascript:return false;" style="color: grey;"><i class="fas fa-pencil-alt fa-lg icon"></i></a>
                    @endif
                  @else
                    <a href="{{route('kunden.edit',$kunden->id)}}" ><i class="fas fa-pencil-alt fa-lg icon"></i></a>
                  @endif
                @endif


              </li>
              <li>
                @if(Auth::user()->admin == "1")
                  <a href="javascript: return false;" data-toggle="modal" data-target="#exampleModal" id='{{route('kunden.destroy',$kunden->id)}}' class="delete"><i class="fas fa-trash-alt fa-lg icon" style="color: red;"></i></a>
                @else

                @endif
              </li>
            </ul>
          </td>
        @else
          <td></td>
          <td></td>
          <td>
            <ul id="optionen">
              <li><a href="{{route('kunden.show',$kunden->id)}}"><i class="fas fa-eye fa-lg icon"></i></a></li>
              <li>

                  <a href="{{route('kunden.edit',$kunden->id)}}"><i class="fas fa-pencil-alt fa-lg icon"></i></a>

              </li>
              <li>
                @if(Auth::user()->admin == "1")
                  <a href="javascript: return false;" data-toggle="modal" data-target="#exampleModal" id='{{route('kunden.destroy',$kunden->id)}}' class="delete"><i class="fas fa-trash-alt fa-lg icon" style="color: red;"></i></a>
                @else

                @endif
              </li>
            </ul>
          </td>
        @endif

      </tr>
      @endforeach
    </tbody>
      @endif
  </table>
  @if($kundens)
    <div class="text-center">
      {!! $kundens->render() !!}
    </div>
  @endif
  </div>
</div>

                            <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
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
       <button  i style="padding: 5px !important;" type="submit" class="btn btn-danger btn-sm"> Löschen</button></li>
    </form>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Abbrechen</button>
      </div>
    </div>
  </div>
</div>


@endsection
