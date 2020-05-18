
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MKHYP') }}</title>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="/css/foundation.css" media="all" />
    <link rel="stylesheet" href="/css/new.css" media="all" /> -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat');
        * {
            /* font-family: 'Montserrat', sans-serif !important; */
            font-family: 'Roboto', sans-serif;
            /*font-family: 'Open Sans', sans-serif; */
        }
        hr {
            color: #28367b;
            max-width: 350px;
            margin: 10px auto;
        }
        #app{
            background-color: rgba(255,255,255,0.6);
            background-blend-mode: lighten;
            background: url("img/watermark.png") no-repeat right top;
        }
        body{
            margin-top:50px;
            margin-bottom:50px;
        }
        .page_title{
            position: absolute;
            top: -90px;
            left: 0;
        }

        #header { position: fixed; left: 0px; top: -40px; right: 0px; text-align: center; }
        #footer { position: fixed; left: 0px; bottom: 0px; right: 0px; height: 50px; background-color: lightblue; }

        /* .uper_box {
            top:50px;
        } */

        .page_title{
            position: absolute;
            /*position: absolute;
            top: -90px;
            left: 0;
            left: 0;*/
        }
        .labels-line{
            background-color: #e7be86;
            border-color: #e7be86;
            outline-color: #e7be86;
        }


        


    </style>
</head>
<body>
 
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
        $year = (int) $year_str;
        if ((int) $mon_str > 11) {
            $mon_tmp = '01';
            $year = (int) $year_str + 1;
        } else {
            $tmVal = (int)$mon_str + 1;
            $mon_tmp = monthReplace($tmVal);
        }
        return $mon_tmp.'.'.(strval($year));
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
    $bausparer_flag;
    $bausparer_pay_type;
    $restAmount;
    $monthlySaving;
    $monthly_interest;
    $monthly_payment;

    foreach ($Calculations as $key => $val) {
        $contractFeeString = $val->acquisition_fee;
        $newRateInpString = $val->new_rate_inp;
        $restAmount = $val->outstanding_balance;
        $monthlySaving = $val->monthly_saving;
        $new_borrowing_rate_Str = $val->new_borrowing_rate;
        $bausparer_flag = $val->bausparer_flag;
        $bausparer_pay_type = $val->bausparer_pay_type;
        $monthly_interest = $val->monthly_interest;
        $monthly_payment = $val->monthly_payment;
    }

    $restAmount = floatval(formatStringToNumber($restAmount));
    $monthlySaving = floatval(formatStringToNumber($monthlySaving));
    $abschlussgebühr = floatval(formatStringToNumber($contractFeeString));
    $newRateInpString = str_replace('.', '', $newRateInpString);
    $new_borrowing_rate_Str = str_replace(',', '', $new_borrowing_rate_Str);
    $new_rate_inp = floatval(formatStringToNumber($newRateInpString));
    $new_borrowing_rate = floatval(formatStringToNumber($new_borrowing_rate_Str));

    function calcuMonthList ($startDate) {
        $start    = (new DateTime($startDate))->modify('first day of this month');
        $end      = (new DateTime('2500-12-12'))->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 month');
        return new DatePeriod($start, $interval, $end);
    }
    $tempDate = '';

    $sonder_tilgung = 0;

    foreach ($repayments as $key => $val) {
        $sonder_tilgung = $val->sonder_tilgung;
    }
?>
 
</span>

    <p style="text-align: center;position:relative;height:780px:width:100%;background:white;">
    <div style="background-color: white; z-index: 2;width: 400px; height: 100px;position:absolute;right:-80px;top:-80px;" ></div>
    <img src="img/bg-newscreen.jpg" style="position:absolute;top: -60px;margin:0 auto;width:94%;" >
    <div style="z-index: 2;width: 260px;position:absolute;left:55px;top:200px;font-size:14px;" >
    <i>Finanzierungskonzept für</i><br/>
    <span>{{ $kunden->vorname }} {{ $kunden->nachname }}</span>
    <hr class="labels-line"/>
    <i>Ihr Berater</i><br/>
    <span>{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
    <hr class="labels-line"/>
    <i>Angebotsdatum</i><br/>
    <span>{{ date('d.m.Y', strtotime($angebotedate->angebotdate)) }}</span>
    <hr class="labels-line"/>
    </div> </p>
    <br/>
    <br/>

    {{--<p class="page_title" style="color: #28377B; font-size: 23px; margin-top: 20px;">Persönliches Angebot für<br>{{ $kunden->vorname }} {{ $kunden->nachname }}</p>--}}
    <div id="header" style="margin-top: 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width: 60%;"></td>
                <td><img width="200px" style="padding-left: 100px; padding-top:20px;" src="img/logo.png"></td>
            </tr>
        </table>
    </div>

    {{-- <div id="footer">
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width: 33%; text-align: left;">mkhyp GmbH
    Obere Färberstraße 17a
    D-41334 Nettetal-Lobberich

    02153.95 81 34
    02153.95 81 35</td>
                <td style="width: 33%; text-align: left;">Column2</td>
                <td style="width: 33%; text-align: left;">Column3</td>
            <tr>
        </table>
    </div> --}}
    <br><br>
    <div id="app">


        <div class="container" style="padding-top: 10px; ">
            <!-- header -->
            <div style="box-shadow: 0 2px 5px rgba(0,0,0,.2);"></div>
   <!-- <span class="page_title" style="color: #28377B; font-size: 23px; margin-top: 20px;">Persönliches Angebot für<br>{{ $kunden->vorname }} {{ $kunden->nachname }}</span> -->
            <!-- personal info
            <h3 style="color:#c8c0b3; font-size: 1.2em; margin-top: 20px"><span style="background-color: #28367b; color: #fff; padding: 10px; float: left;">Ihr Finanzierungsberater</span></h3> -->

            <div style="text-align: left; margin: 10px 0;width: 100%; line-height: 1 !important; clear: both">
                <!-- <h3 style="color: #c8c0b3;  "><span style="background-color: #28367b ; padding: 10px 20px 10px 20px;">Ihre Daten&nbsp;<span></h3> -->
                <table style="width: 100%; font-size: 12px;">
                    <tr>
                        <td style="font-size:10px;" width="75%">mkhyp GmbH - Obere Färberstraße. 17 A - 41334 Nettetal-Lobberich</td>
                        <td><b>Ihr Ansprechpartner</b></td>
                    </tr>
                    <tr>
                        <td>{{ $kunden->anrede!=''?ucfirst($kunden->anrede):'-' }}</td>
                        <td>{{ Auth::user()->name }} {{ Auth::user()->surname }}</td>
                    </tr>
                    <tr>
                        <td> {{ $kunden->vorname }} {{ $kunden->nachname }}</td>
                        <td>Obere Färberstraße 17a</td>
                    </tr>
                    <tr>
                        <td>{{ $kunden->strasse }}</td>
                        <td>Tel.: 02153/958134</td>
                    </tr>
                    <tr>
                        <td>{{ $kunden->plz }} {{ $kunden->wohnort }}</td>
                        <td>Fax: 02153/958135</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><b>Unsere Anschrift</b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>mkhyp GmbH</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Obere Färberstraße 17 A</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>41334 Nettetal-Lobberich</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Angebot ID: {{ $angebote->id }}</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Datum: {{ date('d.m.Y', strtotime($angebotedate->angebotdate)) }}</td>
                    </tr>

                </table>
            </div>
            <!-- /personal info -->

         

            <!--  <h3 style="color:#c8c0b3; font-size: 1.1em; margin-top: 20px"><span style="background-color: #fff ; color: #28367b; padding: 0px;">Ihre Finanzierungsanfrage</span></h3> -->
<p>Sehr geehrter Kunde,<br>
den nachfolgenden Finanzierungsvorschlag habe ich für Sie zusammengestellt. Schauen Sie sich die Unterlagen bitte in Ruhe an.</p>
<p>Die Immobilienfinanzierung soll passend auf Ihre Wünsche zugeschnitten sein. Daher begleite ich Sie, bis die Finanzierung auf Ihre Bedürfnisse abgestimmt ist. Wenn Sie sich für eine Finanzierung entschieden haben, leite ich alles Weitere für Sie in die Wege . </p>



            <!-- personal info -->
            <h3 style="color:#c8c0b3; font-size: 1.1em; margin-top: 20px"><span style="background-color: #fff ; color: #28367b; padding: 0px; float: left;">Ihre Daten</span></h3>

            <div style="text-align: left; margin: 10px 0; width: 100%; line-height: 1 !important; clear: both">
                <table style="width: 100%; font-size: 12px;">
                    <tr>
                        <td style="text-align: left;">Vorname </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->vorname }}</td>
                        <td style="text-align: left; padding-left: 2%;">E-mail </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->mail }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Nachname </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->nachname }}</td>
                        <td style="text-align: left;padding-left: 2%;">Telefon </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->telefon }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Strasse </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->strasse }}</td>
                        <td style="text-align: left;padding-left: 2%;">PLZ </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->plz }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Geburtsdatum </td>
                        <td style="padding-left: 5px;font-weight: bold;">{{ $kunden->geburtsdatum }}</td>
                    </tr>
                </table>
            </div>
            <!-- /personal info -->
            <h3 style="color:#28367b; font-size: 1.2em; margin-top: 20px; float: left; width: 100%;">Ihr Finanzierungsbedarf</h3>
            <table style="width:100%;border: 2px solid #a2a5aa;border-collapse: collapse; font-size: 12px; clear: both;">
                <tr>
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Kaufpreis des Objekts</td>
                    @php
                        $kaufpreis = str_replace(",",".",$kunden->kaufpreis);
                        $kaufpreis = str_replace(".","",$kaufpreis);
                    @endphp
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;"> {{ number_format($kaufpreis, 2, ',', '.')  }}&euro;</td>
                </tr>
               
                @php
                    $kostenumbau = str_replace(",",".",$kunden->kostenumbau);
                    $kostenumbau = str_replace(".","",$kostenumbau);
                @endphp
                <tr>
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Umbau/Modernisierung</td>
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;">{{ number_format($kostenumbau, 2, ',', '.')  }}&euro;</td>
                </tr>
               
                @php
                    $kostennotar_value = str_replace(",",".",$kunden->kostennotar_value);
                    $kostennotar_value = str_replace(".","",$kostennotar_value);
                @endphp
                <tr>
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Notar/Gericht</td>
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;">{{ number_format($kostennotar_value, 2, ',', '.')  }}&euro;</td>
                </tr>

                @php
                    $grunderwerbssteuer_value = str_replace(",",".",$kunden->grunderwerbssteuer_value);
                    $grunderwerbssteuer_value = str_replace(".","",$grunderwerbssteuer_value);
                @endphp
                
                <tr>
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Grunderwerbssteuer</td>
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;">{{ number_format($grunderwerbssteuer_value, 2, ',', '.')  }}&euro;</td>
                </tr>

                @php
                    $maklerkosten_value = str_replace(",",".",$kunden->maklerkosten_value);
                    $maklerkosten_value = str_replace(".","",$maklerkosten_value);
                @endphp
                
                <tr>
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Maklerkosten</td>
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;">{{ number_format($maklerkosten_value, 2, ',', '.')  }}&euro;</td>
                </tr>

                @php
                    $gesamtkosten = str_replace(",",".",$kunden->gesamtkosten);
                    $gesamtkosten = str_replace(".","",$gesamtkosten);
                @endphp
                <tr style="background: #a2a5aa;font-weight: bold;">
                    <td style="padding: 4px;">Gesamtkosten</td>
                    <td style="text-align: right;padding: 4px;">{{ number_format($gesamtkosten, 2, ',', '.') }}&euro;</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Eigenkapital</td>
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;">{{ number_format($kunden->eigenkapital, 2, ',', '.') }}</td>
                </tr>
                <tr style="background: #a2a5aa;font-weight: bold;">
                    <td style="border: 1px solid #a2a5aa;padding: 4px;">Finanzierungsbedarf</td>
                    <td style="border: 1px solid #a2a5aa;text-align: right;padding: 4px;">{{ number_format($kunden->finanzierungsbedarf, 2, ',', '.') }}</td>
                </tr>
            </table><br><br>
        <div>
           
            <h3 style="color:#28367b; font-size: 1,2em; margin-top: 20px">Ihre Finanzierungsbausteine</h3>
            <table style="width:100%; max-height: 500px !important; border-collapse: collapse; font-size: 12px;">
                <thead>
                <tr style="background: #a2a5aa;font-weight: bold;">
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @if ($bausparer_flag == 'false')
                        @php $i = 1; @endphp
                        @foreach( $Calculations as $calculation )
                            <tr><td><div><b>{{ $calculation->name . $i }}</b></div><span style="float:left; width: 200px">Kreditsumme</span><span style="text-align: right">{{ number_format( $kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Zinsbindung</span><span style="text-align: right">{{$calculation->loan_period}} Jahre </span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Auszahlungstermin</span><span style="text-align: right">{{ monthReplace($calculation->payment_month) }}. {{ $calculation->payment_year}}</span></td></tr>
                            <!-- <tr><td><span style="float:left; width: 200px">Land Registry Costs</span><span style="text-align: right">{{ $calculation->registery_fees }} &euro;</span></td></tr> -->
                            <!-- <tr><td><span style="float:left; width: 200px">Discount (percent)</span><span style="text-align: right">{{$calculation->payment_discount}} &#37;</span></td></tr> -->
                            <tr><td><span style="float:left; width: 200px">Auszahlungsbetrag</span><span style="text-align: right">{{ number_format( $kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Sollzinssatz</span><span style="text-align: right">{{ $calculation->borrowing_rate }} &#37;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Tilgungssatz</span><span style="text-align: right">{{$calculation->repayment_date_inp}} &#37;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Monatliche Rate</span><span style="text-align: right">{{ $calculation->montly_deposit_val }} &euro;</span></td></tr>
                            @if ( $calculation->annual_unsheduled_val != 0 || $calculation->onetime_unsheduled_val != 0 )
                                <tr><td><span style="float:left; width: 200px">Jährliche Sondertilgung</span><span style="text-align: right">{{ monthReplace($calculation->annual_unsheduled_val) }}. {{ monthReplace($calculation->annual_unsheduled_month) }}. {{ $calculation->annual_unsheduled_year }}</span></td></tr>
                                <tr><td><span style="float:left; width: 200px">bis</span><span style="text-align: right">{{ monthReplace($calculation->annual_to_month) }}. {{ $calculation->annual_to_year }}</span></td></tr>
                                <tr><td><span style="float:left; width: 200px">Einmalige Sondertilgung</span><span style="text-align: right">{{ monthReplace($calculation->onetime_unsheduled_val) }}. {{ monthReplace($calculation->onetime_unsheduled_month) }}. {{ $calculation->onetime_unsheduled_year }}</span></td></tr>
                            @endif -->
                            <tr><td><span style="float:left; width: 200px">Restschuld</span><span style="text-align: right">{{ $calculation->outstanding_balance }} &euro;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Effektivzins</span><span style="text-align: right">{{ $calculation->effective_interest }} &#37;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Anschlusskredit</span><span style="text-align: right">{{ $calculation->connection_credit }} &euro;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Neuer Sollzinssatz</span><span style="text-align: right">{{ $calculation->new_borrowing_rate }} &#37;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Neuer Tilgungssatz</span><span style="text-align: right">{{ $calculation->new_repayment_rate_inp }} &#37;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Neue Rate (Euro)</span><span style="text-align: right">{{ $calculation->new_rate_inp }} &euro;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Gesamtlaufzeit (Jahre/Monate)</span><span style="text-align: right">{{ $calculation->total_maturity }} J / M</span></td></tr>
                            @if ( $calculation->timeline != null )
                                <tr>
                                    <td>
                                        <div class="uper_box">
                                            <div class="container">
                                                <table style="width: 100%; font-size: 18px; margin-top: 30px;" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td style="font-size:10px">{{ $calculation->timeline->finanzierungsbedarf_phase_eins }}&euro;</td>
                                                        <td style="border-left: 4px solid #f1ac38; border-right: 4px solid #f1ac38;">
                                                            <table style="width: 100%; border-spacing: 0">
                                                                <tr style="border: 1px solid #f1ac38; height: 50px; width: 100%;">
                                                                    <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 25%;">
                                                                        <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->timeline->laufzeit_phase_eins }} Jahre</p>
                                                                    </td>
                                                                    <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 13%;">
                                                                        <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->timeline->jahreszins_phase_eins }}%</p>
                                                                    </td>
                                                                    <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 25%;">
                                                                        <p style="margin-top:0;margin-bottom:20px;font-size:10px">dann</p>
                                                                    </td>
                                                                    {{-- <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 0%;">
                                                                        <p style="margin-top:0;margin-bottom:10px;font-size:10px"></p>
                                                                    </td> --}}
                                                                    <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 25%;">
                                                                        <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->timeline->laufzeit_phase_zwei }} Jahre</p>
                                                                    </td>
                                                                    <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 12%;">
                                                                        <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->timeline->jahreszins_phase_zwei }}%</p>
                                                                    </td>
                                                                </tr>
                                                                <tr style="border: 4px solid #f1ac38; width: 100%; height: 70px;">
                                                                    <td style="text-align: center;width: 33.334%;font-size:10px" colspan="2">{{ $calculation->timeline->rate_monatlich_phase_eins }}&euro;</td>
                                                                    <td width="33%" align="center" style="position: relative;">
                                                                        <div style="height:26px;padding-top: 10px;font-size:10px"> -> <br>Restschuld <br>{{ $calculation->timeline->restschuld_phase_eins }}&euro;</div>
                                                                        <span style="display: inline-block; width: 5px; height: 27px; border-right:4px solid #f1ac38; position: absolute;  z-index:99;top: -18px;left: 47%;"></span>
                                                                    </td>
                                                                    <td style="text-align: center; width: 33.334%;font-size:10px">{{ $calculation->timeline->rate_monatlich_phase_zwei }}&euro;</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td style="text-align: center;font-size:10px">30 jahre</td>
                                                        <td style="text-align: center;"><span style="text-align: center; padding:5px; display: block; border: 4px solid #f1ac38;font-size:10px">Restschuld <br>{{ $calculation->timeline->restschuld_ende }}&euro;</span></td>
                                                        <?php $restschuld_ende = $calculation->timeline->restschuld_ende ?>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <br><br>
                                    </td>
                                </tr>
                            @else
                                <tr><td><strong></strong></td></tr>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                            @endif -->
                            @if ( $calculation->customerTimeline != null )
                                <tr>
                                    <td>
                                        <div class="uper_box">
                                            <div class="container">
                                                <table style="width: 100%; font-size: 18px; margin-top: 30px;" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td style="font-size:10px; text-align: right; padding: 0 50px; ">{{ $calculation->customerTimeline->darlehen }}&euro;</td>
                                                        <td style="border-left: 4px solid #f1ac38; border-right: 4px solid #f1ac38;">
                                                            <table style="width: 100%; border-spacing: 0">
                                                                <tr style="border: 1px solid #f1ac38; height: 50px; width: 100%;">
                                                                    <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 25%;">
                                                                        <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->customerTimeline->laufzeit }} Jahre</p>
                                                                    </td>
                                                                    <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 13%;">
                                                                        <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->customerTimeline->zinsstaz }}%</p>
                                                                    </td>
                                                                    <td style="text-align: center;border-bottom: 4px solid #f1ac38; width: 25%;">
                                                                        <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $calculation->customerTimeline->tilgung }} Jahre</p>
                                                                    </td>
                                                                </tr>
                                                                <tr style="border: 4px solid #f1ac38; width: 100%; height: 70px;">
                                                                    <td style="text-align: center;width: 33.334%;font-size:10px" colspan="3">{{ $calculation->customerTimeline->rate_monatl }}&euro;</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td style="text-align: center;font-size:10px; width: 50px;"> </td>
                                                        <td style="text-align: center;"><span style="text-align: center; padding:5px; display: block; border: 4px solid #f1ac38;font-size:10px">Restschuld <br>{{ $calculation->customerTimeline->restschuld }}&euro;</span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <br><br>
                                    </td>
                                </tr>
                            @else
                                <tr><td><strong></strong></td></tr>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                            @endif -->
                            @php($i++)
                        @endforeach
                    @else
                        @foreach( $Calculations as $calculation )
                        <tr><td><div><b>Bausparer Modell</b></div><span style="float:left; width: 200px">Kreditsumme</span><span style="text-align: right">{{ number_format( $kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Laufzeit</span><span style="text-align: right">{{$calculation->loan_period}} Jahre </span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Auszahlungstermin</span><span style="text-align: right">{{ monthReplace($calculation->payment_month) }}. {{ $calculation->payment_year}}</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Auszahlungsbetrag</span><span style="text-align: right">{{ number_format( $kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Sollzinssatz (Prozent)</span><span style="text-align: right">{{ $calculation->borrowing_rate }} &#37;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Zinsen monatlich</span><span style="text-align: right">{{number_format((float)formatStringToNumber($calculation->monthly_interest), 2, ',', '.')}} &euro;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Sparsumme</span><span style="text-align: right">{{number_format((float)formatStringToNumber($calculation->monthly_saving), 2, ',', '.')}} &euro;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Monatliche Rate</span><span style="text-align: right">{{number_format((float)formatStringToNumber($calculation->monthly_payment), 2, ',', '.')}} &euro;</span></td></tr>
                            <tr><td><div><b>Anschlussdarlehen</b></div><span style="float:left; width: 200px">Restschuld nach Sparphase</span><span style="text-align: right">{{number_format((float)formatStringToNumber($calculation->outstanding_balance), 2, ',', '.')}} &euro;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Neuer Sollzinssatz (Prozent)</span><span style="text-align: right">{{ $calculation->new_borrowing_rate }} &#37;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Neuer Tilgungssatz (Proz.)</span><span style="text-align: right">{{ $calculation->new_repayment_rate_inp }} &#37;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Neue Rate (Euro)</span><span style="text-align: right">{{ $calculation->new_rate_inp }} &euro;</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Gesamtlaufzeit (Jahre/Monate)</span><span style="text-align: right">{{ $calculation->total_maturity }} J / M</span></td></tr>
                            <tr><td><span style="float:left; width: 200px">Effektivzins (Prozent)</span><span style="text-align: right">{{ $calculation->effective_interest }} &#37;</span></td></tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            
        <!-- <br><br><br> -->
        @php($period = calcuMonthList($tempDate))
        @if ($bausparer_flag == 'true')
                            
            <div class="uper_box">
                <div class="container">
                    <?php
                        
                         $outstanding_balance_timeline = str_replace(',','',$Calculations[0]->outstanding_balance);
                         $outstanding_balance_timeline = str_replace('.','',$outstanding_balance_timeline);
                         $sparsumme_timeline = str_replace(',','',$Calculations[0]->sparsumme);
                         $sparsumme_timeline = str_replace('.','',$sparsumme_timeline);
                       
                    ?>
                    <table style="width: 75%; font-size: 18px; margin-top: 30px;" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="font-size:10px; text-align: right; padding: 0 50px; width: 5%; " >{{number_format($sparsumme_timeline, 2, ',', '.')}}&euro;</td>
                            <td style="">
                                <table style="width: 100%; border-spacing: 0">
                                    <tr style=" width: 100%;">
                                        <td style="text-align: center; width: 100%;"   colspan="2">
                                            <p style="margin-bottom:10px;margin-bottom:10px;font-size:10px">{{$Calculations[0]->loan_period}} Jahre</p>
                                        </td>
                                    </tr>
                                    <tr style=" height: 50px; width: 100%;">
                                        <td style="text-align: center;border-left: 4px solid #f1ac38;   width: 50%;">
                                            <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $Calculations[0]->borrowing_rate }}&#37;</p>
                                        </td>
                                        <td style="text-align: center; border-right: 4px solid #f1ac38;   width: 50%;">
                                            <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $Calculations[0]->new_borrowing_rate }} &#37;</p>
                                        </td>
                                    </tr>
                                    <tr style=" height: 50px; width: 100%;">
                                        <td style="border-right: 2px solid #f1ac38; padding:5px; border-left: 4px solid #f1ac38; border-bottom: 2px solid #f1ac38; width: 50%;">
                                        </td>
                                        <td style="border-left: 2px solid #f1ac38; padding:5px; border-right: 4px solid #f1ac38; border-bottom: 2px solid #f1ac38; width: 50%;">
                                        </td>

                                    </tr>
                                    <tr style=" height: 50px; width: 100%;">
                                        <td style="border-right: 2px solid #f1ac38; padding:5px; border-left: 4px solid #f1ac38; border-top: 2px solid #f1ac38; width: 50%;">
                                        </td>
                                        <td style="border-left: 2px solid #f1ac38; padding:5px; border-right: 4px solid #f1ac38; border-top: 2px solid #f1ac38; width: 50%;">
                                        </td>

                                    </tr>
                                    <tr style=" height: 50px; width: 100%;">
                                        <td style="text-align: center; border-left: 4px solid #f1ac38;  width: 50%;">
                                            <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $Calculations[0]->montly_deposit_val }} &euro;</p>
                                        </td>
                                        <td style="text-align: center; border-right: 4px solid #f1ac38;  width: 50%;">
                                            <p style="margin-top:0;margin-bottom:10px;font-size:10px">{{ $Calculations[0]->new_rate_inp }} &euro;</p>
                                        </td>
                                    </tr>
                                    <tr style=" width: 100%;">
                                        <td style="text-align: center; width: 100%;"   colspan="2">
                                            <p style="margin-top:0;margin-bottom:10px;font-size:10px">  Lfz. {{ $calculation->total_maturity }} / Restschuld {{number_format($outstanding_balance_timeline, 2, ',', '.')}} &euro;</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="text-align: center;font-size:10px; width: 100px;">Lfz.: {{ $calculation->total_maturity }} J / M - Restschuld: 0€<</td>
                            <!-- <td style="text-align: center;"><span style="text-align: center; padding:5px; display: block; border: 4px solid #f1ac38;font-size:10px">Restschuld <br>0&euro;</span></td> -->
                        </tr>
                    </table>
                   
                </div>
            </div>

            <br><br>
                          

            @if ($bausparer_pay_type == 'month')
                <div>
                    <h3 style="color:#28367b; font-size: 1.2em; margin-top: 50px">Bausparplan Tilgungsplan</h3>
                    <table style="width:100%; max-height: 500px !important;border-collapse: collapse; font-size: 12px;">
                        <thead>
                            <tr style="background: #a2a5aa;font-weight: bold; text-align: left;">
                                <th style="padding: 5px 0; text-align: left;">Rückzahlungsdatum</th>
                                <th style="text-align: left;">Zinsen</th>
                                <th style="text-align: left;">Sparbeitrag</th>
                                <th style="text-align: left;">Monatliche Rate</th>
                                <th style="text-align: left;">Sparguthaben</th>
                                <th style="text-align: left;">Restschuld</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=0)
                            @php($cnt = (ceil(($bausparsumme - $restAmount + ($bausparsumme / 100 * $abschlussgebühr)) / $monthlySaving)))
                            @php($feeVal = $bausparsumme / (-100) * $abschlussgebühr)
                            @foreach($period as $dt)
                                @if ($i <= $cnt)
                                    @php($tempDate = $dt->format("m.Y"))
                                    <tr style="text-align: left;">
                                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ $dt->format("m.Y") }}</td>
                                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)formatStringToNumber($monthly_interest), 2, ',', '.') }} &euro;</td>
                                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$monthlySaving, 2, ',', '.') }} &euro;</td>
                                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)formatStringToNumber($monthly_payment), 2, ',', '.') }} &euro;</td>
                                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$feeVal, 2, ',', '.') }} &euro;</td>
                                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</td>
                                    </tr>
                                @endif
                                @php($feeVal += $monthlySaving)
                                @php($i ++)
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            
            @if ($bausparer_pay_type == 'one')
                <div>
                    <h3 style="color:#28367b; font-size: 1.2em; margin-top: 50px">Bausparplan Tilgungsplan</h3>
                    <table style="width:100%; max-height: 500px !important;border-collapse: collapse; font-size: 12px;">
                        <thead>
                            <tr style="background: #a2a5aa;font-weight: bold; text-align: left;">
                                <th style="padding: 5px 0; text-align: left;">Rückzahlungsdatum</th>
                                <th style="text-align: left;" >Zinsen</th>
                                <th style="text-align: left;" >Sparbeitrag</th>
                                <th style="text-align: left;" >Monatliche Rate</th>
                                <th style="text-align: left;" >Sparguthaben</th>
                                <th style="text-align: left;">Restschuld</th>
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
                                    <tr style="text-align: left;">
                                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ $dt->format("m.Y") }} </td>
                                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)formatStringToNumber($monthly_interest), 2, ',', '.') }} &euro;</td>
                                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$monthlySaving, 2, ',', '.') }} &euro;</td>
                                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)formatStringToNumber($monthly_payment), 2, ',', '.') }} &euro;</td>
                                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$feeVal, 2, ',', '.') }} &euro;</td>
                                        <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$kunden->finanzierungsbedarf, 2, ',', '.') }} &euro;</td>
                                    </tr>
                                @endif
                                @php($i ++)
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        @endif
        <br><br><br>



</div>

        <div>
            @if ($bausparer_flag == 'false')
                <h3 id="tilgungsplan" style="color:#28367b; font-size: 1.2em; margin-top: 50px">Tilgungsplan</h3>
                <table style="width:100%; max-height: 500px !important;border-collapse: collapse; font-size: 12px;">
                    <thead>
                        <tr style="background: #a2a5aa;font-weight: bold; text-align: left;">
                            <th style="padding: 5px 0; text-align: left;">Rückzahlungsdatum</th>
                            <th style="text-align: left;" >Rate</th>
                            <th style="text-align: left;" >Tilgung</th>
                            <th style="text-align: left;" >Zinsen</th>
                            <th style="text-align: left;" >Sondertilgung</th>
                            <th style="text-align: left;" >Restschuld</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($payments = [])
                        @foreach($repayments as $repayment)
                        <tr style="text-align: left;">
                            <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ stringReplace($repayment->years) }}</td>
                            <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$repayment->rate, 2, ',', '.') }} &euro;</td>
                            <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$repayment->tilgung, 2, ',', '.') }} &euro;</td>
                            <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$repayment->zinsen, 2, ',', '.') }} &euro;</td>
                            <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$repayment->sonder_tilgung, 2, ',', '.') }} &euro;</td>
                            <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$repayment->darlehensrest, 2, ',', '.') }} &euro;</td>
                        </tr>
                        @endforeach
                        @if ( $years_repayments != null )
                            @foreach($years_repayments as $years_repayment)
                            <tr>
                                <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ $years_repayment->years }}</td>
                                <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$years_repayment->rate, 2, ',', '.') }} &euro;</td>
                                <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$years_repayment->tilgung, 2, ',', '.')}} &euro;</td>
                                <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$years_repayment->zinsen, 2, ',', '.') }} &euro;</td>
                                <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$years_repayment->sonder_tilgung, 2, ',', '.') }} &euro;</td>
                                <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$years_repayment->darlehensrest, 2, ',', '.') }} &euro;</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            @else
                <h3 style="color:#28367b; font-size: 1.2em; margin-top: 50px">Tilgungsplan Anschlussfínanzierung</h3>
                <table style="width:100%; max-height: 500px !important;border-collapse: collapse; font-size: 12px;">
                    <thead>
                        <tr style="background: #a2a5aa;font-weight: bold; text-align: left;">
                            <th style="padding: 5px 0; text-align: left;">Rückzahlungsdatum</th>
                            <th style="text-align: left;" >Rate</th>
                            <th style="text-align: left;" >Sondertilgung</th>
                            <th style="text-align: left;" >Zinsen</th>
                            <th style="text-align: left;" >Tilgung</th>
                            <th style="text-align: left;" >Restschuld</th>
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
                                    <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ $tempDate }}</td>
                                    <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$new_rate_inp, 2, ',', '.') }} &euro;</td>
                                    <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$sonder_tilgung, 2, ',', '.') }} &euro;</td>
                                    <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$zinsen, 2, ',', '.') }} &euro;</td>
                                    <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$tilgung, 2, ',', '.') }} &euro;</td>
                                    <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$restschuld, 2, ',', '.') }} &euro;</td>
                                </tr>
                            @else
                                @break
                            @endif
                        @endforeach
                        <tr>
                            <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ $tempDate }}</td>
                            <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$new_rate_inp, 2, ',', '.') }} &euro;</td>
                            <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$sonder_tilgung, 2, ',', '.') }} &euro;</td>
                            <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)$zinsen, 2, ',', '.') }} &euro;</td>
                            <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">{{ number_format((float)($tilgung + $restschuld), 2, ',', '.') }} &euro;</td>
                            <td style="border-bottom: 1px solid #a2a5aa;padding: 3px 0">0, 00 &euro;</td>
                        </tr>
                    </tbody>
                </table>
            @endif
            <br>
        </div>
        @if(count($kunden->checklists)>0)
        <div>
            <h3 id="" style="color:#28367b; font-size: 1,2em; margin-top: 50px">Folgende Unterlagen werden benötigt</h3>

                    @php($i=1)
                    <ul>
                    @foreach($kunden->checklists as $checklist)
                    <li>
                        <!-- {{$i++}} -->
                        {{$checklist->body}}
                    </li>
                    @endforeach
        </div>
        @endif
        @if(count($kunden->ehepartnerChecklists)>0)
        <div>
            <h3 id="" style="color:#28367b; font-size: 1,2em;">Checkliste (Ehepartner)</h3>
                <ul>
                    @php($i=1)
                    @foreach($kunden->ehepartnerChecklists as $checklist)
                    <li>
                        <!-- {{$i++}} -->
                        {{$checklist->body}}
                    </li>
                    @endforeach
                </ul>
            <br>
        </div>
        @endif
        </div>
    </div>
</body>
</html>
