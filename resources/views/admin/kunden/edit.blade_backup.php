@extends(Auth::user()->admin == '1' ? 'layouts/headmin' : 'layouts/app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>

        $(document).ready(function(){
            $('.new_form').hide();
            $('.ten_fields').hide();

            $('#add_calcualtion_form').click(function(){
                $('.new_form').show();
            });

            $('#ten_field_controller').click(function(){
                $('.ten_fields').show();
                $('#new_form_controller').val(1);
            });
        });

        function openTimeLine(cardNo){
            $('.ten_fields-'+cardNo).show();
            $('.isTM-'+cardNo).val(1);

            var timeLinerBtnText = $('.addTimeLiner-'+cardNo).text();
            if ( timeLinerBtnText == "Add Timeline" ) {
                $('.addTimeLiner-'+cardNo).text('Remove Timeline');
                $('.addTimeLiner-'+cardNo).removeClass('btn-primary');
                $('.addTimeLiner-'+cardNo).addClass('btn-danger');
                
                var timeLiner = `<div class="row ten_fields-`+cardNo+` mt-35">
                                        <div class="col-sm-12">
                                            <h5>Zeitstrahl Phase 1</h5>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Finanzierungsbedarf</label>
                                            <input type="text" id="finanzierungsbedarf_phase_eins" name="Cal[`+cardNo+`][timeline][finanzierungsbedarf_phase_eins]" class="form-control" placeholder="0€" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Zins p.a.</label>
                                            <input type="text" id="jahreszins_phase_eins" name="Cal[`+cardNo+`][timeline][jahreszins_phase_eins]" class="form-control" placeholder="%" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Laufzeit</label>
                                            <input type="text" id="laufzeit_phase_eins" name="Cal[`+cardNo+`][timeline][laufzeit_phase_eins]" class="form-control" placeholder="Jahre" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">monatliche Rate</label>
                                            <input type="text" id="rate_monatlich_phase_eins" name="Cal[`+cardNo+`][timeline][rate_monatlich_phase_eins]" class="form-control" placeholder="0€" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Restschuld Phase 1</label>
                                            <input type="text" id="restschuld_phase_eins" name="Cal[`+cardNo+`][timeline][restschuld_phase_eins]" class="form-control" placeholder="" value="" required>
                                        </div>
                                    </div>
                                    <div class="row ten_fields-`+cardNo+`">
                                        <div class="col-sm-12">
                                            <h5>Zeitstrahl Phase 2</h5>
                                        </div>

                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Finanzierungsbedarf</label>
                                            <input type="text" id="finanzierungsbedarf_phase_zwei" name="Cal[`+cardNo+`][timeline][finanzierungsbedarf_phase_zwei]" class="form-control" placeholder="0€" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Zins p.a.</label>
                                            <input type="text" id="jahreszins_phase_zwei" name="Cal[`+cardNo+`][timeline][jahreszins_phase_zwei]" class="form-control" placeholder="%" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Laufzeit</label>
                                            <input type="text" id="laufzeit_phase_zwei" name="Cal[`+cardNo+`][timeline][laufzeit_phase_zwei]" class="form-control" placeholder="Jahre" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">monatliche Rate</label>
                                            <input type="text" id="rate_monatlich_phase_zwei" name="Cal[`+cardNo+`][timeline][rate_monatlich_phase_zwei]" class="form-control" placeholder="0€" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label for="bank">Restschuld</label>
                                            <input type="text" id="restschuld_ende" name="Cal[`+cardNo+`][timeline][restschuld_ende]" class="form-control" placeholder="Jahre" value="" required>
                                        </div>
                                    </div>`;
                                    $('.thisTimeline-'+cardNo).html(timeLiner);
            }
            else if ( timeLinerBtnText == "Remove Timeline" ) {
                $('.addTimeLiner-'+cardNo).text('Add Timeline');
                $('.addTimeLiner-'+cardNo).removeClass('btn-danger');
                $('.addTimeLiner-'+cardNo).addClass('btn-primary');
                $('.thisTimeline-'+cardNo).html('');
            }            
        }

        function addNewCalc(){
            $('.new_form').show();
            $('#timelineChecker').val(1); 
            var target = $('#Calculation');
            var cardNo = target.find('.card').length;
            var Calc = `<div class="card card-`+cardNo+`">
                            <div class="card-header" id="heading-`+cardNo+`">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-`+cardNo+`">
                                        Finanzbaustein #`+(cardNo+1)+`
                                    </button>
                                    <span class="removeCard float-right"><i class="fa fa-times" onclick="removeCard(`+cardNo+`)"></i></span>
                                </h2>
                            </div>
                            <div id="collapse-`+cardNo+`" class="collapse" data-parent="#Calculation">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Bank</label>
                                                <select id="bank" class="form-control" name="Cal[`+cardNo+`][bank]">
                                                    <option value="Deutsche Bank">Deutsche Bank</option>
                                                    <option value="DSL">DSL</option>
                                                    <option value="Sparkasse">Sparkasse</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>King of Calculation</label>
                                                <select id="annuities" class="form-control" name="Cal[`+cardNo+`][annuities]">
                                                    <option value="Annuitäten">Annuitäten</option>
                                                    <option value="Tilgungsausgesetztes Darlehen">Tilgungsausgesetztes Darlehen</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Sollzins</label>
                                                <input type="text" id="to_interest" value="" class="form-control" name="Cal[`+cardNo+`][to_interest]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Effektivzins</label>
                                                <input type="text" id="effectiveness" value="" class="form-control" name="Cal[`+cardNo+`][effectiveness]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Zinsbindung</label>
                                                <input type="text" id="fixed_interest_rates" value="" class="form-control" name="Cal[`+cardNo+`][fixed_interest_rates]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Monthly Loan</label>
                                                <input type="text" id="monthly_loan" value="" class="form-control" name="Cal[`+cardNo+`][monthly_loan]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Restschuld Ende Zinsbindung</label>
                                                <input type="text" id="residual_debt_interest_rate" value="" class="form-control" name="Cal[`+cardNo+`][residual_debt_interest_rate]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Kalkulierte Luafzeit (ca.)</label>
                                                <input type="text" id="calculated_luaf_time" value="" class="form-control" name="Cal[`+cardNo+`][calculated_luaf_time]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Nettodarlehensbetrag</label>
                                                <input type="text" id="net_loan_amount" value="" class="form-control" name="Cal[`+cardNo+`][net_loan_amount]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Bereitsellungszins</label>
                                                <input type="text" id="initial_interest" value="" class="form-control" name="Cal[`+cardNo+`][initial_interest]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Optionale Soundertilgung</label>
                                                <input type="text" id="optional_sound_recovery" value="" class="form-control" name="Cal[`+cardNo+`][optional_sound_recovery]" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="hidden" class="isTM-`+cardNo+`"  name="Cal[`+cardNo+`][istm]" value="0">
                                                <a onclick="openTimeLine(`+cardNo+`)" href="Javacript:void(0)" class="btn btn-primary addTimeLiner-`+cardNo+`">Add Timeline</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="thisTimeline-`+cardNo+`"></div>
                                    
                                </div>
                            </div>
                        </div>`;
            target.append(Calc);
        }
    </script>
@endsection

@section('content')

    <form id="kunden_edit_form" method="post" action="{{route('kunden.update',$kunden->id)}}">
        
        <input type="hidden" id="new_form_controller" value="0">

        <div class="container" style="padding-top:10px; background-color: #fff;">
            <div class="panel-heading"><h2>{{ $kunden->vorname }} {{ $kunden->nachname }} bearbeiten</h2></div>
            <hr/>

            <div class="panel-body">
                @if($errors->any() && !$errors->has('success'))
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($errors->has('success'))
                    <div class="alert alert-success" role="alert">{{$errors->first('success')}}</div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-3 col-md-offset-2" id="finanzierungsbedarf">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <h4>Baufinanzierungsdaten</h4>
                    <div class="form-group">
                        <label for="kaufpreis">Kaufpreis des Objekts</label>
                        <input type="text" class="form-control" name="kaufpreis" id="kaufpreis"
                               placeholder="{{ number_format($kunden->kaufpreis, 2, ',', '.') }}€" value="{{ $kunden->kaufpreis }}">
                    </div>

                    <div class="form-group">
                        <label for="kostenumbau">Umbau/Modernisierung</label>
                        <input type="text" class="form-control" name="kostenumbau" id="kostenumbau"
                               placeholder="{{ number_format( $kunden->kostenumbau, 2, ',', '.') }}€" value="{{ $kunden->kostenumbau }}">
                    </div>

                    <div class="form-group">
                        <label for="kostennotar">Notar/Gericht</label>
                        <input type="text" class="form-control" name="kostennotar" id="kostennotar"
                               placeholder="{{ number_format( $kunden->kostennotar, 2, ',', '.') }}€" value="{{ $kunden->kostennotar }}">
                    </div>

                    <div class="form-group">
                        <label for="grunderwerbssteuer">Grunderwerbssteuer</label>
                        <input type="text" class="form-control" name="grunderwerbssteuer" id="grunderwerbssteuer"
                               placeholder="{{ number_format( $kunden->grunderwerbssteuer, 2, ',', '.') }}€" value="{{ $kunden->grunderwerbssteuer }}">
                    </div>

                    <div class="form-group">
                        <label for="maklerkosten">Maklerkosten</label>
                        <input type="text" class="form-control" name="maklerkosten" id="maklerkosten"
                               placeholder="{{ number_format( $kunden->maklerkosten, 2, ',', '.') }}€" value="{{ $kunden->maklerkosten }}">
                    </div>

                    <div class="form-group">
                        <label for="gesamtkosten">Gesamtkosten</label>
                        <input type="text" class="form-control" name="gesamtkosten" id="gesamtkosten"
                               placeholder="{{ number_format( $kunden->gesamtkosten, 2, ',', '.') }}€" value="{{ $kunden->gesamtkosten }}">
                    </div>

                    <div class="form-group">
                        <label for="eigenkapital">Eigenkapital</label>
                        <input type="text" class="form-control" name="eigenkapital" id="eigenkapital"
                               placeholder="{{ number_format( $kunden->eigenkapital, 2, ',', '.') }}€" value="{{ $kunden->eigenkapital }}">
                    </div>

                    <div class="form-group">
                        <label for="finanzierungsbedarf">Finanzierungsbedarf</label>
                        <input type="text" class="form-control" name="finanzierungsbedarf" id="finanzierungsbedarf"
                               placeholder="{{ number_format( $kunden->finanzierungsbedarf, 2, ',', '.') }}€" value="{{ $kunden->finanzierungsbedarf }}">


                    </div>
                </div>

                <div class="col-md-9 col-md-offset-2">
                    <h4>Stammdaten</h4>
                    <div class="form-group">
                        <label class="col-form-label" for="vorname">Vorname</label>
                        <input type="text" class="form-control" name="vorname" id="vorname"
                               placeholder="{{ $kunden->vorname }}" value="{{ $kunden->vorname }}" >
                    </div>
                    <div class="form-group">
                        <label for="nachname">Nachname</label>
                        <input type="text" class="form-control" name="nachname" id="nachname"
                               placeholder="{{ $kunden->nachname }}" value="{{ $kunden->nachname }}" >
                    </div>

                    <div class="form-group">
                        <label for="strasse">Straße</label>
                        <input type="text" class="form-control" name="strasse" id="strasse"
                               placeholder="{{ $kunden->strasse }}" value="{{ $kunden->strasse }}" >
                    </div>

                    <div class="form-group">
                        <label for="plz">PLZ</label>
                        <input type="number" class="form-control" name="plz" id="plz" placeholder="{{ $kunden->plz }}"
                               value="{{ $kunden->plz }}" >
                    </div>

                    <div class="form-group">
                        <label for="wohnort">Wohnort</label>
                        <input type="text" class="form-control" name="wohnort" id="wohnort"
                               placeholder="{{ $kunden->wohnort }}" value="{{ $kunden->wohnort }}" >
                    </div>

                    <div class="form-group">
                        <label for="mail">Mail</label>
                        <input type="mail" class="form-control" name="mail" id="mail" placeholder="{{ $kunden->mail }}"
                               value="{{ $kunden->mail }}" >
                    </div>

                    <div class="form-group">
                        <label for="telefon">Telefon</label>
                        <input type="text" class="form-control" name="telefon" id="telefon"
                               placeholder="{{ $kunden->telefon }}" value="{{ $kunden->telefon }}" >
                    </div>

                    <div class="form-group">
                        <label for="geburtsdatum">Geburtsdatum</label>
                        <input type="date" class="form-control" name="geburtsdatum" id="geburtsdatum"
                               placeholder="{{ $kunden->geburtsdatum }}" value="{{ $kunden->geburtsdatum }}"
                               >
                    </div>
                    <div class="form-group">
                        <label>Benutzer auswählen</label>
                        <select class="form-control" name="kunden_user">
                          @forelse($users as $user)
                            @if(isset($kunden->myuser))

                              @if ($kunden->myuser->name == $user->name)
                              <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                              @else
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                              @endif
                            @else
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                          @empty
                            <option>Please select group to show...</option>
                          @endforelse

                        </select>
                    </div>
                    <br>
                    
                    <input type="hidden" id="timelineChecker" name="timelineChecker" value="0" />
                    <button type="submit" class="btn btn-primary">Kunden aktualisieren</button>

                    <hr>

                    <a onclick="addNewCalc()" href="Javascript:void(0)" class="btn btn-primary">Kalkulation hinzufügen</a>



                    <div class="accordion mt-35" id="Calculation">
                        <?php $cIndex = 0 ?>
                        @foreach($Calculations as $cal)
                            <div class="card card-{{$cIndex}}">
                                <div class="card-header" id="heading-{{$cIndex}}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{$cIndex}}">
                                            Finanzbaustein #{{$cIndex+1}}
                                        </button>
                                        <span class="removeCard float-right"><i class="fa fa-times" onclick="removeCard({{$cIndex}})"></i></span>
                                    </h2>
                                </div>
                                <div id="collapse-{{$cIndex}}" class="collapse" data-parent="#Calculation">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Bank</label>
                                                    <select id="bank" class="form-control" name="Cal[{{$cIndex}}][bank]">
                                                        <option @if($cal->bank == 'Deutsche Bank') selected @endif value="Deutsche Bank">Deutsche Bank</option>
                                                        <option @if($cal->bank == 'DSL') selected @endif value="DSL">DSL</option>
                                                        <option @if($cal->bank == 'Sparkasse') selected @endif value="Sparkasse">Sparkasse</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Til</label>
                                                    <select id="annuities" class="form-control" name="Cal[{{$cIndex}}][annuities]">
                                                        <option @if($cal->annuities == 'Annuitäten') selected @endif value="Annuitäten">Annuitäten</option>
                                                        <option @if($cal->annuities == 'Tilgungsausgesetztes Darlehen') selected @endif value="Tilgungsausgesetztes Darlehen">Tilgungsausgesetztes Darlehen</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Sollzins</label>
                                                    <input type="text" id="to_interest" value="{{$cal->to_interest}}" class="form-control" name="Cal[{{$cIndex}}][to_interest]" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Effektivzins</label>
                                                    <input type="text" id="effectiveness" value="{{$cal->effectiveness}}" class="form-control" name="Cal[{{$cIndex}}][effectiveness]" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Zinsbindung</label>
                                                    <input type="text" id="fixed_interest_rates" value="{{$cal->fixed_interest_rates}}" class="form-control" name="Cal[{{$cIndex}}][fixed_interest_rates]" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Monthly Loan</label>
                                                    <input type="text" id="monthly_loan" value="{{$cal->monthly_loan}}" class="form-control" name="Cal[{{$cIndex}}][monthly_loan]" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Restschuld Ende Zinsbindung</label>
                                                    <input type="text" id="residual_debt_interest_rate" value="{{$cal->residual_debt_interest_rate}}" class="form-control" name="Cal[{{$cIndex}}][residual_debt_interest_rate]" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Kalkulierte Luafzeit (ca.)</label>
                                                    <input type="text" id="calculated_luaf_time" value="{{$cal->calculated_luaf_time}}" class="form-control" name="Cal[{{$cIndex}}][calculated_luaf_time]" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Nettodarlehensbetrag</label>
                                                    <input type="text" id="net_loan_amount" value="{{$cal->net_loan_amount}}" class="form-control" name="Cal[{{$cIndex}}][net_loan_amount]" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Bereitsellungszins</label>
                                                    <input type="text" id="initial_interest" value="{{$cal->initial_interest}}" class="form-control" name="Cal[{{$cIndex}}][initial_interest]" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Optionale Soundertilgung</label>
                                                    <input type="text" id="optional_sound_recovery" value="{{$cal->optional_sound_recovery}}" class="form-control" name="Cal[{{$cIndex}}][optional_sound_recovery]" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="Cal[{{$cIndex}}][id]" value="{{$cal->id}}">
                                                    <input type="hidden" class="isTM-{{$cIndex}}"  name="Cal[{{$cIndex}}][istm]" value="0">
                                                    @if(isset($cal->timeline->id))
                                                    <a onclick="openTimeLine({{$cIndex}})" href="Javacript:void(0)" class="btn btn-danger addTimeLiner-{{$cIndex}}">Remove Timeline</a>
                                                    @else 
                                                    <a onclick="openTimeLine({{$cIndex}})" href="Javacript:void(0)" class="btn btn-primary addTimeLiner-{{$cIndex}}">Add Timeline</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="thisTimeline-{{$cIndex}}">
                                            @if(isset($cal->timeline->id))
                                            <input type="hidden" name="Cal[{{$cIndex}}][timeline][id]" value="{{$cal->timeline->id}}">
                                                <div class="row ten_fields-{{$cIndex}} mt-35">
                                                    <div class="col-sm-12">
                                                        <h5>Zeitstrahl Phase 1</h5>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Finanzierungsbedarf</label>
                                                    <input type="text" id="finanzierungsbedarf_phase_eins" name="Cal[{{$cIndex}}][timeline][finanzierungsbedarf_phase_eins]" class="form-control" placeholder="0€" value="{{$cal->timeline->finanzierungsbedarf_phase_eins}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Zins p.a.</label>
                                                        <input type="text" id="jahreszins_phase_eins" name="Cal[{{$cIndex}}][timeline][jahreszins_phase_eins]" class="form-control" placeholder="%" value="{{$cal->timeline->jahreszins_phase_eins}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Laufzeit</label>
                                                        <input type="text" id="laufzeit_phase_eins" name="Cal[{{$cIndex}}][timeline][laufzeit_phase_eins]" class="form-control" placeholder="Jahre" value="{{$cal->timeline->laufzeit_phase_eins}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">monatliche Rate</label>
                                                        <input type="text" id="rate_monatlich_phase_eins" name="Cal[{{$cIndex}}][timeline][rate_monatlich_phase_eins]" class="form-control" placeholder="0€" value="{{$cal->timeline->rate_monatlich_phase_eins}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Restschuld Phase 1</label>
                                                        <input type="text" id="restschuld_phase_eins" name="Cal[{{$cIndex}}][timeline][restschuld_phase_eins]" class="form-control" placeholder="" value="{{$cal->timeline->restschuld_phase_eins}}" required>
                                                    </div>
                                                </div>
                                                <div class="row ten_fields-{{$cIndex}}">
                                                    <div class="col-sm-12">
                                                        <h5>Zeitstrahl Phase 2</h5>
                                                    </div>
            
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Finanzierungsbedarf</label>
                                                        <input type="text" id="finanzierungsbedarf_phase_zwei" name="Cal[{{$cIndex}}][timeline][finanzierungsbedarf_phase_zwei]" class="form-control" placeholder="0€" value="{{$cal->timeline->finanzierungsbedarf_phase_zwei}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Zins p.a.</label>
                                                        <input type="text" id="jahreszins_phase_zwei" name="Cal[{{$cIndex}}][timeline][jahreszins_phase_zwei]" class="form-control" placeholder="%" value="{{$cal->timeline->jahreszins_phase_zwei}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Laufzeit</label>
                                                        <input type="text" id="laufzeit_phase_zwei" name="Cal[{{$cIndex}}][timeline][laufzeit_phase_zwei]" class="form-control" placeholder="Jahre" value="{{$cal->timeline->laufzeit_phase_zwei}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">monatliche Rate</label>
                                                        <input type="text" id="rate_monatlich_phase_zwei" name="Cal[{{$cIndex}}][timeline][rate_monatlich_phase_zwei]" class="form-control" placeholder="0€" value="{{$cal->timeline->rate_monatlich_phase_zwei}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label for="bank">Restschuld</label>
                                                        <input type="text" id="restschuld_ende" name="Cal[{{$cIndex}}][timeline][restschuld_ende]" class="form-control" placeholder="Jahre" value="{{$cal->timeline->restschuld_ende}}" required>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        <?php $cIndex++; ?>
                        @endforeach
                    </div>



                    <div class="row mt-15">
                        <div class="col-sm-12 @if(count($Calculations) == 0) new_form @endif">
                            <button type="submit" value="calculation" name="calculation" class="btn btn-primary float-right">Berechnung speichern</button>
                        </div>
                    </div>

                    <hr>
                    <h4>Tilgungsplan</h4>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label for="bank">Bank</label>
                            <input type="text" id="bank" class="form-control"  value="Deutsche Bank">
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="bank">Darlehen</label>
                            <input type="number" class="form-control" id="loan" placeholder="150.000,00€">
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="bank">Nominalzins(%)</label>
                            <input type="number" class="form-control" name="interest" id="interest" placeholder=2.19%>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="bank">Tilgung (%)</label>
                            <input type="number" class="form-control" name="repayment" id="repayment" placeholder=2.00%>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label for="bank">Tilgungsbeginn</label>
                            <input type="date"  class="form-control" name="repaymentStart" id="repaymentStart" value="2018-04-01">
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="fixed_interest_rate">Zinsfestschreibung</label>
                            <input type="date" class="form-control"  name="fixedInterestRate" id="fixedInterestRate" value="2028-04-30">
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="payout">Auszahlung</label>
                            <input type="date" class="form-control" name="payout" id="payout" value="2018-04-01">
                        </div>
                        <div class="col-sm-3 form-group">
                            <label for="bank">Rate</label>
                            <input type="number" class="form-control"  name="rate" id="rate" value=523.75>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#repayment_modal" type="button"  onclick="calculate()">Kalkulieren</button>
                            <button class="btn btn-danger" type="button"  data-toggle="modal" data-target="#confirm_modal">Tilgungsplan löschen</button>
                        </div>
                    </div>
                    <label for="result" id="result"></label>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="repayment_modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title pull-left">Tilgungsplan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" >
                    <div>
                        <table id="example" class="display" style="width:100%; height: 500px !important; overflow: scroll">
                            <thead>
                            <tr>
                                <th>Rückzahlungsdatum</th>
                                <th>Zinsen</th>
                                <th>Tilgung</th>
                                <th>Darlehensrest</th>
                            </tr>
                            </thead>
                            <tbody style="height: 500px !important;">

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm_modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title pull-left">Info</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" >
                    <p>Soll der Tilgungsplan gelöscht werden??</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                    <button type="button" class="btn btn-primary" id="confirm_delete_yes" onclick="deleteCalc()">Ja</button>
                </div>
            </div>
        </div>
    </div>

    {{csrf_field()}}

    <script type="text/javascript">

        function removeCard(cardNo) {
            $('.card-' + cardNo).remove();
        }

        function save_timeline() {
            // alert('1');
            //if ( confirm('Are you sure you want to submit?') ) {
            var tenFieldFlag = $('#new_form_controller').val();
            //var serializeForm = $('#kunden_edit_form').serializeArray();
            
            /* setTimeout(function(){ 
                $("#kunden_edit_form").submit(); 
            }, 500); */
            
            /* $.ajax({
                url: 'save_timeline',
                type: 'post',
                data: {
                    _token: $('[name="_token"]').val(),

                    // New 11 fields 
                    bank: $('#bank').val(),
                    annuities: $('#annuities').val(),
                    to_interest: $('#to_interest').val(),
                    effectiveness: $('#effectiveness').val(),
                    fixed_interest_rates: $('#fixed_interest_rates').val(),
                    monthly_loan: $('#monthly_loan').val(),
                    residual_debt_interest_rate: $('#residual_debt_interest_rate').val(),
                    calculated_luaf_time: $('#calculated_luaf_time').val(),
                    net_loan_amount: $('#net_loan_amount').val(),
                    initial_interest: $('#initial_interest').val(),
                    optional_sound_recovery: $('#optional_sound_recovery').val(),
                    prepared_by: $('#prepared_by').val(),

                    // New 10 fields flag
                    ten_fields_flag: tenFieldFlag,

                    jahreszins_phase_eins: $('#jahreszins_phase_eins').val(),
                    laufzeit_phase_eins: $('#laufzeit_phase_eins').val(),
                    rate_monatlich_phase_eins: $('#rate_monatlich_phase_eins').val(),
                    finanzierungsbedarf_phase_zwei: $('#finanzierungsbedarf_phase_zwei').val(),
                    jahreszins_phase_zwei: $('#jahreszins_phase_zwei').val(),
                    laufzeit_phase_zwei: $('#laufzeit_phase_zwei').val(),
                    rate_monatlich_phase_zwei: $('#rate_monatlich_phase_zwei').val(),
                    restschuld_ende: $('#restschuld_ende').val(),
                    restschuld_phase_eins: $('#restschuld_phase_eins').val(),
                    finanzierungsbedarf_phase_eins: $('#finanzierungsbedarf_phase_eins').val(),                    
                    
                    fullForm: serializeForm
                },
                success: function(res) {
                    toastr.success(res);
                },
                error: function(error) {
                    var error = JSON.parse(error.responseText);
                    error = error.errors;
                    $.each(error, function(k, v){
                        toastr.error(k+': '+v[0]);
                    })
                }
            }); */
        }
        function deleteCalc() {
            $.ajax({
                url: 'delete_repayment',
                type: 'get',
                success: function (res) {
                    $('#confirm_modal').modal('hide');
                    alert("Kalkulation erfolgreich gelöscht.");
                }
            });
        }

        function calculate()
        {
            // Werte aus den Inputfeldern
            var loan = Number.parseFloat(document.getElementById("loan").value);
            var interest = Number.parseFloat(document.getElementById("interest").value);
            var repayment = Number.parseFloat(document.getElementById("repayment").value);
            var repaymentStart = document.getElementById("repaymentStart").value;
            var fixedInterestRate = document.getElementById("fixedInterestRate").value;
            var payout = document.getElementById("payout").value;
            var rate = Number.parseFloat(document.getElementById("rate").value);

            if(!(repaymentStart instanceof Date))
            {
                repaymentStart = new Date(repaymentStart);
            }

            if(!(fixedInterestRate instanceof Date))
            {
                fixedInterestRate = new Date(fixedInterestRate);
            }

            if(!(payout instanceof Date))
            {
                payout = new Date(payout);
            }

            // Werte für die Berechnung
            var calcInterest = 0;
            var calcRepayment = 0;

            var loansRest = loan;

            var months = monthDiff(payout, fixedInterestRate);
            var curPayoutDate = new Date(payout.getFullYear(), payout.getMonth() + 1, 0);	// Nur zu Ausgabezwecken

            var resultString = "";

            // Nun monatlich kalkulieren

            month_names_short = ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'];

            function changeString(s) {
                return s.toLocaleString('de-DE', {
                    style: 'currency',
                    currency: 'EUR',
                    minimumFractionDigits: 2
                });
            }
            var resarr = [];
            for(var i = 0; i <= months; i++)
            {
                calcInterest = (loansRest * interest / 12) / 100;
                calcRepayment = rate - calcInterest;
                loansRest -= calcRepayment;
                loansRest = loansRest;

                resultString += "<tr><td>" + month_names_short[curPayoutDate.getMonth()] + " " + curPayoutDate.getFullYear() + "</td><td>" + changeString(round(calcInterest, 2)) + "     " + "</td><td>" +changeString(round(calcRepayment, 2)) + "</td><td>" + changeString(round(loansRest, 2)) + "</td></tr>";

                curPayoutDate.setMonth(curPayoutDate.getMonth() + 1);

                var temp = {
                    'repayment_date':(month_names_short[curPayoutDate.getMonth()]) + " " + curPayoutDate.getFullYear(),
                    'zinsen': changeString(round(calcInterest, 2)),
                    'tilgung': changeString(round(calcRepayment, 2)),
                    'darlehensrest': changeString(round(loansRest, 2))
                };

                resarr.push(temp);
            }

            //console.log(resultString);
            // document.getElementById("result").innerHTML = resultString;

            $.ajax({
                url: 'save_repayment',
                type: 'post',
                data: {
                    _token: $('[name="_token"]').val(),
                    data: resarr
                },
                success: function (res) {
                    $('#example').find('tbody').html(resultString);
                }
            });
        }

        //Berechnet die Differenz in Monaten zweier Datetimes um die Laufzeit des Darlehens zu ermitteln
        function monthDiff(d1, d2) {
            var months;
            months = (d2.getFullYear() - d1.getFullYear()) * 12;
            months -= d1.getMonth() + 1;
            months += d2.getMonth();
            return months <= 0 ? 0 : months;
        }

        function round(value, decimals) {
            return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
        }

    </script>

@endsection
