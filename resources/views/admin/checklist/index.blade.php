
@extends('layouts.headmin')

<style type="text/css">


    .buttons .icon {
        margin-top:35px;
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
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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

                              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                  <a class="d-block w-100 " href="{{ url('headmin/group') }}" style="padding: .25rem 1.5rem;">
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
                                  <a class="btn btn-link active" href="{{ url('headmin/checklist') }}">
                                    Checkliste
                                  </a>
                                </h5>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="col-9" style="margin: auto">
                          <div class="card">
                            <div class="card-header">
                              <h3>Checkliste bearbeiten</h3>
                            </div>
                            <div class="card-body">
                              <form class="w-100" action="{{route('checklist')}}" method="post">
                                @csrf
                                <div class=" row">
                                  <div class="col-8">
                                    <input type="text" name="body" value="{{old('body')}}" class="form-control" style="margin-bottom: 15px" placeholder="">
                                    @if ($errors->has('body'))
                                        <span class="alert">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                    @endif
                                  </div>
                                  <div class="col-4">
                                    <select class="custom-select" name="category">
                                      @foreach($checklistCategory as $category)
                                      <option value="{{$category->id}}">{{$category->name}}</option>
                                      @endforeach
                                    </select>
                                    <p class="w-100 text-center"><a href="javascript:void(0)" class=" btn-sm w-100" data-toggle="modal" data-target="#manageCategoryModal">Kategorien bearbeiten</a></p>
                                  </div>
                                </div>
                                <p class="text-right p-10 mb-5"><button class="btn btn-primary">Neuen Punkt hinzufügen</button></p>
                              </form>
                              <ul>
                                @foreach($checklists as $checklist)
                                <li class="form-control mb-2">
                                    <div class="row checklist-item">
                                      <div class="col-8">
                                        <span>{{$checklist->body}}</span> | 
                                        <span>{{$checklist->category? $checklist->category->name : ''}}</span>
                                      </div>
                                      <div class="col-4 text-right">
                                          <a href="javascript:void(0)" data-id="{{$checklist->id}}" data-body="{{$checklist->body}}" data-category='{{$checklist->category}}' onclick="editFunction(this)"><i class="fas fa-pencil-alt"></i> bearbeiten</a> |
                                          <a href="javascript:void(0)" data-id="{{$checklist->id}}" onclick="deleteFunction(this)"><i class="fas fa-trash"></i> löschen</a>
                                      </div>
                                    </div>
                                </li>
                                @endforeach
                              </ul>
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
<div class="modal fade" id="manageCategoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categoryModalLabel">Kategorien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('checklistCategory')}}">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-8">                
                <input type="text" class="form-control" placeholder="Kategorie" name="name">
              </div>
              <div class="col-4">                
                <button type="submit" class="btn btn-primary mb-2">Neue Kategorie</button>
              </div>
            </div>
        </form>
        <ul>
          @foreach($checklistCategory as $category)
          <li class="form-control mb-2">
              <div class="row">
                <div class="col-8">
                  <span>{{$category->name}}</span>
                </div>
                <div class="col-4 text-right">
                    <a href="javascript:void(0)" data-id="{{$category->id}}" onclick="deleteCategoryFunction(this)"><i class="fas fa-trash"></i> löschen</a>
                </div>
              </div>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" data-dismiss="modal">Abbrechen</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="manageCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="manageCategoryModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('checklistCategory')}}">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-8">                
                <input type="text" class="form-control" placeholder="Kategorie" name="name">
              </div>
              <div class="col-4">                
                <button type="submit" class="btn btn-primary mb-2">Add Category</button>
              </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" data-dismiss="modal">Abbrechen</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  function deleteFunction(th) {
    $.ajax({
        url: "{{route('deleteChecklist')}}",
        type: 'post',
        data: {
            _token: $('[name="_token"]').val(),
            data_id: $(th).data('id')
        },
        success: function (res) {
          if(res.success == true) {
            $(th).parents('li').fadeOut();
          }
        }
    });
  }  
  function deleteCategoryFunction(th) {
    $.ajax({
        url: "{{route('deleteChecklistCategory')}}",
        type: 'post',
        data: {
            _token: $('[name="_token"]').val(),
            data_id: $(th).data('id')
        },
        success: function (res) {
          if(res.success == true) {
            $(th).parents('li').fadeOut();
          }
        }
    });
  }
  function editFunction(th) {
    let body = $(th).data('body');
    let category = $(th).data('category');
    console.log(category)
    console.log(JSON.stringify(category))
    let id = $(th).data('id');

    let content= `
          <div class="col-8">
            <form class="updateForm" style="margin: 0;" action="{{route('checklistUpdate')}}" method="post">
              @csrf
              <input type="hidden" name="data_id" value="`+id+`">
              <div class=" row">
                <div class="col-8">
                  <input type="text" name="body" value="`+body+`" class="w-100" placeholder="body text">
                </div>
                <div class="col-4">
                  <select class="custom-select" name="category">
                    @foreach($checklistCategory as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </form>
          </div>
          <div class="col-4 text-right">
              <a href="javascript:void(0)" onclick="updateFunction(this)"><i class="fas fa-list"></i> Update</a> |
              <a href="javascript:void(0)" data-id="`+id+`" data-body="`+body+`"  data-category='`+JSON.stringify(category)+`' onclick="cancelFunction(this)"><i class="fas fa-times"></i> abbrechen</a>
          </div>
          `;
          var masterDiv = $(th).parents('.checklist-item')
          $(th).parents('.checklist-item').html(content);
          $(masterDiv).find('select[name="category"]').val(category.id);
  }
  function updateFunction(th){
      $(th).parents('.checklist-item').find('form').submit();
  }
  function cancelFunction(th) {
    let body = $(th).data('body');
    let category = $(th).data('category');
    console.log(category)
    console.log(category.id)
    console.log(category.name)
    let id = $(th).data('id');
    let content= `
          <div class="col-8">
            <span>`+body+`</span> | 
            <span>`+category.name+`</span>
          </div>
          <div class="col-4 text-right">
              <a href="javascript:void(0)" data-id="`+id+`" data-body="`+body+`" data-category='`+JSON.stringify(category)+`'  onclick="editFunction(this)"><i class="fas fa-pencil-alt"></i> bearbeiten</a> |
              <a href="javascript:void(0)" data-id="`+id+`" onclick="deleteFunction(this)"><i class="fas fa-trash"></i> löschen</a>
          </div>
          `;
          $(th).parents('.checklist-item').html(content);
  }
</script>
@endsection
