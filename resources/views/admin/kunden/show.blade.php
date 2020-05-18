@extends(Auth::user()->admin == '1' ? 'layouts/headmin' : 'layouts/app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />

@endsection


<style type="text/css">

#button_edit a {
    color: #fff !important;
}


.check {
  cursor: pointer;
  position: relative;
  margin: auto;
  width: 18px;
  height: 18px;
  -webkit-tap-highlight-color: transparent;
  transform: translate3d(0, 0, 0);
}
.check:before {
  content: "";
  position: absolute;
  top: -15px;
  left: -15px;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: rgba(34,50,84,0.03);
  opacity: 0;
  transition: opacity 0.2s ease;
}
.check svg {
  position: relative;
  z-index: 1;
  fill: none;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke: #c8ccd4;
  stroke-width: 1.5;
  transform: translate3d(0, 0, 0);
  transition: all 0.2s ease;
}
.check svg path {
  stroke-dasharray: 60;
  stroke-dashoffset: 0;
}
.check svg polyline {
  stroke-dasharray: 22;
  stroke-dashoffset: 66;
}
.check:hover:before {
  opacity: 1;
}
.check:hover svg {
  stroke: #4285f4;
}
.cbx:checked + .check svg {
  stroke: #4285f4;
}
.cbx:checked + .check svg path {
  stroke-dashoffset: 60;
  transition: all 0.3s linear;
}
.cbx:checked + .check svg polyline {
  stroke-dashoffset: 42;
  transition: all 0.2s linear;
  transition-delay: 0.15s;
}
</style>

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection



@section('content')

<?php
    function stringReplace($string)
    {
        $tmp = explode('/', $string);
        $string = str_replace('/', '. ', $string);
        if ($tmp[0] < 10 ) {
            echo '0';
        }

        return $string;
    }

    function makeYearMonth($str) {
        $mon_tmp = '';
        $mon_str = substr($str, 0, 2);
        $year_str = substr($str, 3, 7);
        if ((int) $mon_str > 11) {
            $mon_tmp = '01';
            $year_str = $year_str + 1;
        } else {
            $mon_tmp = monthReplace($mon_str + 1);
        }
        return $mon_tmp.'.'.$year_str;
    }

    function monthReplace($string)
    {
        return (int) $string < 10 ? '0'.$string : $string;
    }

    function formatStringToNumber($string) {
        return  str_replace(',', '.', $string);
    }

    $bausparsumme = floatval(formatStringToNumber($kunden->finanzierungsbedarf));
    $contractFeeString = '';
    $newRateInpString = '';
    $new_borrowing_rate_Str = '';
    $restAmount;
    $monthlySaving;

    foreach ($CalData as $key => $val) {
        $contractFeeString = $val->acquisition_fee;
        $newRateInpString = $val->new_rate_inp;
        $restAmount = $val->outstanding_balance;
        $monthlySaving = $val->monthly_saving;
        $new_borrowing_rate_Str = $val->new_borrowing_rate;
    }

    $sonder_tilgung = 0;

    foreach ($new_repayments as $key => $val) {
        $sonder_tilgung = $val->sonder_tilgung;
    }


    $restAmount = floatval(formatStringToNumber($restAmount));
    $monthlySaving = floatval(formatStringToNumber($monthlySaving));
    $abschlussgebühr = floatval(formatStringToNumber($contractFeeString));
    $newRateInpString = str_replace('.', '', $newRateInpString);
    $new_borrowing_rate_Str = str_replace(',', '.', $new_borrowing_rate_Str);
    $new_rate_inp = floatval(formatStringToNumber($newRateInpString));
    $new_borrowing_rate = floatval(formatStringToNumber($new_borrowing_rate_Str));

    function calcuMonthList ($startDate) {
        $start    = (new DateTime($startDate))->modify('first day of this month');
        $end      = (new DateTime('2500-12-12'))->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 month');
        return new DatePeriod($start, $interval, $end);
    }
    $tempDate = '';

?>

<div class="container" style="background-color: #fff; padding-top: 10px;">

    <div class="row">
        <div class="col-md-8 col-md-offset-8">
            <div class="panel-heading"><h2 class="angebot">Persönliches Angebot für
                <br> {{ $kunden->vorname }} {{ $kunden->nachname }}</h2>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <img style="width: 300px !important;"
            src="https://www.mkhyp.de/wp-content/uploads/2017/08/logo_positiv.svg">

        </div>
    </div>
    <hr/>


    <div class="row">
        <div class="col-md-12 col-md-offset-12">
            <h4>Übersicht</h4>
            <h5>Persönliche Daten</h5>
            {{ $kunden->vorname }}<br>
            {{ $kunden->nachname }}<br>
            {{ $kunden->strasse }}<br>
            {{ $kunden->plz }}
            {{ $kunden->wohnort }}<br>
            <h5><b>Finanzierungsbedarf</b></h5>
            <table style="width:100%">
                <tr>
                    <td>Kaufpreis des Objekts</td>
                    <td>{{ number_format($kunden->kaufpreis, 2, ',', '.') }}€</td>
                </tr>
                <tr>
                    <td>Umbau/Modernisierung</td>
                    <td>{{ number_format($kunden->kostenumbau, 2, ',', '.') }}€</td>
                </tr>
                <tr>
                    <td>Notar/Gericht</td>
                    <td>{{ number_format($kunden->kostennotar_value, 2, ',', '.') }}€</td>
                </tr>
                <tr>
                    <td>Grunderwerbssteuer</td>
                     
                    <td>{{ number_format($kunden->grunderwerbssteuer_value, 2, ',', '.') }}€</td>
                </tr>

                <tr>
                    <td>Maklerkosten</td>
                    <td>{{ number_format($kunden->maklerkosten_value, 2, ',', '.') }}€</td>
                </tr>
                <tr>
                    <td>Gesamtkosten</td>
                    <td>{{ number_format($kunden->gesamtkosten, 2, ',', '.') }}€</td>
                </tr>
                <tr>
                    <td>Eigenkapital</td>
                    <td>{{ number_format($kunden->eigenkapital, 2, ',', '.') }}€</td>
                </tr>
                <tr>
                    <td>Finanzierungsbedarf</td>
                    <td>{{ number_format($kunden->loan_amount, 2, ',', '.') }}€</td>
                </tr>
            </table>
            <hr>
            <br>

        <div id="button_edit" style="position: fixed; right: 0px; margin-top: -270px; z-index: 111111; ">

<li class="nav-item"><a href="{{route('kunden.edit',$kunden->id)}}" class=" btn btn-mkhyp" style="border-radius: 0px;">Kunden bearbeiten</a></li>

</div>
@foreach ($CalData as $key=> $cal)
<h3 class="mt-15">Finanzierung<!--  {{ $key+1 }} --></h3>
<h5><b>Daten </b></h5>

<div style="max-height: 300px; overflow-y: scroll">
    @if ($cal->bausparer_flag == 'false')
        <table style="width:100%; max-height: 500px !important;">
            <thead>
                <tr>
                    <th scope="col">Kreditsumme </th>
                    <th scope="col">Zinsbindung</th>
                    <th scope="col">Auszahlungstermin</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ number_format($kunden->loan_amount, 2, ',', '.') }} &euro;</td>
                    <td>{{ $cal->loan_period }}</td>
                    <td>{{ monthReplace($cal->payment_month) }}. {{ $cal->payment_year}}</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <th scope="col">Auszahlungsbetrag</th>
                    <th scope="col">Sollzinssatz (Prozent)</th>
                    <th scope="col">Tilgungssatz (Prozent)</th>
                    <th scope="col">Monatsrate</th>
                    <th scope="col">Restschuld</th>
                </tr>
                <tr>
                    <td>{{ number_format($kunden->loan_amount, 2, ',', '.') }} &euro;</td>
                    <td>{{ $cal->borrowing_rate }} &#37;</td>
                    <td>{{ $cal->repayment_date_inp}} &#37;</td>
                    <td>{{ $cal->montly_deposit_val }} &euro;</td>
                    <td>{{ $cal->outstanding_balance }} &euro;</td>
                </tr>
                <tr>
                    <th scope="col">Neuer Sollzinssatz (Prozent)</th>
                    <th scope="col">Neuer Tilgungssatz (Proz.)</th>
                    <th scope="col">Neue Rate (Euro)</th>
                    <th scope="col">Gesamtlaufzeit (Jahre/Monate)</th>
                    <th scope="col"></th>
                </tr>
                <tr>
                    <td>{{ $cal->new_borrowing_rate }} &#37;</td>
                    <td>{{ $cal->new_repayment_rate_inp }} &#37;</td>
                    <td>{{ $cal->new_rate_inp }} &euro;</td>
                    <td>{{ $cal->total_maturity }} J / M</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="col">Effektivzins (Prozent)  </th>
                    <th scope="col">Anschlusskredit</th>
                    @if ( $cal->annual_unsheduled_val != 0 || $cal->onetime_unsheduled_val != 0 )
                        <th scope="col">Jährliche Sondertilgungen ab</th>
                        <th scope="col">bis</th>
                        <th scope="col">Einmalige Sondertilgung </th>
                    @else
                        <th scope="col" colspan="3"></th>
                    @endif
                </tr>
                <tr>
                    <td>{{ $cal->effective_interest }} &#37;</td>
                    <td>{{ $cal->connection_credit }}</td>
                    @if ( $cal->annual_unsheduled_val != 0 || $cal->onetime_unsheduled_val != 0 )
                        <td>{{ monthReplace($cal->annual_unsheduled_val) }}.{{ monthReplace($cal->annual_unsheduled_month) }}. {{ $cal->annual_unsheduled_year }}</td>
                        <td>{{ monthReplace($cal->annual_to_month) }}.{{ $cal->annual_to_year }}</td>
                        <td>{{ monthReplace($cal->onetime_unsheduled_val) }}. {{ monthReplace($cal->onetime_unsheduled_month) }}. {{ $cal->onetime_unsheduled_year}}</td>
                    @else
                        <td colspan="3"></td>
                    @endif
                </tr>
            </tbody>
        </table>
    @else
        <table style="width:100%; max-height: 500px !important;">
            <thead>
                <tr>
                    <td><strong>Bausparer Modell</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">Kreditsumme</th>
                    <th scope="col">Laufzeit</th>
                    <th scope="col">Auszahlungstermin</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                <tr>
                    <td>{{ number_format($kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</td>
                    <td>{{ $cal->loan_period }}</td>
                    <td>{{ monthReplace($cal->payment_month) }}. {{ $cal->payment_year}}</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <th scope="col">Auszahlungsbetrag</th>
                    <th scope="col">Sollzinssatz (Prozent)</th>
                    <th scope="col">Zinsen monatlich</th>
                    <th scope="col">Sparsumme</th>
                    <th scope="col">Monatliche Rate</th>
                </tr>
                <tr style="border: 1px solid black; border-top: none;">
                    <td>{{ number_format($kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</td>
                    <td>{{ $cal->borrowing_rate }} &#37;</td>
                    <td>{{ number_format((float)formatStringToNumber($cal->monthly_interest), 2, ',', '.') }} &euro;</td>
                    <td>{{ number_format((float)formatStringToNumber($cal->monthly_saving), 2, ',', '.') }} &euro;</td>
                    <td>{{ number_format((float)formatStringToNumber($cal->monthly_payment), 2, ',', '.') }} &euro;</td>
                </tr>
                <tr>
                    <td><strong>Anschlussdarlehen</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="col">Restschuld nach Sparphase</th>
                    <th scope="col" colspan="4"></th>
                </tr>
                <tr>
                    <td>{{ number_format((float)formatStringToNumber($cal->outstanding_balance), 2, ',', '.') }} &euro;</td>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <th scope="col">Neuer Sollzinssatz (Prozent)</th>
                    <th scope="col">Neuer Tilgungssatz (Proz.)</th>
                    <th scope="col">Neue Rate (Euro)</th>
                    <th scope="col">Gesamtlaufzeit (Jahre/Monate)</th>
                    <th scope="col"></th>
                </tr>
                <tr>
                    <td>{{ $cal->new_borrowing_rate }} &#37;</td>
                    <td>{{ $cal->new_repayment_rate_inp }} &#37;</td>
                    <td>{{ $cal->new_rate_inp }} &euro;</td>
                    <td>{{ $cal->total_maturity }} J / M</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="col">Effektivzins (Prozent)  </th>
                    <th scope="col" colspan="4"></th>
                </tr>
                <tr>
                    <td>{{ $cal->effective_interest }} &#37;</td>
                    <td colspan="4"></td>
                </tr>
            </tbody>
        </table>
    @endif
    </div>
    @php($period = calcuMonthList($tempDate))
    @if ($cal->bausparer_flag == 'true' && $cal->bausparer_pay_type == 'month')
        <h5 style="margin-top: 30px;"><b>Bausparer Tilgungsplan</b></h5>
        <div style="max-height: 300px; overflow-y: scroll;">
            <table style="width:100%; max-height: 500px !important;">
                <thead>
                    <tr>
                        <th>Rückzahlungsdatum</th>
                        <th>Zinsen</th>
                        <th>Sparbeitrag</th>
                        <th>Monatliche Rate</th>
                        <th>Sparguthaben</th>
                        <th>Restschuld</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=0)
                    @php($cnt = (ceil(($bausparsumme - $restAmount + ($bausparsumme / 100 * $abschlussgebühr)) / $monthlySaving)))
                    @php($feeVal = $bausparsumme / (-100) * $abschlussgebühr)
                    @foreach($period as $dt)
                        @if ($i <= $cnt)
                            @php($tempDate = $dt->format("m.Y"))
                            <tr>
                                <td>{{ $dt->format("m.Y") }}</td>
                                <td>{{ number_format((float)formatStringToNumber($cal->monthly_interest), 2, ',', '.') }} &euro;</td>
                                <td>{{ number_format((float)formatStringToNumber($cal->monthly_saving), 2, ',', '.') }} &euro;</td>
                                <td>{{ number_format((float)formatStringToNumber($cal->monthly_payment), 2, ',', '.') }} &euro;</td>
                                <td>{{ number_format((float)$feeVal, 2, ',', '.') }} &euro;</td>
                                <td>{{ number_format((float)$kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</td>
                            </tr>
                        @endif
                        @php($feeVal += $monthlySaving)
                        @php($i ++)
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    @if ($cal->bausparer_flag == 'true' && $cal->bausparer_pay_type == 'one')
        <h5 style="margin-top: 30px;"><b>Bausparer Tilgungsplan</b></h5>
        <div style="max-height: 300px; overflow-y: scroll;">
            <table style="width:100%; max-height: 500px !important;">
                <thead>
                    <tr>
                        <th>Rückzahlungsdatum</th>
                        <th>Zinsen</th>
                        <th>Sparbeitrag</th>
                        <th>Monatliche Rate</th>
                        <th>Sparguthaben</th>
                        <th>Restschuld</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=0)
                    @php($cnt = (ceil(($bausparsumme - $restAmount + ($bausparsumme / 100 * $abschlussgebühr)) / $monthlySaving)))
                    @php($feeVal = 0)
                    @foreach($period as $dt)
                        @if ($i < $cnt)
                            @php($feeVal += $monthlySaving)
                            @php($tempDate = $dt->format("m.Y"))
                            <tr>
                                <td>{{ $dt->format("m.Y") }}</td>
                                <td>{{ number_format((float)formatStringToNumber($cal->monthly_interest), 2, ',', '.') }} &euro; </td>
                                <td>{{ number_format((float)formatStringToNumber($cal->monthly_saving), 2, ',', '.') }} &euro;</td>
                                <td>{{ number_format((float)formatStringToNumber($cal->monthly_payment), 2, ',', '.') }} &euro;</td>
                                <td>{{ number_format((float)$feeVal, 2, ',', '.') }} &euro;</td>
                                <td>{{ number_format((float)$kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</td>
                            </tr>
                        @endif
                        @php($i ++)
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    @if ($cal->bausparer_flag == 'false')
        <h5 style="margin-top: 30px;"><b>Tilgungsplan </b></h5>
        <div style="max-height: 300px; overflow-y: scroll;">
            <table style="width:100%; max-height: 500px !important;">
                <thead>
                    <tr>
                        <th>Rückzahlungsdatum</th>
                        <th>Rate</th>
                        <th>Sondertilgung</th>
                        <th>Zinsen</th>
                        <th>Tilgung</th>
                        <th>Darlehensrest</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($repayments as $repayment)
                    <tr>
                        <td>{{ stringReplace($repayment->years) }}</td>
                        <td>{{ number_format((float)$repayment->rate, 2, ',', '.') }} &euro;</td>
                        <td>{{ number_format((float)$repayment->sonder_tilgung, 2, ',', '.')}} &euro;</td>
                        <td>{{ number_format((float)$repayment->zinsen, 2, ',', '.') }} &euro;</td>
                        <td>{{ number_format((float)$repayment->tilgung, 2, ',', '.') }} &euro;</td>
                        <td>{{ number_format((float)$repayment->darlehensrest, 2, ',', '.') }} &euro;</td>
                    </tr>
                    @endforeach
                    @if ( $years_repayments != null )
                        @foreach($years_repayments as $years_repayment)
                        <tr>
                            <td>{{ $years_repayment->years }}</td>
                            <td>{{ number_format((float)$years_repayment->rate, 2, ',', '.') }} &euro;</td>
                            <td>{{ number_format((float)$years_repayment->sonder_tilgung, 2, ',', '.')}} &euro;</td>
                            <td>{{ number_format((float)$years_repayment->zinsen, 2, ',', '.') }} &euro;</td>
                            <td>{{ number_format((float)$years_repayment->tilgung, 2, ',', '.') }} &euro;</td>
                            <td>{{ number_format((float)$years_repayment->darlehensrest, 2, ',', '.') }} &euro;</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    @else
        <h5 style="margin-top: 30px;"><b>Tilgungsplan</b></h5>
        <div style="max-height: 300px; overflow-y: scroll;">
            <table style="width:100%; max-height: 500px !important;">
                <thead>
                    <tr>
                        <th>Rückzahlungsdatum</th>
                        <th>Rate</th>
                        <th>Sondertilgung</th>
                        <th>Zinsen</th>
                        <th>Tilgung</th>
                        <th>Restschuld</th>
                    </tr>
                </thead>
                <tbody>
                    @php($restschuld = $restAmount)
                    @foreach($period as $dt)
                        @php($tempDate = makeYearMonth($tempDate))
                        @php($zinsen = ($restschuld * ($new_borrowing_rate / 100 / 12)))
                        @php($tilgung = $new_rate_inp - $zinsen)
                        @php($restschuld -= $tilgung)
                        @if ($restschuld >= 0)
                            <tr>
                                <td>{{ $tempDate }}</td>
                                <td>{{ number_format((float)$new_rate_inp, 2, ',', '.') }} &euro;</td>
                                <td>{{ number_format((float)$sonder_tilgung, 2, ',', '.') }} &euro;</td>
                                <td>{{ number_format((float)$zinsen, 2, ',', '.') }} &euro;</td>
                                <td>{{ number_format((float)$tilgung, 2, ',', '.') }} &euro;</td>
                                <td>{{ number_format((float)$restschuld, 2, ',', '.') }} &euro;</td>
                            </tr>
                        @else
                            @break
                        @endif
                    @endforeach
                    <tr>
                        <td>{{ $tempDate }}</td>
                        <td>{{ number_format((float)$new_rate_inp, 2, ',', '.') }} &euro;</td>
                        <td>{{ number_format((float)$sonder_tilgung, 2, ',', '.') }} &euro;</td>
                        <td>{{ number_format((float)$zinsen, 2, ',', '.') }} &euro;</td>
                        <td>{{ number_format((float)($tilgung + $restschuld), 2, ',', '.') }} &euro;</td>
                        <td>0, 00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
@endforeach
            <br>
            <a  class="btn btn-danger" style="color: #fff" href="{{asset('admin/generate_offer')}}{{ '/'.$kunden->id }}"> Angebot erstellen </a>
            <hr/>

            @if(count($kunden->checklists)>0)
            <br>
            <h5><b>Checkliste 1. Darlehensnehmer</b></h5>
            <div style="max-height: 300px; overflow-y: scroll">
                <table style="width:100%; max-height: 500px !important;">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Unterlagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($kunden->checklists as $checklist)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$checklist->body}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            @if($kunden->ehepartner_enabled &&count($kunden->ehepartnerChecklists)>0)
            <br>
            <h5><b>Checkliste 2. Darlehensnehmer </b></h5>
            <div style="max-height: 300px; overflow-y: scroll">
                <table style="width:100%; max-height: 500px !important;">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Unterlagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($kunden->ehepartnerChecklists as $checklist)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$checklist->body}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <hr/>
            @endif

            <div class="row" style="max-height: 500px; overflow-y: scroll; overflow-x: hidden">
                <div class="col-12" style="margin: 20px 20px 40px 20px;">
                    <h5><b>Angebote </b></h5>
                    <ul style="width: 100%">
                        @foreach($kunden['offer'] as $offer)
                        <li style="padding: 10px; float: left; border: 1px dashed; "><i class="fa fa-file-pdf" style="font-size:25px;color:red; vertical-align: middle; padding-right: 5px;"></i>Auftragsnummer: <a href="{{asset('admin/download_pdf')}}{{ '/'.$offer->id }}" download="">{{$offer->id}}</a><br><span style="font-size:11px; font-weight:bold ">Date: </span><span style="font-size:11px"> {{$offer->created_at}}</span> <span style="float:right; color:red ; margin-top: 5px; cursor: pointer !important;" onclick="delete_offer(<?= $offer->id ?>)"><i class="fa fa-times" aria-hidden="true"></i></span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function delete_offer(id) {
        var temp = confirm("Are you sure");
        if (temp) {
            console.log("id=>", id);
            window.location.href = window.location.href+'/delete_offer?id='+id;
        }
        
    }
</script>
@endsection
