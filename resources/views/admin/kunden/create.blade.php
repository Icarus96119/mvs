@extends(Auth::user()->admin == '1' ? 'layouts/headmin' : 'layouts/app')

@section('content')
    <div class="container" style="background-color: #fff; padding-top: 10px;">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">Neuen Kunden erstellen</div>

                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


<form method="post" action="{{route('kunden.store')}}">
                            {{ csrf_field() }}
<div class="container" style="background-color: #fff;">
    <div class="row">

        <div class="col-md-12 col-md-offset-2" >

            <h4>Stammdaten</h4>

                        <div class="form-group">
                            <label>Anrede</label>
                            <select  class="form-control" name="anrede" id="anrede" >
                                <option value="herr" {{ old('anrede')=='herr'?'selected':'' }}>Herr</option>
                                <option value="frau" {{ old('anrede')=='frau'?'selected':'' }}>Frau</option>
                            </select>
                        </div>
                        
                            <div class="form-group">
                                <label for="vorname">Vorname</label>
                                <input type="text" class="form-control" name="vorname" id="vorname" placeholder="Vorname" value="{{ old('vorname') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nachname">Nachname</label>
                                <input type="text" class="form-control" name="nachname" id="nachname" placeholder="Nachname" value="{{ old('nachname') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="strasse">Straße</label>
                                <input type="text" class="form-control" name="strasse" id="strasse" placeholder="Strasse" value="{{ old('strasse') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="plz">PLZ</label>
                                <input type="number" class="form-control" name="plz" id="plz" placeholder="Plz" value="{{ old('plz') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="wohnort">Wohnort</label>
                                <input type="text" class="form-control" name="wohnort" id="wohnort" placeholder="Wohnort" value="{{ old('wohnort') }}" required>
                            </div>

                             <div class="form-group">
                                <label for="mail">Mail</label>
                                <input type="mail" class="form-control" name="mail" id="mail" placeholder="E-mail" value="{{ old('mail') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="telefon">Telefon</label>
                                <input type="text" class="form-control" name="telefon" id="telefon" placeholder="Telefon" value="{{ old('telefon') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="geburtsdatum">Geburtsdatum</label>
                                <input type="date" class="form-control" name="geburtsdatum" id="geburtsdatum" placeholder="Geburtsdatum" value="{{ old('geburtsdatum') }}" required>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary">Kunden anlegen</button>
                            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-danger">Abbrechen</button></a>

        </div>
    </div></div></form>
@endsection
