@extends(Auth::user()->admin == '1' ? 'layouts/headmin' : 'layouts/app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />

@endsection

<style type="text/css">
    #button_edit a {
        color: #fff !important;
    }
    .toast-message{
        color: green;
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
    span.edit_heading i {
    font-size: 22px;
    color: #333;
    cursor: pointer;
    }

    .removeCard i {
        font-size: 26px;
        margin-left: 10px;
    }
</style>

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>

        function monthly_total_price_remaining_debt(){
            var total_price = parseInt($('#sparsumme').val().replace(/\./g,"").replace(",","."));
            var real_estate_transfer_tax = parseInt($('#grunderwerbssteuer').val().replace(/\./g,"").replace(",",""));
            var runningTime =  parseInt(document.getElementById('laufzeit').value);
            var remaining_debt = total_price * real_estate_transfer_tax / 100;
            var monthly_saving = total_price * (100 - real_estate_transfer_tax) / 100 / 12 / runningTime;
            var borrowing_rate = parseFloat($('#borrowing_rate').val().replace(/\./g,"").replace(",","."));
            var monthly_deposit = total_price * borrowing_rate / 100 / 12;
            
            // var monthly_deposit = total_price * borrowing_rate / 100 / 12 / runningTime;
            var monthly_total_pay = monthly_saving + monthly_deposit;
            $('#monthly_interest').val(monthly_deposit.toFixed(2).toString().replace(".", ","));
            $('#monthly_saving').val(monthly_saving.toFixed(2).toString().replace(".", ","));
            $('#monthly_payment').val(monthly_total_pay.toFixed(2).toString().replace(".", ","));
            $('#Outstanding_balance').val(remaining_debt.toFixed(2).toString().replace(".", ","));
        }

        $(document).ready(function(){

            if($("#" + localStorage['radio_status'])[0] != undefined) {
                setTimeout( function(){ 
                    $("#repayment_date").prop("checked", false);
                    $("#montly_deposit").prop("checked", false);
                    $("#payment_opt_rad").prop("checked", false);
                    $("#bausparer").prop("checked", false);
                    $("#" + localStorage['radio_status']).prop("checked", true);
                }  , 500 );
            }

            $("#bausparer").click(function () {
                localStorage['radio_status'] = 'bausparer';
                if ($(this).prop('checked') == true) {
                    $("#sparsumme").prop("disabled", false);
                    $("#laufzeit").prop("disabled", false);
                    $("#statements_due").prop("disabled", false);
                    $("#onetime_pay").prop("disabled", false);
                    $("#running_time").prop("disabled", false);
                    var e = document.getElementById("laufzeit");
                    $("#running_time").val(e.options[e.selectedIndex].text);
                    $("#running_time").prop("disabled", true);
                    $("#monthly_rate_pay").prop("disabled", false);
                    var total_price = parseInt($('#loan_amount').val().replace(/\./g,"").replace(",","."));
                    $('#sparsumme').val(total_price.toFixed(2).toString().replace(".", ","));
                    monthly_total_price_remaining_debt();
                } else {
                    $("#sparsumme").prop("disabled", true);
                    $("#laufzeit").prop("disabled", true);
                    $("#statements_due").prop("disabled", true);
                    $("#onetime_pay").prop("disabled", true);
                    $("#monthly_rate_pay").prop("disabled", true);

                    
                }
            });

            // running time value change
            $('#laufzeit').change(function() {
                $("#running_time").prop("disabled", false);
                var e = document.getElementById("laufzeit");
                $("#running_time").val(e.options[e.selectedIndex].text);
                $("#running_time").prop("disabled", true);
                monthly_total_price_remaining_debt();
            });

            // Sparsumme value change
            $('#sparsumme').change(function() {
                monthly_total_price_remaining_debt();
            });

            $('#loan_period').val('{{$CalData->loan_period}}');
            $('#payment_month').val('{{$CalData->payment_month}}');
            $('#payment_year').val('{{$CalData->payment_year}}');
            $('#payment_discount').val('{{$CalData->payment_discount}}');
            $('#borrowing_rate').val('{{$CalData->borrowing_rate}}');
            $('#montly_deposit_val').val('{{$CalData->montly_deposit_val}}');
            $('#annual_unsheduled_month').val('{{$CalData->annual_unsheduled_month}}');
            $('#annual_unsheduled_year').val('{{$CalData->annual_unsheduled_year}}');
            $('#annual_unsheduled_val').val('{{$CalData->annual_unsheduled_val}}');
            $('#annual_to_month').val('{{$CalData->annual_to_month}}');
            $('#annual_to_year').val('{{$CalData->annual_to_year}}');
            $('#onetime_unsheduled_month').val('{{$CalData->onetime_unsheduled_month}}');
            $('#onetime_unsheduled_year').val('{{$CalData->onetime_unsheduled_year}}');
            {{--$('#onetime_unsheduled_val').val('{{$CalData->onetime_unsheduled_val}}');--}}
            $('#new_borrowing_rate').val('{{$CalData->new_borrowing_rate}}');
            $('#new_repayment_rate_inp').val('{{$CalData->new_repayment_rate_inp}}');
            $('#sparsumme').val('{{$CalData->sparsumme}}');
            $('#monthly_interest').val('{{$CalData->monthly_interest}}');
            $('#monthly_saving').val('{{$CalData->monthly_saving}}');
            $('#monthly_payment').val('{{$CalData->monthly_payment}}');
            $('#total_maturity').val('{{$CalData->total_maturity}}');
            $('#laufzeit').val('{{$CalData->laufzeit}}');
            if ('{{$CalData->bausparer_flag}}' == 'true') {
                $('#bausparer').prop('checked', true);
                $("#sparsumme").prop("disabled", false);
                $("#laufzeit").prop("disabled", false);
                $("#statements_due").prop("disabled", false);
                $("#onetime_pay").prop("disabled", false);
                $("#monthly_rate_pay").prop("disabled", false);
            }
            $('#statements_due').val('{{$CalData->acquisition_fee}}');
            if ('{{$CalData->bausparer_pay_type}}' == 'one') {
                $('#onetime_pay').prop('checked', true);
            } else if ('{{$CalData->bausparer_pay_type}}' == 'month') {
                $('#monthly_rate_pay').prop('checked', true);
            }

            $('#annual_unsheduled_year').change(function () {
                $('#annual_to_year').html('');
                var html = '';
                var year =parseInt($(this).val());
                for(var i = year + 1;i <= parseInt($('#payment_year').val())+parseInt($('#loan_period').val());i++){
                    html+='<option value="'+i+'">'+i+'</option>';
                }
                $('#annual_to_year').html(html);
            });
            $('#annual_unsheduled_month').change(function () {
                $('#annual_to_month').html('');
                var month =parseInt($(this).val());
                $('#annual_to_month').html(get_month_option(month));
            });


            function get_month_option(month) {
                switch (month) {
                    case 1:
                        html = '<option selected value=\'1\'>Januar</option>';
                        break;
                    case 2:
                        html = '<option value=\'2\'>Februar</option>';
                        break;
                    case 3:
                        html = '<option value=\'3\'>Marz</option>';
                        break;
                    case 4:
                        html = '<option value=\'4\'>April</option>';
                        break;
                    case 5:
                        html = '<option value=\'5\'>Mai</option>';
                        break;
                    case 6:
                        html = '<option value=\'6\'>Juni</option>';
                        break;
                    case 7:
                        html = '<option value=\'7\'>Juli</option>';
                        break;
                    case 8:
                        html = '<option value=\'8\'>August</option>';
                        break;
                    case 9:
                        html = '<option value=\'9\'>September</option>';
                        break;
                    case 10:
                        html = '<option value=\'10\'>Oktober</option>';
                        break;
                    case 11:
                        html = '<option value=\'11\'>November</option>';
                        break;
                    case 12:
                        html = '<option value=\'12\'>Dezember</option>';
                        break;
                }
                return html;
            }

            $('.new_form').hide();
            $('.ten_fields').hide();
            $('.ct_fields').hide();
            $('#add_calcualtion_form').click(function(){
                $('.new_form').show();
            });
            $('#ten_field_controller').click(function(){
                $('.ten_fields').show();
                $('#new_form_controller').val(1);
            });
            $('#angebotdate').change(function(){
                $('.angebotdate').val($(this).val());
            });
            $('#finanzierungsbedarf input').on('change', function(e){
                let _this = this;
                setTimeout(function(){
                    $(_this).val(formatNumbers(onlyNumbers($(_this).val())));
                    recalculate();
                    recalculate_1();
                }, 200);
            });

            setTimeout(function(){
                    $("#kaufpreis").val(formatNumbers(onlyNumbers($("#kaufpreis").val())));
                    $("#kostenumbau").val(formatNumbers(onlyNumbers($("#kostenumbau").val())));
                }, 200);
            
            setTimeout(function(){
                $("#gesamtkosten").val(formatNumbers(onlyNumbers($("#gesamtkosten").val())));
            }, 200);

            setTimeout(function(){
                $("#loan_amount").val(formatNumbers(onlyNumbers($("#loan_amount").val())));
                $("#payment_amount").val(formatNumbers(onlyNumbers($("#payment_amount").val())));
                $("#montly_deposit_val").val(formatNumbers(onlyNumbers($("#montly_deposit_val").val())));sparsumme
                $("#sparsumme").val(formatNumbers(onlyNumbers($("#sparsumme").val())));
                $("#monthly_interest").val(formatNumbers(onlyNumbers($("#monthly_interest").val())));
                $("#monthly_saving").val(formatNumbers(onlyNumbers($("#monthly_saving").val())));
                $("#monthly_payment").val(formatNumbers(onlyNumbers($("#monthly_payment").val())));
            }, 200);

            setTimeout(function(){
                $("input[name=finanzierungsbedarf]").val(formatNumbers(onlyNumbers($("input[name=finanzierungsbedarf]").val())));
            }, 200);

            $('#loan_amount').on('change', function(e){
                let _this = this;
                // setTimeout(function(){
                    $(_this).val(formatNumbers(onlyNumbers($(_this).val())));
                    $('input[name="loan_amount_hidden"]').val(formatNumbers(onlyNumbers($(_this).val())));
                // }, 200);
            }); 

            $('#sparsumme').on('change', function(e){
                let _this = this;
                    $(_this).val(formatNumbers(onlyNumbers($(_this).val())));
            });

            $('[data-parent="#Calculation"] input').on('keypress change', function(){
                let _this = this;
                // $(_this).val(formatNumbers(onlyNumbers($(_this).val())));
                setTimeout(function(){
                    recalculate_1();
                }, 200);
            });

            $('[data-parent="#Calculation"] select').on('change', function(){
                let _this = this;
                // $(_this).val(formatNumbers(onlyNumbers($(_this).val())));
                // setTimeout(function(){
                    recalculate_1();
                // }, 200);
            });

            $('input[name="kostennotar"], input[name="grunderwerbssteuer"], input[name="maklerkosten"]').change(function(){
                let _this = this;
                setTimeout(function(){
                    let val = $(_this).val();
                    val = val.split('.').join('');
                    val = val.split(',').join('.');
                    val = parseFloat(val);
                    if(val<0.01) val = '0,01';
                    // else if(val>30) val = '3,0';
                    else val = val.toString();
                    console.log(val);
                    $(_this).val(onlyNumbers(val).replace('.', ','));
                    recalculate();
                }, 200);
            });
            // Set angebotdate in edit more
            var angebotdate = $('.angebotdate').val();
            $('#angebotdate').val(angebotdate);
        });
        function onlyNumbers(string) {
            let number = '';
            for(let i = 0; i<string.length; i++) {
                if((string[i] >='0' && string[i] <= '9') || string[i] == '.' || string[i] == ',') {
                    number+=string[i];
                }
            }
            return number;
        }
        function formatNumbers(string) {
            let number = '';
            let firstComma = false;
            let count = 0;
            for(let i = string.length-1; i>=0; i--) {
                if(string[i] == ',' && !firstComma) {
                    firstComma = true;
                    let temp = '';
                    for(let j = 0; j <= number.length ; j++) {
                        if (number[j] >='0' && number[j] <= '9') {
                            temp += number[j];
                        }
                    }
                    number = temp;
                    number+=string[i];
                    count = 0;
                } else if (string[i] >='0' && string[i] <= '9') {
                    number+=string[i];
                    count++;
                }
                if(count == 3 && i!=0) {
                    count = 0;
                    number+='.';
                }
            }
            number = number.split('').reverse().join('');
            var temp = number.includes(',');
            if (number !== '' &&!temp) {
                number = number+',00';
            }
            return number;
        }
        function recalculate() {
            let kaufpreis = parseFloat($('input[name=kaufpreis]').val().replace(".", "").replace(",", "."));
            if(isNaN(kaufpreis)) kaufpreis=0;
            let kostenumbau = parseFloat($('input[name=kostenumbau]').val().replace(".", "").replace(",", "."));
            if(isNaN(kostenumbau)) kostenumbau=0;
            let kostennotar = parseFloat($('input[name=kostennotar]').val().replace(".", "").replace(",", "."));
            if(isNaN(kostennotar)) kostennotar=0;
            let grunderwerbssteuer = parseFloat($('input[name=grunderwerbssteuer]').val().replace(".", "").replace(",", "."));
            if(isNaN(grunderwerbssteuer)) grunderwerbssteuer=0;
            let maklerkosten = parseFloat($('input[name=maklerkosten]').val().replace(".", "").replace(",", "."));
            if(isNaN(maklerkosten)) maklerkosten=0;
            let eigenkapital = parseFloat($('input[name=eigenkapital]').val().replace(".", "").replace(",", "."));
            if(isNaN(eigenkapital)) eigenkapital=0;
            let calculatedGesamtkosten = kaufpreis + kostenumbau + kaufpreis*kostennotar/100.0 + kaufpreis*grunderwerbssteuer/100.0  + kaufpreis*maklerkosten/100.0;
            if(calculatedGesamtkosten < eigenkapital) {
                eigenkapital = calculatedGesamtkosten;
                $('input[name=eigenkapital]').val(formatNumbers(eigenkapital.toString().replace(".", ",")));
            }
            let calculatedFinanzierungsbedarf = calculatedGesamtkosten - eigenkapital;
            let plusMinus = calculatedFinanzierungsbedarf<0? '-':'';
            kostennotar = (kaufpreis*kostennotar/100.0).toFixed(2).toString().replace(".", ",");
            grunderwerbssteuer = (kaufpreis*grunderwerbssteuer/100.0).toFixed(2).toString().replace(".", ",");
            maklerkosten = (kaufpreis*maklerkosten/100.0).toFixed(2).toString().replace(".", ",");
            calculatedGesamtkosten = calculatedGesamtkosten.toFixed(2).toString().replace(".", ",");
            calculatedFinanzierungsbedarf = calculatedFinanzierungsbedarf.toFixed(2).toString().replace(".", ",");
            $('span[name=kostennotar]').html(formatNumbers(kostennotar));
            $('input[name=kostennotar_value]').val(formatNumbers(kostennotar));
            $('span[name=grunderwerbssteuer]').html(formatNumbers(grunderwerbssteuer));
            $('input[name=grunderwerbssteuer_value]').val(formatNumbers(grunderwerbssteuer));
            $('span[name=maklerkosten]').html(formatNumbers(maklerkosten));
            $('input[name=maklerkosten_value]').val(formatNumbers(maklerkosten));
            $('input[name=gesamtkosten]').val(formatNumbers(calculatedGesamtkosten));
            $('input[name=finanzierungsbedarf]').val(plusMinus+formatNumbers(calculatedFinanzierungsbedarf));
            $('#loan_amount').val(plusMinus+formatNumbers(calculatedFinanzierungsbedarf));
            $('input[name=loan_amount_hidden]').val(plusMinus+formatNumbers(calculatedFinanzierungsbedarf));
        }
        function recalculate_1() {
            var loan_amount = parseFloat($('#loan_amount').val().replace(/\./g,"").replace(",","."));
            // var discount = parseFloat($('#payment_discount').val());
            // var payout = loan_ammount*(100-discount)/100;
            //
            // $('#payment_amount').val(payout);
            $('#payment_amount').click();
            $('#Outstanding_balance').click();
            $('#effective_interest').click();
            $('#connection_credit').click();

            if ($("#repayment_date").is(":checked")) {
                repaymentDate();
            }
            if ($("#montly_deposit").is(":checked") || $("#payment_opt_rad").is(":checked")) {
                repaymentDate_1();
            }
            if ($("#new_repayment_rate").is(":checked")) {
                new_repayment_rate();
            }
            if ($("#new_rate").is(":checked")) {
                new_rate();
            }
            function repaymentDate(){
                var borrowing_rate = parseFloat($('#borrowing_rate').val().replace(/\./g,"").replace(",","."));
                var repayment_date_inp = parseFloat($('#repayment_date_inp').val().replace(/\./g,"").replace(",","."));
                var montly_deposit_val =(loan_amount*(borrowing_rate + repayment_date_inp)/1200).toFixed(2);
                $('#montly_deposit_val').val(formatNumbers(montly_deposit_val.toString().replace(".",",")));

            }
            function new_rate(){

                var new_borrowing_rate = parseFloat($('#new_borrowing_rate').val().replace(/\./g,"").replace(",","."));
                var new_rate_inp = parseFloat($('#new_rate_inp').val().replace(/\./g,"").replace(",","."));

                var new_repayment_rate_inp =(new_rate_inp*1200/loan_amount- new_borrowing_rate).toFixed(2);
                $('#new_repayment_rate_inp').val(formatNumbers(new_repayment_rate_inp.toString().replace(".",",")));

            }
            function repaymentDate_1() {
                var montly_deposit = parseFloat($('#montly_deposit_val').val().replace(".", "").replace(",", "."));
                var loan_amount = parseFloat($('#loan_amount').val().replace(/\./g,"").replace(",","."));
                var borrowing_rate = parseFloat($('#borrowing_rate').val().replace(/\./g,"").replace(",","."));
                if (isNaN(montly_deposit)) {
                    $('#message_montly_deposit').html('* Pflichtfeld');
                } else {
                    var repayment_rate = montly_deposit * 100 * 12 / loan_amount - borrowing_rate;
                    repayment_rate = formatNumbers((repayment_rate.toFixed(2).toString().replace(".",",")));
                    if (isNaN(repayment_rate)) {
                        $('#repayment_date_inp').val('some values are missing');
                    } else {
                      ($('#repayment_date_inp').val(repayment_rate));
                    }
                }
                if (isNaN(loan_amount)) {
                    $('#message_loan_amount').html('* Pflichtfeld');
                } else {
                    var repayment_rate = montly_deposit * 100 * 12 / loan_amount - borrowing_rate;
                    repayment_rate = formatNumbers((repayment_rate.toFixed(2).toString().replace(".",",")));
                    if (isNaN(repayment_rate)) {
                        $('#repayment_date_inp').val('some values are missing');
                    } else {
                        ($('#repayment_date_inp').val(repayment_rate));
                    }
                }
                if (isNaN(borrowing_rate)) {
                    $('#message_borrowing_rate').html('* Pflichtfeld');
                } else {
                    var repayment_rate = montly_deposit * 100 * 12 / loan_amount - borrowing_rate;
                    repayment_rate = formatNumbers((repayment_rate.toFixed(2).toString().replace(".",",")));
                    ($('#repayment_date_inp').val(repayment_rate));
                }
            }
            function new_repayment_rate(){
                var loan_amount = parseFloat($('#loan_amount').val().replace(/\./g,"").replace(",","."));
                var new_borrowing_rate = parseFloat($('#new_borrowing_rate').val().replace(/\./g,"").replace(",","."));
                var new_repayment_rate = parseFloat($('#new_repayment_rate_inp').val().replace(/\./g,"").replace(",","."));
                if(loan_amount && new_borrowing_rate && new_repayment_rate)
                {
                    var new_rate =(loan_amount*(new_borrowing_rate+new_repayment_rate)/100/12).toFixed(2);
                    $('#new_rate_inp').val(formatNumbers(new_rate.toString().replace(".",",")));
                }
                else{
                    if(isNaN(loan_amount)){ $('#message_loan_amount').html('* Pflichtfeld'); } //else {if(loan_amount){ $('#message_loan_amount').html(''); }}
                    if(isNaN(new_borrowing_rate)){ $('#message_new_borrowing_rate').html('* Pflichtfeld'); }
                    if(isNaN(new_repayment_rate)){ $('#message_new_repayment_date').html('* Pflichtfeld'); }
                }
            }
            $('#total_maturity').click();
            registery_fee();


            // $('#loan_amount').val(plusMinus+formatNumbers(calculatedFinanzierungsbedarf));
        }
        var registery_fees={500:15, 1000:19, 1500:23, 2000:27, 3000:33, 4000:39, 5000:45, 6000:51, 7000:57, 8000:63, 9000:69, 10000:75, 13000:83, 16000:91, 19000:99, 22000:107, 25000:115, 30000:125, 35000:135, 40000:145, 45000:155, 50000:165, 65000:192, 80000:219, 95000:246, 110000:273, 125000:300, 140000:327, 155000:354, 170000:381, 185000:408, 200000:435, 230000:485, 260000:535, 290000:585, 320000:635, 350000:685, 380000:735, 410000:785, 440000:835, 470000:885, 500000:935, 550000:1015, 600000:1095, 650000:1175, 700000:1255, 750000:1335, 800000:1415, 850000:1495, 900000:1575, 950000:1655, 1000000:1735, 1050000:1815, 1100000:1895, 1150000:1975, 1200000:2055, 1250000:2135, 1300000:2215, 1350000:2295, 1400000:2375, 1450000:2455, 1500000:2535, 1550000:2615, 1600000:2695, 1650000:2775, 1700000:2855, 1750000:2935, 1800000:3015, 1850000:3095, 1900000:3175, 1950000:3255, 2000000:3335, 2050000:3415, 2100000:3495, 2150000:3575, 2200000:3655, 2250000:3735, 2300000:3815, 2350000:3895, 2400000:3975, 2450000:4055, 2500000:4135, 2550000:4215, 2600000:4295, 2650000:4375, 2700000:4455, 2750000:4535, 2800000:4615, 2850000:4695, 2900000:4775, 2950000:4855, 3000000:4935}
        registery_fee();
        function registery_fee() {
            var fee = registery_fees[x(registery_fees, parseInt($('#loan_amount').val().replace(/\./g, "").replace(",",".")))];
            // setTimeout(function () {
            $('#registery_fees').val(formatNumbers(fee.toFixed(2).toString().replace(".", ",")));
            // },2000);
            function x(rprice, qty) {
                var prev = -1;
                var i=0;
                for (i in rprice) {
                    var n = parseInt(i);
                    if ((prev != -1) && (qty <= n))
                        return n;
                    else
                        prev = n;
                }
            }
        }
        function openTimeLine(cardNo){
            $('.ten_fields-'+cardNo).show();
            $('.isTM-'+cardNo).val(1);
            var timeLinerBtnText = $('.addTimeLiner-'+cardNo).text();
            if ( timeLinerBtnText == "Baufi Zeitstrahl hinzufügen" ) {
                $('.addTimeLiner-'+cardNo).text('Baufi Zeitstrahl entfernen');
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
            else if ( timeLinerBtnText == "Baufi Zeitstrahl entfernen" ) {
                $('.addTimeLiner-'+cardNo).text('Baufi Zeitstrahl hinzufügen');
                $('.addTimeLiner-'+cardNo).removeClass('btn-danger');
                $('.addTimeLiner-'+cardNo).addClass('btn-primary');
                $('.thisTimeline-'+cardNo).html('');
            }
        }
        function openCtTimeLine(cardNo){
            $('.ct_fields-'+cardNo).show();
            $('.isTM-'+cardNo).val(1);
            var ctTimeLinerBtnText = $('.addCtTimeLiner-'+cardNo).text();
            if ( ctTimeLinerBtnText == "Angepasster Zeitstrahl hinzufügen" ) {
                $('.addCtTimeLiner-'+cardNo).text('Angepasster Zeitstrahl entfernen');
                $('.addCtTimeLiner-'+cardNo).removeClass('btn-primary');
                $('.addCtTimeLiner-'+cardNo).addClass('btn-danger');
                var ctTimeLiner = `<div class="row ct_fields-`+cardNo+` mt-35">
                                        <div class="col-sm-12">
                                            <h5>Zeitstrahl Phase 1 (Angepasster)</h5>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Darlehen</label>
                                            <input type="text" name="Cal[`+cardNo+`][customerTimeline][darlehen]" class="form-control" placeholder="" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Zinsstaz</label>
                                            <input type="text" name="Cal[`+cardNo+`][customerTimeline][zinsstaz]" class="form-control" placeholder="" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Tilgung</label>
                                            <input type="text" name="Cal[`+cardNo+`][customerTimeline][tilgung]" class="form-control" placeholder="" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Laufzeit</label>
                                            <input type="text" name="Cal[`+cardNo+`][customerTimeline][laufzeit]" class="form-control" placeholder="" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Rate monatl</label>
                                            <input type="text" name="Cal[`+cardNo+`][customerTimeline][rate_monatl]" class="form-control" placeholder="" value="" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Restschuld</label>
                                            <input type="text" name="Cal[`+cardNo+`][customerTimeline][restschuld]" class="form-control" placeholder="" value="" required>
                                        </div>
                                    </div>`;
                $('.thisCtTimeline-'+cardNo).html(ctTimeLiner);
            }
            else if ( ctTimeLinerBtnText == "Angepasster Zeitstrahl entfernen" ) {
                $('.addCtTimeLiner-'+cardNo).text('Angepasster Zeitstrahl hinzufügen');
                $('.addCtTimeLiner-'+cardNo).removeClass('btn-danger');
                $('.addCtTimeLiner-'+cardNo).addClass('btn-primary');
                $('.thisCtTimeline-'+cardNo).html('');
            }
        }
        function addNewCalc(){
            $('.new_form').show();
            $('#timelineChecker').val(1);
            var target = $('#Calculation');
            var cardNo = target.find('.card').length;
            var Calc = `<div class="card card-`+cardNo+`">
                            <div class="card-header" id="heading-`+cardNo+`">
                                <h2 class="mb-0">`+
                // <input type="checkbox" checked name="Cal[`+cardNo+`][enabled]">
                `<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-`+cardNo+`">
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
                                                <input type="hidden" class="angebotdate" name="angebotdate" value="" />
                                                <input type="text" id="bank" class="form-control" name="Cal[`+cardNo+`][bank]"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Tilgungssatz</label>
                                                <input type="text" id="annuities" class="form-control" name="Cal[`+cardNo+`][annuities]"/>
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
                                                <label>Monatliche Rate</label>
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
                                                <a onclick="openTimeLine(`+cardNo+`)" href="Javacript:void(0)" class="btn btn-primary addTimeLiner-`+cardNo+`">Baufi Zeitstrahl hinzufügen</a>
                                                <a onclick="openCtTimeLine(`+cardNo+`)" href="Javacript:void(0)" class="btn btn-primary addCtTimeLiner-`+cardNo+`">Angepasster Zeitstrahl hinzufügen</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thisTimeline-`+cardNo+`"></div>
                                    <div class="thisCtTimeline-`+cardNo+`"></div>
                                </div>
                            </div>
                        </div>`;
            target.append(Calc);
        }
    </script>
@endsection

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <?php
        
        function stringReplace($string, $from = '.', $to=',')
        {
            for ($i=0; $i < strlen($string); $i++) {
                if($string[$i] == $from) $string[$i] = $to;
            }
            return $string;
        }

    ?>



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

                {{--                location11--}}
                <div class="col-md-4 col-md-offset-2" id="finanzierungsbedarf">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <h4>Baufinanzierungsdaten</h4>
                    <div class="form-group">
                        <label for="kaufpreis">Kaufpreis des Objekts</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="kaufpreis" id="kaufpreis"
                                   placeholder="0.00" value="{{ stringReplace($kunden->kaufpreis, '.', ',') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kostenumbau">Umbau/Modernisierung</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="kostenumbau" id="kostenumbau"
                                   placeholder="0.00" value="{{ stringReplace($kunden->kostenumbau, '.', ',') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kostennotar">Notar/Gericht ( <span name="kostennotar" class="text-danger">{{ number_format($kunden->kostennotar_value, 2, ',', '.') }}</span>€ )</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="kostennotar" id="kostennotar"
                                   placeholder="{{ stringReplace($kunden->kostennotar, '.', ',') }}" value="{{ stringReplace(number_format($kunden->kostennotar, 1, '.', ','), '.', ',') }}">
                                   <input type="hidden" name="kostennotar_value" value="{{ number_format($kunden->kostennotar_value, 1, ',', '.') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                            <!-- @php
                               $grunderwerbssteuer_value =  str_replace(",","",$kunden->grunderwerbssteuer_value);
                               $grunderwerbssteuer_value =  str_replace(".","",$grunderwerbssteuer_value);
                            @endphp -->
                        <label for="grunderwerbssteuer">Grunderwerbssteuer ( <span name="grunderwerbssteuer" class="text-danger">{{ number_format($kunden->grunderwerbssteuer_value, 2, ',', '.')  }}</span>€ )</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="grunderwerbssteuer" id="grunderwerbssteuer"
                                   placeholder="{{ stringReplace($kunden->grunderwerbssteuer, '.', ',') }}" value="{{ stringReplace(number_format($kunden->grunderwerbssteuer, 1, '.', ','), '.', ',') }}">
                            <input type="hidden" name="grunderwerbssteuer_value" value="{{ number_format($kunden->grunderwerbssteuer_value, 1, ',', '.') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="maklerkosten">Maklerkosten ( <span name="maklerkosten" class="text-danger">{{ number_format($kunden->maklerkosten_value, 2, ',', '.') }}</span>€ )</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="maklerkosten" id="maklerkosten"
                                   placeholder="0.00" value="{{ stringReplace(number_format($kunden->maklerkosten, 2, '.', ','), '.', ',') }}">
                                   <input type="hidden" name="maklerkosten_value" value="{{ number_format($kunden->maklerkosten_value, 1, ',', '.') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gesamtkosten">Gesamtkosten</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="gesamtkosten" id="gesamtkosten"
                                   placeholder="0.00" value="{{ stringReplace($kunden->gesamtkosten, '.', ',')  }}" readonly="">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="eigenkapital">Eigenkapital</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="eigenkapital" id="eigenkapital"
                                   placeholder="0.00" value="{{ stringReplace($kunden->eigenkapital, '.', ',') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="finanzierungsbedarf">Finanzierungsbedarf</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="finanzierungsbedarf"
                                   placeholder="0.00" value="{{ stringReplace($kunden->finanzierungsbedarf, '.', ',') }}" readonly="">
                            <input type="hidden" name="loan_amount_hidden" value="{{ stringReplace($kunden->loan_amount, '.', ',') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-8 col-md-offset-2">
                    <h4>Stammdaten</h4>

                    <div class="form-group">
                        <label class="col-form-label" for="anrede">Anrede</label>
                               <select  class="form-control" name="anrede" id="anrede" >
                                   <option value="herr" {{ $kunden->anrede=='herr'?'selected':'' }}>Herr</option>
                                   <option value="frau" {{ $kunden->anrede=='frau'?'selected':'' }}>Frau</option>
                               </select>

                    </div>

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
                        <label>Berater auswählen</label>
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
                    <button type="submit" class="btn btn-primary">Kunden aktualieren</button>


                    <hr>



                    <div id="button_edit" style="position: fixed; right: 0px; margin-top: -70px; z-index: 111111; ">
                        <li class="nav-item"><a href="{{route('kunden.show',$kunden->id)}}" class=" btn btn-mkhyp" style="border-radius: 0px;">Kunden ansehen</a></li>
                    </div>

                        <!-- Kalkulation hinzufügen button -->
                    <!-- <a onclick="addNewCalc()" href="Javascript:void(0)" class="btn btn-primary">Kalkulation hinzufügen</a> -->

                    @if($kunden->ehepartner_enabled)
                        @php($spouseDivShown = 'block')
                        <a onclick="kundenSpouse(this)" href="disable_borrower" class="btn btn-danger" data-status="1" style="margin-left: 10px">Ehepartner entfernen</a>
                    @else
                        @php($spouseDivShown = 'none')
                        <a onclick="kundenSpouse(this)" href="Javacript:void(0)" class="btn btn-primary" data-status="0"style="margin-left: 10px">2. Darlehensnehmer hinzufügen</a>
                    @endif
                    <div id="spouseDiv"  style="display: {{$spouseDivShown}}">
                        <input type="hidden" name="ehepartner_enabled" value="{{$kunden->ehepartner_enabled}}">
                        <hr>
                        <h4>2. Darlehensnehmer</h4>
                        <div class="form-group">
                            <label class="col-form-label" for="vorname">Vorname</label>
                            <input type="text" class="form-control" name="ehepartner_vorname" id="ehepartner_vorname"
                                   placeholder="{{ $kunden->ehepartner_vorname }}" value="{{ $kunden->ehepartner_vorname }}" >
                        </div>
                        <div class="form-group">
                            <label for="nachname">Nachname</label>
                            <input type="text" class="form-control" name="ehepartner_nachname" id="ehepartner_nachname"
                                   placeholder="{{ $kunden->ehepartner_nachname }}" value="{{ $kunden->ehepartner_nachname }}" >
                        </div>
                        <div class="form-group">
                            <label for="mail">Mail</label>
                            <input type="mail" class="form-control" name="ehepartner_mail" id="ehepartner_mail" placeholder="{{ $kunden->ehepartner_mail }}"
                                   value="{{ $kunden->ehepartner_mail }}" >
                        </div>
                        <div class="form-group">
                            <label for="telefon">Telefon</label>
                            <input type="text" class="form-control" name="ehepartner_telefon" id="ehepartner_telefon"
                                   placeholder="{{ $kunden->ehepartner_telefon }}" value="{{ $kunden->ehepartner_telefon }}" >
                        </div>
                        <div class="form-group">
                            <label for="geburtsdatum">Geburtsdatum</label>
                            <input type="date" class="form-control" name="ehepartner_geburtsdatum" id="ehepartner_geburtsdatum"
                                   placeholder="{{ $kunden->ehepartner_geburtsdatum }}" value="{{ $kunden->ehepartner_geburtsdatum }}">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" >Darlehensnehmer aktualisieren</button>
                        </div>
                        <hr>
                    </div>

                    <div class="accordion mt-35" id="Calculation">
                        <?php $cIndex = 0 ?>
                        @foreach($Calculations as $cal)
                            <div class="card card-{{$cIndex}}">
                                <div class="card-header" id="heading-{{$cIndex}}">
                                    <h2 class="mb-0">
                                    <!-- <input type="checkbox" {{$cal->enabled ? 'checked':''}} onclick="enabled(this);" data-calculation_id="{{$cal->id}}" name="Cal[{{$cIndex}}][enabled]"> -->
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{$cIndex}}">
                                            <!-- Finanzbaustein #{{$cIndex+1}} -->
                                            {{$cal->name}}
                                        </button>
                                        
                                        <span class="removeCard float-right"><i class="fa fa-times" onclick="removeCard({{$cIndex}})"></i></span>
                                        <span class="edit_heading float-right"><i class="fa fa-edit" data-toggle="modal" data-target="#myModal-{{$cIndex}}"></i></span>
                                    </h2>
                                </div>
                                <div id="collapse-{{$cIndex}}" data-parent="#Calculation">
                                    <div class="card-body">

                                        <div class="row">
                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <label>Bank</label>--}}
                                            {{--                                                    <input type="hidden" class="angebotdate" name="angebotdate" value="{{$cal->angebotdate}}" />--}}
                                            {{--                                                    <input type="text" id="bank" value="{{$cal->bank}}" class="form-control" name="Cal[{{$cIndex}}][bank]"/>--}}
                                            {{--                                                        --}}{{-- <option @if($cal->bank == 'Deutsche Bank') selected @endif value="Deutsche Bank">Deutsche Bank</option>--}}
                                            {{--                                                        <option @if($cal->bank == 'DSL') selected @endif value="DSL">DSL</option>--}}
                                            {{--                                                        <option @if($cal->bank == 'Sparkasse') selected @endif value="Sparkasse">Sparkasse</option>--}}
                                            {{--                                                    </select> --}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}

                                            {{--                                                    <label>Tilgungssatz</label>--}}
                                            {{--                                                <input type="text" id="annuities" class="form-control" value="{{$cal->annuities}}" name="Cal[{{$cIndex}}][annuities]"/>--}}
                                            {{--                                                        --}}{{-- <option @if($cal->annuities == 'Annuitäten') selected @endif value="Annuitäten">Annuitäten</option>--}}
                                            {{--                                                        <option @if($cal->annuities == 'Tilgungsausgesetztes Darlehen') selected @endif value="Tilgungsausgesetztes Darlehen">Tilgungsausgesetztes Darlehen</option>--}}
                                            {{--                                                    </select> --}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <label>Sollzins</label>--}}
                                            {{--                                                    <input type="text" id="to_interest" value="{{$cal->to_interest}}" class="form-control" name="Cal[{{$cIndex}}][to_interest]" required>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <label>Effektivzins</label>--}}
                                            {{--                                                    <input type="text" id="effectiveness" value="{{$cal->effectiveness}}" class="form-control" name="Cal[{{$cIndex}}][effectiveness]" required>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <label>Zinsbindung</label>--}}
                                            {{--                                                    <input type="text" id="fixed_interest_rates" value="{{$cal->fixed_interest_rates}}" class="form-control" name="Cal[{{$cIndex}}][fixed_interest_rates]" required>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <label>Monatliche Rate</label>--}}
                                            {{--                                                    <input type="text" id="monthly_loan" value="{{$cal->monthly_loan}}" class="form-control" name="Cal[{{$cIndex}}][monthly_loan]" required>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <label>Restschuld Ende Zinsbindung</label>--}}
                                            {{--                                                    <input type="text" id="residual_debt_interest_rate" value="{{$cal->residual_debt_interest_rate}}" class="form-control" name="Cal[{{$cIndex}}][residual_debt_interest_rate]" required>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <label>Kalkulierte Luafzeit (ca.)</label>--}}
                                            {{--                                                    <input type="text" id="calculated_luaf_time" value="{{$cal->calculated_luaf_time}}" class="form-control" name="Cal[{{$cIndex}}][calculated_luaf_time]" required>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <label>Nettodarlehensbetrag</label>--}}
                                            {{--                                                    <input type="text" id="net_loan_amount" value="{{$cal->net_loan_amount}}" class="form-control" name="Cal[{{$cIndex}}][net_loan_amount]" required>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <label>Bereitsellungszins</label>--}}
                                            {{--                                                    <input type="text" id="initial_interest" value="{{$cal->initial_interest}}" class="form-control" name="Cal[{{$cIndex}}][initial_interest]" required>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                            {{--                                            <div class="col-sm-3">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <label>Optionale Soundertilgung</label>--}}
                                            {{--                                                    <input type="text" id="optional_sound_recovery" value="{{$cal->optional_sound_recovery}}" class="form-control" name="Cal[{{$cIndex}}][optional_sound_recovery]" required>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>
--}}


                                            {{--                                            ange--}}
                                            {{-- new table--}}




                                            {{--                                            <h4>New Calculator</h4>--}}
                                            {{--Hassaan Table--}}


                                            <script>
                                                var A=[];
                                                var B=[];
                                                var C=[];
                                                var D=[];
                                                var E=[];
                                                var F=[];
                                                var G=[];
                                                var H=[];
                                                var I=[];
                                                var J=[];
                                                var K=[];
                                                var L=[];
                                                var M=[];

                                                $(document).ready(function () {


                                                    columnAB();
                                                    setTimeout(function(){
                                                        recalculate_1();
                                                    }, 200);
                                                    $('#end_of_fixed_year').val( parseInt($('#loan_period').val())+ parseInt($('#payment_year').val()));
                                                    $('#end_of_fixed_year').val($('#payment_month').val()+','+ $('#end_of_fixed_year').val());
                                                    $('#loan_period').change(function () {
                                                        if ($('#payment_month').val() !='Marz' && $('#payment_month').val()!='Mai'&&$('#payment_month').val()!='Juni'&&$('#payment_month').val()!='Juli'&&$('#payment_month').val()!='Oktober'&&$('#payment_month').val()!='Dezember')
                                                        {
                                                            $('#end_of_fixed_year').empty();
                                                            $('#end_of_fixed_year').val( parseInt($('#loan_period').val())+ parseInt($('#payment_year').val()));
                                                            $('#end_of_fixed_year').val($('#payment_month').val()+','+ $('#end_of_fixed_year').val());
                                                        }
                                                        else
                                                        {
                                                            alert('Monat nicht erlaubt');
                                                        }
                                                    });
                                                    $('#payment_year').change(function () {
                                                        if ($('#payment_month').val() !='Marz' && $('#payment_month').val()!='Mai'&&$('#payment_month').val()!='Juni'&&$('#payment_month').val()!='Juli'&&$('#payment_month').val()!='Oktober'&&$('#payment_month').val()!='Dezember')
                                                        {
                                                            $('#end_of_fixed_year').empty();
                                                            $('#end_of_fixed_year').val( parseInt($('#loan_period').val())+ parseInt($('#payment_year').val()));
                                                            $('#end_of_fixed_year').val($('#payment_month').val()+','+ $('#end_of_fixed_year').val());
                                                        }
                                                        else
                                                        {
                                                            alert('Monat nicht erlaubt');
                                                        }
                                                    });
                                                    $('#payment_month').change(function () {
                                                        if ($('#payment_month').val() !='Marz' && $('#payment_month').val()!='Mai'&&$('#payment_month').val()!='Juni'&&$('#payment_month').val()!='Juli'&&$('#payment_month').val()!='Oktober'&&$('#payment_month').val()!='Dezember')
                                                        {
                                                            $('#end_of_fixed_year').empty();
                                                            $('#end_of_fixed_year').val( parseInt($('#loan_period').val())+ parseInt($('#payment_year').val()));
                                                            $('#end_of_fixed_year').val($('#payment_month').val()+','+ $('#end_of_fixed_year').val());
                                                        }else
                                                        {
                                                            alert('Monat nicht erlaubt');
                                                        }
                                                    });
                                                    //Payment Amount calculation Auszahlungsbetrag (Euro)
                                                    $('#payment_amount').click(function () {
                                                        var loan_ammount = parseFloat($('#loan_amount').val().replace(/\./g,"").replace(",","."));
                                                        var discount = parseFloat($('#payment_discount').val());
                                                        var payout = loan_ammount*(100-discount)/100;
                                                        $('#payment_amount').val($('#loan_amount').val());
                                                    });
                                                    //Tilgungssatz (Prozent) Calculation
                                                    // function repaymentDate() {
                                                    //     var montly_deposit = parseFloat($('#montly_deposit_val').val().replace(".", "").replace(",", "."));
                                                    //     var loan_amount = parseFloat($('#loan_amount').val().replace(/\./g,"").replace(",","."));
                                                    //     var borrowing_rate = parseFloat($('#borrowing_rate').val().replace(/\./g,"").replace(",","."));
                                                    //     if (isNaN(montly_deposit)) {
                                                    //         $('#message_montly_deposit').html('* Pflichtfeld');
                                                    //     } else {
                                                    //         var repayment_rate = montly_deposit * 100 * 12 / loan_amount - borrowing_rate;
                                                    //         repayment_rate = formatNumbers((repayment_rate.toFixed(2).toString().replace(".",",")));
                                                    //         if (isNaN(repayment_rate)) {
                                                    //             $('#repayment_date_inp').val('some values are missing');
                                                    //         } else {
                                                    //             $('#repayment_date_inp').val(repayment_rate);
                                                    //         }
                                                    //     }
                                                    //     if (isNaN(loan_amount)) {
                                                    //         $('#message_loan_amount').html('* Pflichtfeld');
                                                    //     } else {
                                                    //         var repayment_rate = montly_deposit * 100 * 12 / loan_amount - borrowing_rate;
                                                    //         repayment_rate = formatNumbers((repayment_rate.toFixed(2).toString().replace(".",",")));
                                                    //         if (isNaN(repayment_rate)) {
                                                    //             $('#repayment_date_inp').val('some values are missing');
                                                    //         } else {
                                                    //             $('#repayment_date_inp').val(repayment_rate);
                                                    //         }
                                                    //     }
                                                    //     if (isNaN(borrowing_rate)) {
                                                    //         $('#message_borrowing_rate').html('* Pflichtfeld');
                                                    //     } else {
                                                    //         var repayment_rate = montly_deposit * 100 * 12 / loan_amount - borrowing_rate;
                                                    //         repayment_rate = formatNumbers((repayment_rate.toFixed(2).toString().replace(".",",")));
                                                    //        $('#repayment_date_inp').val(repayment_rate);
                                                    //     }
                                                    // }
                                                    // function monthlyDeposit(){
                                                    //     var loan_amount = parseInt($('#loan_amount').val().replace(/\./g,"").replace(",","."));
                                                    //     var borrowing_rate = parseFloat($('#borrowing_rate').val().replace(/\./g,"").replace(",","."));
                                                    //     var repayment_date = parseFloat($('#repayment_date_inp').val().replace(/\./g,"").replace(",","."));
                                                    //     var monthly_deposit = loan_amount*(borrowing_rate+repayment_date)/1200;
                                                    //     $('#montly_deposit_val').val(monthly_deposit);
                                                    // }
                                                    $('#repayment_date').click(function () {
                                                        $("#sparsumme").prop("disabled", true);
                                                        $("#laufzeit").prop("disabled", true);
                                                        $("#statements_due").prop("disabled", true);
                                                        $("#onetime_pay").prop("disabled", true);
                                                        $("#monthly_rate_pay").prop("disabled", true);
                                                        $('#repayment_date_inp').attr("disabled",false);
                                                        $('#montly_deposit_val').attr("disabled",true);
                                                        localStorage['radio_status'] = 'repayment_date';
                                                        $("#running_time").prop("disabled", false);
                                                        $("#running_time").val('');
                                                        $("#running_time").prop("disabled", true);
                                                    });
                                                    $('#montly_deposit').click(function () {
                                                        $("#sparsumme").prop("disabled", true);
                                                        $("#statements_due").prop("disabled", true);
                                                        $("#onetime_pay").prop("disabled", true);
                                                        $("#monthly_rate_pay").prop("disabled", true);
                                                        $("#laufzeit").prop("disabled", true);
                                                        $('#repayment_date_inp').attr("disabled",true);
                                                        $('#montly_deposit_val').attr("disabled",false);
                                                        localStorage['radio_status'] = 'montly_deposit';
                                                        $("#running_time").prop("disabled", false);
                                                        $("#running_time").val('');
                                                        $("#running_time").prop("disabled", true);
                                                    });
                                                    $('#new_rate').click(function () {
                                                        $('#new_rate_inp').attr("disabled",false);
                                                        $('#new_repayment_rate_inp').attr("disabled",true);
                                                    });
                                                    $('#new_repayment_rate').click(function () {
                                                        $('#new_rate_inp').attr("disabled",true);
                                                        $('#new_repayment_rate_inp').attr("disabled",false);
                                                    });
                                                    //Calculation Tilgungssatz (Prozent)
                                                    $('#payment_opt_rad').click(function () {
                                                        $("#sparsumme").prop("disabled", true);
                                                        $("#laufzeit").prop("disabled", true);
                                                        $("#statements_due").prop("disabled", true);
                                                        $("#onetime_pay").prop("disabled", true);
                                                        $("#monthly_rate_pay").prop("disabled", true);
                                                        localStorage['radio_status'] = 'payment_opt_rad';
                                                        $("#running_time").prop("disabled", false);
                                                        $("#running_time").val('');
                                                        $("#running_time").prop("disabled", true);
                                                    /*    var loan_period = parseInt($('#loan_period').val());
                                                        var borrowing_rate = parseFloat($('#borrowing_rate').val().replace(".", "").replace(",", "."));
                                                        var montly_deposit_val = parseFloat($('#montly_deposit_val').val().replace(".", "").replace(",", "."));
                                                        var loan_amount = parseInt($('#loan_amount').val().replace(/\./g,"").replace(",","."));
                                                        // Input fields Checks
                                                        if(loan_amount && loan_period && borrowing_rate && montly_deposit_val)
                                                        {
                                                            var finalvalue = fv(borrowing_rate/100/12,loan_period*12,montly_deposit_val,-loan_amount,0);
                                                            if(loan_period>50)
                                                            {
                                                                $('#message_payment_opt').html('Zinsbindung zu lang!');
                                                            }
                                                            else if(finalvalue<-1 || isNaN(finalvalue)){
                                                                $('#message_payment_opt').html('Darlehen vor Ende Zinsbindung getilgt!');
                                                                //alert('Loan before end fixed interest rate!');
                                                            }
                                                            else{
                                                                $('#message_payment_opt').html('');
                                                                monthlyDeposit();
                                                                //repaymentDate();
                                                            }
                                                            function finalvalueCal(rate, nper, pmt, pv, type) {
                                                                if (!type) type = 0;
                                                                var pow = Math.pow(1 + rate, nper);
                                                                var fv = 0;
                                                                if (rate) {
                                                                    fv = (pmt * (1 + rate * type) * (1 - pow) / rate) - pv * pow;
                                                                } else {
                                                                    fv = -1 * (pv + pmt * nper);
                                                                }
                                                                return fv;
                                                            }
                                                        }
                                                        else {
                                                            if ((isNaN(loan_amount))) {
                                                                $('#message_loan_amount').html('* Pflichtfeld');
                                                            }
                                                            if ((isNaN(loan_period))) {
                                                                $('#message_loan_period').html('* Pflichtfeld');
                                                            }
                                                            if ((isNaN(borrowing_rate))) {
                                                                $('#message_borrowing_rate').html('* Pflichtfeld');
                                                            }
                                                            if ((isNaN(montly_deposit_val))) {
                                                                $('#message_montly_deposit').html('* Pflichtfeld');
                                                            }
                                                        }*/
                                                        $('#montly_deposit_val').val(((Math.ceil(goal(0)*100)/100).toString().replace(".",",")));
                                                        setTimeout(function () {
                                                            // jiangc modify
                                                            $('#Outstanding_balance').val('0,00');
                                                            $('#connection_credit').val('0,00');
                                                        },500);

                                                        // $('#Outstanding_balance').val('0,00');
                                                        // $('#connection_credit').val('0,00');
                                                        // recalculate_1();
                                                        // $('#Outstanding_balance').val('0,00');
                                                        // $('#connection_credit').val('0,00');
                                                    function goal(result){
                                                        var i = 0;
                                                        var flag = 0;
                                                        var step=10000;
                                                            while( true){
                                                                console.log(get_ourstanding_balance(i), i);
                                                                if(get_ourstanding_balance(i) == 0){
                                                                    if (get_ourstanding_balance(i-0.01) == 0) {
                                                                        // if(flag == 1) break;
                                                                        i-=step;
                                                                        step = step/2;
                                                                    }
                                                                    else{
                                                                        break;
                                                                    }
                                                                }

                                                               i += step;
                                                                    // if (Math.abs(get_ourstanding_balance(i)) < 20)
                                                                    // {
                                                                    //     step = 0.01;
                                                                    //     flag = 1;
                                                                    // }
                                                            }
                                                        return i - 0.01;
                                                    }

                                                    });
                                                    // $('#new_repayment_rate').click(function () {
                                                    //     var loan_amount = parseInt($('#loan_amount').val().replace(/\./g,"").replace(",","."));
                                                    //     var new_borrowing_rate = parseInt($('#new_borrowing_rate').val().replace(/\./g,"").replace(",","."));
                                                    //     var new_repayment_rate = parseInt($('#new_repayment_rate_inp').val().replace(/\./g,"").replace(",","."));
                                                    //     if(loan_amount && new_borrowing_rate && new_repayment_rate)
                                                    //     {
                                                    //         var new_rate =Math.round(loan_amount*(new_borrowing_rate+new_repayment_rate)/100/12*100)/100;
                                                    //         $('#new_rate_inp').val(formatNumbers(new_rate.toString().replace(".",",")));
                                                    //     }
                                                    //     else{
                                                    //         if(isNaN(loan_amount)){ $('#message_loan_amount').html('* Pflichtfeld'); } //else {if(loan_amount){ $('#message_loan_amount').html(''); }}
                                                    //         if(isNaN(new_borrowing_rate)){ $('#message_new_borrowing_rate').html('* Pflichtfeld'); }
                                                    //         if(isNaN(new_repayment_rate)){ $('#message_new_repayment_date').html('* Pflichtfeld'); }
                                                    //     }
                                                    // });
                                                    // $('#new_rate').click(function () {
                                                    //     var new_rate_inp = parseInt($('#new_rate_inp').val());
                                                    //     var loan_amount = parseInt($('#loan_amount').val().replace(/\./g,"").replace(",","."));
                                                    //     var new_borrowing_rate = parseInt($('#new_borrowing_rate').val().replace(/\./g,"").replace(",","."));
                                                    //     if(new_borrowing_rate && new_repayment_rate)
                                                    //     {
                                                    //         var new_repayment_rate_inp = new_rate_inp*100*12/loan_amount-new_borrowing_rate;
                                                    //         new_repayment_rate_inp = Math.round(new_repayment_rate_inp*100)/100;
                                                    //         $('#new_repayment_rate_inp').val(new_repayment_rate_inp.toFixed(2));
                                                    //     }
                                                    //     else{
                                                    //         if(isNaN(loan_amount)){ $('#message_loan_amount').html('* Pflichtfeld'); } //else {if(loan_amount){ $('#message_loan_amount').html(''); }}
                                                    //         if(isNaN(new_borrowing_rate)){ $('#message_new_borrowing_rate').html('* Pflichtfeld'); }
                                                    //         if(isNaN(new_repayment_rate)){ $('#message_new_repayment_date').html('* Pflichtfeld'); }
                                                    //     }
                                                    // });
                                                    //NPER function
                                                    /*   function nper(rate, per, pmt, pv, fv)
                                                       {
                                                           // fv = parseFloat(fv);
                                                           //
                                                           // pmt = parseFloat(pmt);
                                                           //
                                                           // pv = parseFloat(pv);
                                                           //
                                                           // per = parseFloat(per);
                                                           //
                                                           // if (( per == 0 ) || ( pmt == 0 )){
                                                           //
                                                           //     return(0);
                                                           //
                                                           // }
                                                           //
                                                           // rate = eval((rate)/(per * 100));
                                                           //
                                                           // if ( rate == 0 ) // Interest rate is 0
                                                           //
                                                           // {
                                                           //
                                                           //     nper_value = - (fv + pv)/pmt;
                                                           //
                                                           // }
                                                           //
                                                           // else
                                                           //
                                                           // {
                                                           //
                                                           //     nper_value = Math.log((-fv * rate + pmt)/(pmt + rate * pv))/ Math.log(1 + rate);
                                                           //
                                                           // }
                                                           //
                                                           // nper_value = conv_number(nper_value,2);
                                                           return (nper_value);
                                                       }*/
                                                    function nper(ir, pmt, pv, fv=0) {
                                                        var nbperiods;
                                                        nbperiods = Math.log((-fv * ir + pmt)/(pmt + ir * pv))/ Math.log(1 + ir)
                                                        return nbperiods.toFixed(2);
                                                    }
                                                    function conv_number(expr, decplaces)
                                                    { // This function is from David Goodman's Javascript Bible.
                                                        var str = "" + (eval(expr) * Math.pow(10,decplaces)).toFixed(2);
                                                        while (str.length <= decplaces) {
                                                            str = "0" + str;
                                                        }
                                                        var decpoint = str.length - decplaces;
                                                        return (str.substring(0,decpoint) + "." + str.substring(decpoint,str.length));
                                                    }
                                                    //Final Value Calculation
                                                    function fv(rate, nper, pmt, pv)
                                                    {
                                                        // nper = parseFloat(nper);
                                                        //
                                                        // pmt = parseFloat(pmt);
                                                        //
                                                        // pv = parseFloat(pv);
                                                        //
                                                        // rate = eval((rate)/(per * 100));
                                                        //
                                                        // if (( pmt == 0 ) || ( nper == 0 )) {
                                                        //
                                                        //     return(0);
                                                        //
                                                        // }
                                                        //
                                                        // if ( rate == 0 ) // Interest rate is 0
                                                        //
                                                        // {
                                                        //
                                                        //     fv_value = -(pv + (pmt * nper));
                                                        //
                                                        // }
                                                        //
                                                        // else
                                                        //
                                                        // {
                                                        //
                                                        //     x = Math.pow(1 + rate, nper);
                                                        //
                                                        //     // y = Math.pow(1 + rate, nper);
                                                        //
                                                        //     fv_value = - ( -pmt + x * pmt + rate * x * pv ) /rate;
                                                        //
                                                        // }
                                                        //
                                                        // fv_value = conv_number(fv_value,2);
                                                        //
                                                        // return (fv_value);
                                                        var pow = Math.pow(1 + rate, nper),
                                                            fv;
                                                        pv = pv || 0;
                                                        if (rate) {
                                                            fv = (pmt*(1-pow)/rate)-pv*pow;
                                                        } else {
                                                            fv = -1 * (pv + pmt * nper);
                                                        }
                                                        return fv.toFixed(2);
                                                    }
                                                    //Rate Calculation
                                                    function rate(periods, payment, present, future, type, guess) {
                                                        guess = (guess === undefined) ? 0.01 : guess;
                                                        future = (future === undefined) ? 0 : future;
                                                        type = (type === undefined) ? 0 : type;
                                                        // Set maximum epsilon for end of iteration
                                                        var epsMax = 1e-10;
                                                        // Set maximum number of iterations
                                                        var iterMax = 10;
                                                        // Implement Newton's method
                                                        var y, y0, y1, x0, x1 = 0,
                                                            f = 0,
                                                            i = 0;
                                                        var rate = guess;
                                                        if (Math.abs(rate) < epsMax) {
                                                            y = present * (1 + periods * rate) + payment * (1 + rate * type) * periods + future;
                                                        } else {
                                                            f = Math.exp(periods * Math.log(1 + rate));
                                                            y = present * f + payment * (1 / rate + type) * (f - 1) + future;
                                                        }
                                                        y0 = present + payment * periods + future;
                                                        y1 = present * f + payment * (1 / rate + type) * (f - 1) + future;
                                                        i = x0 = 0;
                                                        x1 = rate;
                                                        while ((Math.abs(y0 - y1) > epsMax) && (i < iterMax)) {
                                                            rate = (y1 * x0 - y0 * x1) / (y1 - y0);
                                                            x0 = x1;
                                                            x1 = rate;
                                                            if (Math.abs(rate) < epsMax) {
                                                                y = present * (1 + periods * rate) + payment * (1 + rate * type) * periods + future;
                                                            } else {
                                                                f = Math.exp(periods * Math.log(1 + rate));
                                                                y = present * f + payment * (1 / rate + type) * (f - 1) + future;
                                                            }
                                                            y0 = y1;
                                                            y1 = y;
                                                            ++i;
                                                        }
                                                        return rate;
                                                    };
                                                   /* $('#effective_interest').click(function () {
                                                        var e73_val = e73Calculate();
                                                        // var e75_val = e75Calculate();
                                                        // var e74_val = e74Calculation();
                                                        var e75_val = 0.01;
                                                        var e74_val = 0.01;
                                                        if(e73_val==0 || e73_val==null)
                                                        {
                                                            $('#effective_interest').val(formatNumbers(e75_val.toString().replace(".",",")));
                                                        }
                                                        else{
                                                            $('#effective_interest').val(formatNumbers(e74_val.toString().replace(".",",")));
                                                        }
                                                        //e73 excel cell calculation
                                                        function e73Calculate() {
                                                            var borrowing_rate = $('#borrowing_rate').val().replace(".", "").replace(",", ".");
                                                            var monthly_deposit = $('#montly_deposit_val').val().replace(".", "").replace(",", ".");
                                                            var loan_amount = $('#loan_amount').val().replace(/\./g,"").replace(",",".");
                                                            var loan_period = $('#loan_period').val();
                                                            function e72Calculate(borrowing_rate,monthly_deposit,loan_amount){
                                                                var e72_val = nper(borrowing_rate/1200,monthly_deposit,-loan_amount);
                                                                return e72_val;
                                                            }
                                                            var e72_val = e72Calculate(borrowing_rate,monthly_deposit,loan_amount);
                                                            if(e72_val<loan_period*12)
                                                            { return 1;}
                                                            else
                                                            { return 0; }
                                                        }
                                                        //e75 excel cell calculation
                                                        function e75Calculate()
                                                        {
                                                            var borrowing_rate = $('#borrowing_rate').val().replace(".", "").replace(",", ".");
                                                            var monthly_deposit = parseFloat($('#montly_deposit_val').val().replace(".", "").replace(",", "."));
                                                            var loan_amount = $('#loan_amount').val().replace(/\./g,"").replace(",",".");
                                                            var loan_period = $('#loan_period').val();
                                                            var payment_amount = $('#payment_amount').val().replace(/\./g,"").replace(",",".");
                                                            var registery_fess = $('#registery_fees').val().replace(/\./g, "").replace(",",".");
                                                            // 1--E69 Calculation
                                                            function e69Calculate()
                                                            {
                                                                var fv_val = fv(borrowing_rate/1200,loan_period*12,monthly_deposit,-loan_amount);
                                                                return fv_val;
                                                            }
                                                            // 2--E70 Calculation
                                                            function e70Calculation()
                                                            {
                                                                var fv_val = e69Calculate();
                                                                var rate_val = (Math.pow(1+rate(loan_period*12,monthly_deposit,-payment_amount,parseFloat(fv_val)),12)-1)*100;
                                                                return rate_val;
                                                            }
                                                            // 3--E71 Calculation
                                                            function e71Calculation()
                                                            {
                                                                var e70_val = e70Calculation();
                                                                var e71_val = ((Math.pow((1+e70_val/100),1/12))-1)*1200;
                                                                return e71_val;
                                                            }
                                                            // 4--E68 Calculation
                                                            function e68Calculation()
                                                            {
                                                                var e71_val = e71Calculation();
                                                                var e68_val = nper(e71_val/1200,monthly_deposit,-loan_amount);
                                                                return e68_val;
                                                            }
                                                            var e68_val = e68Calculation();
                                                            var e75_val = (Math.pow((1+rate(e68_val,monthly_deposit,registery_fess-loan_amount)),12)-1)*100;
                                                            return e75_val.toFixed(2);
                                                        }
                                                        function e74Calculation()
                                                        {
                                                            var borrowing_rate = $('#borrowing_rate').val().replace(".", "").replace(",", ".");
                                                            var monthly_deposit = $('#montly_deposit_val').val().replace(".", "").replace(",", ".");
                                                            var loan_amount = $('#loan_amount').val().replace(/\./g,"").replace(",",".");
                                                            var loan_period = $('#loan_period').val();
                                                            var payment_amount = $('#payment_amount').val().replace(/\./g,"").replace(",",".");
                                                            var registery_fess = $('#registery_fees').val().replace(/\./g, "").replace(",",".");
                                                            function e72Calculation()
                                                            {
                                                                var e72_val = nper(borrowing_rate/1200,monthly_deposit,-loan_amount);
                                                                return e72_val;
                                                            }
                                                            var e72_val = e72Calculation();
                                                            var e74_val = Math.pow((1+rate(e72_val,monthly_deposit,-payment_amount+registery_fess)),12-1)*100;
                                                            return e74_val;
                                                        }
                                                    }); */
                                                    //Anschlusskredit Calculation
                                                    $('#connection_credit').click(function (){
                                                        var outstanding_balance = parseFloat($('#Outstanding_balance').val().replace(".", "").replace(",", "."));
                                                        if(isNaN(outstanding_balance) || outstanding_balance==0 || outstanding_balance==null)
                                                        {
                                                            // $('#message_Outstanding_balance').html('* Pflichtfeld');
                                                            $('#message_Outstanding_balance').html('');
                                                            $('#connection_credit').val($('#Outstanding_balance').val());
                                                        }
                                                        else
                                                        { $('#message_Outstanding_balance').html('');
                                                            $('#connection_credit').val($('#Outstanding_balance').val()); }
                                                    });
                                                    //Gesamtlaufzeit (Jahre/Monate) Calculation
                                                    $('#total_maturity').click(function(){
                                                        var outstanding_balance = parseFloat($('#Outstanding_balance').val().replace(".", "").replace(",", ".")).toFixed(2);
                                                        var loan_period = parseInt($('#loan_period').val());
                                                        var e66_val = calculateE66();
                                                        var e65_val = calculateE65();
                                                        var e64_val = calculateE64();
                                                        var e55_val = calculateE55();
                                                        var e56_val = calculateE56();
                                                        if(outstanding_balance==0)
                                                        {
                                                            var p4 = columnCellP4();
                                                            var q4 = columncellQ4();
                                                            var R4 = p4 +'/'+q4;
                                                            return R4;
                                                        }
                                                        else if(e66_val==1){
                                                            $('#total_maturity').val(e65_val+'/'+e64_val);
                                                        }
                                                        else if(outstanding_balance==0){
                                                            $('#total_maturity').val(loan_period);
                                                        }
                                                        else{
                                                            var a = loan_period + e56_val;
                                                            $('#total_maturity').val(a+'/'+e55_val);
                                                        }
                                                        registery_fee();
                                                    });
                                                    //nper for calculation of E66
                                                    function NPER1(rate, payment, present, future, type) {
                                                        // Initialize type
                                                        var type = (typeof type === 'undefined') ? 0 : type;
                                                        // Initialize future value
                                                        var future = (typeof future === 'undefined') ? 0 : future;
                                                        // Evaluate rate and periods (TODO: replace with secure expression evaluator)
                                                        rate = eval(rate);
                                                        // Return number of periods
                                                        var num = payment * (1 + rate * type) - future * rate;
                                                        var den = (present * rate + payment * (1 + rate * type));
                                                        return Math.log(num / den) / Math.log(1 + rate);
                                                    }
                                                    function calculateE56()
                                                    {
                                                        var e54_val = calculateE54();
                                                        var e51_val = calculateE51();
                                                        if(e54_val==12)
                                                        {
                                                            return e51_val + 1;
                                                        }
                                                        else{
                                                            return e51_val;
                                                        }
                                                    }
                                                    function calculateE55(){
                                                        var e54_val = calculateE54();
                                                        var e55_val;
                                                        if(e54_val==12)
                                                        {
                                                            e55_val =0;
                                                            return e55_val;
                                                        }
                                                        else{
                                                            return e54_val;
                                                        }
                                                    }
                                                    function calculateE54(){
                                                        var e53_val = calculateE53();
                                                        var e54_val = Math.ceil(e53_val);
                                                        return e54_val;
                                                    }
                                                    function calculateE53(){
                                                        var e52_val = calculateE52();
                                                        var e53_val = 12 * e52_val;
                                                        return e53_val;
                                                    }
                                                    function calculateE52(){
                                                        var e51_val = calculateE51();
                                                        var e50_val = calculateE50();
                                                        var e52_val = e50_val-e51_val;
                                                        var e52_val_rn = Math.round(e52_val*10000)/10000;
                                                        return e52_val_rn;
                                                    }
                                                    function calculateE50(){
                                                        var new_borrowing_rate = parseFloat($('#new_borrowing_rate').val().replace(/\./g,"").replace(",","."));
                                                        var new_rate = parseFloat($('#new_rate_inp').val().replace(/\./g,"").replace(",","."));
                                                        var connection_credit = parseFloat($('#connection_credit').val().replace(".", "").replace(",", "."));
                                                        var e50_val_n = NPER1(new_borrowing_rate/100/12,new_rate,-connection_credit,0,0);
                                                        var e50_val_rn = Math.round(e50_val_n/12*100000)/100000;
                                                        return e50_val_rn;
                                                    }
                                                    function calculateE51()
                                                    {
                                                        var e50_val = calculateE50();
                                                        var e51_val = Math.trunc(e50_val);
                                                        return e51_val;
                                                    }
                                                    function calculateE64()
                                                    {
                                                        var e63_val = calculateE63();
                                                        var e64_val;
                                                        if(e63_val==12)
                                                        {
                                                            e64_val=0;
                                                            return e64_val;
                                                        }
                                                        else{
                                                            return e63_val;
                                                        }
                                                    }
                                                    //E66 Caulculation
                                                    function calculateE66(){
                                                        //E58 Calculation
                                                        function calculateE58()
                                                        {
                                                            var borrowing_rate = parseFloat($('#borrowing_rate').val());
                                                            var monthly_deposit = parseFloat($('#montly_deposit_val').val().replace(".", "").replace(",", "."));
                                                            var loan_amount = parseInt($('#loan_amount').val().replace(/\./g,"").replace(",","."));
                                                            var E58_val;
                                                            E58_val = NPER1(borrowing_rate/100/12,monthly_deposit,-loan_amount,0,0);
                                                            return E58_val;
                                                        }
                                                        var E58_val = calculateE58();
                                                        var E66_val;
                                                        var loan_period = parseInt($('#loan_period').val());
                                                        if(E58_val < loan_period *12)
                                                        {
                                                            E66_val = 1;
                                                        }
                                                        else{
                                                            E66_val = 0;
                                                        }
                                                        return E66_val;
                                                    }
                                                    function calculateE65() {
                                                        var e63_val = calculateE63();
                                                        var e60_val = calculateE60();
                                                        if (e63_val == 12) {
                                                            return e60_val + 1;
                                                        } else {
                                                            return e60_val;
                                                        }
                                                    }
                                                    function calculateE60(){
                                                        var e59_val = calculateE59();
                                                        var e60_val = Math.trunc(e59_val);
                                                        return e60_val;
                                                    }
                                                    function calculateE62(){
                                                        var e61_val = calculateE61();
                                                        var e62_val = 12*e61_val;
                                                        return e62_val;
                                                    }
                                                    function calculateE61(){
                                                        var e59_val = calculateE59();
                                                        var e60_val = calculateE60();
                                                        var e61_val = e59_val - e60_val;
                                                        var e61_val_rn = Math.round(e61_val*100000)/100000;
                                                        return e61_val_rn;
                                                    }
                                                    function calculateE59(){
                                                        var e58_val = calculateE58();
                                                        var e59_val = e58_val/12;
                                                        return e59_val;
                                                    }
                                                    function calculateE58(){
                                                        var borrowing_rate = parseFloat($('#borrowing_rate').val().replace(".", "").replace(",", "."));
                                                        var monthly_deposit = parseInt($('#montly_deposit_val').val().replace(".", "").replace(",", "."));
                                                        var loan_amount = parseInt($('#loan_amount').val().replace(/\./g,"").replace(",","."));
                                                        var e58_val = NPER1(borrowing_rate/100/12,monthly_deposit,-loan_amount,0,0);
                                                        return e58_val;
                                                    }
                                                    function calculateE63(){
                                                        var e62_val = calculateE62();
                                                        var e63_val = Math.ceil(e62_val);
                                                        return e63_val;
                                                    }
                                                    //Function that COUNTIF and calculate column D (records) the column O
                                                    function countRecordsO4(){
                                                        var loan_period = parseInt($('#loan_period').val());
                                                        var total_years_count = loan_period*12;
                                                        return total_years_count;
                                                    }
                                                    function columnCellP4(){
                                                        var total_years_count = countRecordsO4();
                                                        var trunc_value = total_years_count/12;
                                                        var p4 = Math.trunc(trunc_value);
                                                        return p4;
                                                    }
                                                    function columncellQ4(){
                                                        var total_years_count = countRecordsO4();
                                                        var q4 = total_years_count % 12;
                                                        return q4;
                                                    }

                                                    //Restschuld (Euro) Calculation
                                                    $('#Outstanding_balance').click(function (){
                                                        get_ourstanding_balance();

                                                    });
                                                    function get_ourstanding_balance(monthly_Deposit = parseFloat($('#montly_deposit_val').val().replace(".", "").replace(",", "."))) {
                                                        G=[];
                                                        H=[];
                                                        I=[];
                                                            B2();
                                                            columnC();
                                                            columnM(monthly_Deposit);
                                                            return residualDebt();
                                                    }


                                                    //source (modified from original): http://stackoverflow.com/questions/18936915/dynamically-set-property-of-nested-object
                                                    //answerer: bpmason1; questioner: John B.
                                                    //answerer url: http://stackoverflow.com/users/2736119/bpmason1
                                                    //license: http://creativecommons.org/licenses/by-sa/3.0/legalcode
                                                    function setObjVal(Obj, propStr, Value) {
                                                        var Schema = Obj;  // a moving reference to internal objects within obj
                                                        var pList = propStr.split('.');
                                                        var Len = pList.length;

                                                        for(var i = 0; i < Len-1; i++) {
                                                            var Elem = pList[i];
                                                            if( !Schema[Elem] ) Schema[Elem] = {}
                                                            Schema = Schema[Elem];
                                                        };

                                                        Schema[pList[Len-1]] = Value;
                                                    };

                                                    //source (modified from original): http://stackoverflow.com/questions/4343028/in-javascript-test-for-property-deeply-nested-in-object-graph
                                                    //answerer: Zach; questioner: thisismyname
                                                    //answerer url: http://stackoverflow.com/users/230892/zach
                                                    //license: http://creativecommons.org/licenses/by-sa/3.0/legalcode
                                                    function getObjVal(Obj, propStr) {
                                                        var Parts = propStr.split(".");
                                                        var Cur = Obj;

                                                        for (var i=0; i<Parts.length; i++) {
                                                            Cur = Cur[Parts[i]];
                                                        };

                                                        return Cur;
                                                    };


                                                    // console.log(get_ourstanding_balance(1000));
                                                    function test(a) {
                                                        return a * a;
                                                    }
                                                   // setInterval(console.log(get_ourstanding_balance(1500)),500) ;
                                                    //Arrays Declaration

                                                    function residualDebt(){
                                                        var loan_period = $('#loan_period').val();
                                                        var lookup_value = loan_period*12;
                                                        var ret_value;
                                                        for(var a=4; a<=parseInt($('#loan_period').val() * 12 + 4); a++ )
                                                        {
                                                            if(A[a]==lookup_value || B[a]==lookup_value || C[a]==lookup_value || D[a]==lookup_value ||
                                                                E[a]==lookup_value  || F[a]==lookup_value || G[a]==lookup_value || H[a]==lookup_value
                                                                || I[a]==lookup_value || J[a]==lookup_value || K[a]==lookup_value
                                                                || L[a]==lookup_value || M[a]==lookup_value)
                                                            {
                                                                if(M[a]>=0){
                                                                    ret_value = M[a].toFixed(2);
                                                                    if ($("#bausparer")[0].checked) {
                                                                        monthly_total_price_remaining_debt();
                                                                    } else {
                                                                        // jiangc modify
                                                                        $('#Outstanding_balance').val(formatNumbers(ret_value.toString().replace(".",",")));
                                                                    }
                                                                    $('#connection_credit').val(formatNumbers(ret_value.toString().replace(".",",")));
                                                                }
                                                                else{
                                                                    // jiangc modify
                                                                    $('#Outstanding_balance').val("0,00");
                                                                    $('#connection_credit').val("0,00");
                                                                }

                                                                break;
                                                            }
                                                            else{
                                                                // jiangc modify
                                                                $('#Outstanding_balance').val('0,00');
                                                                $('#connection_credit').val('0,00');
                                                            }
                                                        }
                                                        return M[a].toFixed(2);
                                                    }
                                                    function M4() {
                                                        var loan_amount = parseFloat($('#loan_amount').val().replace(/\./g,"").replace(",","."));
                                                        M[4] = loan_amount;
                                                    }
                                                    function J5(monthly_deposit){
                                                       // var monthly_deposit = parseFloat($('#montly_deposit_val').val().replace(".", "").replace(",", "."));
                                                        var borrowing_rate = parseFloat($('#borrowing_rate').val().replace(".", "").replace(",", "."));
                                                        if(monthly_deposit>M[4]*(1+borrowing_rate/100/12))
                                                        {
                                                            J[5] = (M[4]*(1+borrowing_rate/12/100).toFixed(2));
                                                        }
                                                        else
                                                        {
                                                            columnD(5, monthly_deposit);
                                                            columnI(5);
                                                            J[5] = D[5]+I[5];
                                                        }
                                                    }
                                                    function K5()
                                                    {
                                                        var borrowing_rate = $('#borrowing_rate').val().replace(".", "").replace(",", ".");
                                                        if(B[5]="")
                                                        {
                                                            K[5]="";
                                                        }
                                                        else{
                                                            K[5] =(M[4]*(borrowing_rate/1200));
                                                        }
                                                    }
                                                    //Calculating column k
                                                    function columnk(k){
                                                        K[0] = null;
                                                        K[1] =null;
                                                        K[2] = null;
                                                        K[3] = null;
                                                        K[4] = null;
                                                        var borrowing_rate = parseFloat($('#borrowing_rate').val().replace(".", "").replace(",", "."));

                                                        if(B[k]="")
                                                        {
                                                            K[k] ="";
                                                        }
                                                        else{
                                                            K[k] = (M[k-1]*borrowing_rate/12/100);
                                                        }
                                                    }
                                                    //Function for calculating column L including L5
                                                    function columnL(l, monthly_Deposit){
                                                     /*   if(B[l]="")
                                                        {
                                                            L[l] ="";
                                                        }*/
                                                        // else
                                                            {
                                                            if(l==5){
                                                                J5(monthly_Deposit);
                                                                K5();
                                                                L[l] = J[l]-K[l];
                                                            }
                                                            else{
                                                                columnJ(l, monthly_Deposit);
                                                                columnk(l);
                                                                L[l] = J[l]-K[l];
                                                            }
                                                        }
                                                    }
                                                    //Calculating column M
                                                    function columnM(monthly_Deposit) {
                                                        M4();
                                                        var flag = 1;
                                                        for (var m = 5; m <= parseInt($('#loan_period').val()) * 12 + 4 ; m++) {
                                                            {
                                                                // if(flag==1){
                                                                  /*  if (B[m] = "") {
                                                                        M[m] = "";
                                                                    } else*/ {
                                                                        columnL(m, monthly_Deposit);
                                                                        if(M[m-1] - L[m] < 0){
                                                                            M[m] = 0;
                                                                            // flag = -1;
                                                                            // continue;
                                                                        }
                                                                        else{
                                                                            M[m] = M[m-1] - L[m];
                                                                        }
                                                                    }
//                                                                 }
//                                                                 else{
//                                                                     M[m]=-50;
//                                                                 }
// /*
                                                                //columnL(m, monthly_Deposit);
                                                                //M[m] = M[m-1] - L[m];
                                                                columnI(m);
                                                                columnD(m, monthly_Deposit);
                                                            }
                                                        }
                                                 /*       console.log("D",D);
                                                        console.log("J",J);
                                                        console.log("K",K);
                                                        console.log("L",L);
                                                        console.log("M",M);*/
                                                    }
                                                    // Column A calculaton table 3
                                                    function columnAB(){
                                                        var i=0;
                                                        A[0] = null;
                                                        A[1] = null;
                                                        A[2] = null;
                                                        A[3] = null;
                                                        for (var i = 4; i <= 364; i++) {
                                                            A[i] =i-4;
                                                            B[i] = A[i];
                                                        }
                                                    }
                                                    // Column B calculaton table 3
                                                    function columnB(){

                                                      /*  var loan_period = parseInt($('#loan_period').val());
                                                        for(var b = 4; b <=parseInt($('#loan_period').val()) * 12 + 4; b++ )
                                                        {
                                                            if(A[b] > (loan_period*12)){
                                                                B[b] = "";
                                                            }
                                                            else{
                                                                B[b] = A[b];
                                                            }
                                                        }
                                                        for(var b1 = 4; b1 <= parseInt($('#loan_period').val())* 12 + 4; b1++)
                                                        {
                                                            for(var b2 = 4; b2 <= parseInt($('#loan_period').val()) * 12 + 4; b2++)
                                                                B[2] = Math.max(B[b1],B[b2])+4;
                                                        }*/

                                                    }
                                                    function B2(){
                                                        B[2] = parseInt($('#loan_period').val())* 12 + 4;
                                                    }
                                                    //Column 'C' calculation for table 3
                                                    function columnC() {
                                                        var payment_year = parseInt($('#payment_year').val());
                                                        var payment_month = parseInt($('#payment_month').val());
                                                        var loan_period = parseInt($('#loan_period').val());
                                                        var total_year = payment_year + loan_period;
                                                        C[0] = null;
                                                        C[1] = null;
                                                        C[2] = null;
                                                        C[3] = null;
                                                        var c = 4;
                                                        var itr;
                                                        var d;
                                                        for (itr = payment_year; itr <= total_year; itr++) {
                                                            for (var m = 1; m <= 12; m++) {
                                                                if ((payment_month+ m)>13){
                                                                    d = new Date(itr+1, payment_month+ m -12, 0);
                                                                }
                                                                else{
                                                                    d = new Date(itr, payment_month+ m, 0);
                                                                }
                                                                C[c] = d.getMonth()+"/"+d.getFullYear();
                                                                if(d.getMonth()==0){
                                                                    C[c] = "12"+"/"+(d.getFullYear()-1);
                                                                }
                                                                c++;
                                                            }
                                                        }
                                                    }
                                                    // calculating column D
                                                    function columnD(d, monthly_Deposit)
                                                    {
                                                        // var monthly_Deposit =parseInt($('#montly_deposit_val').val().replace(".", "").replace(",", "."));
                                                        var borrowing_rate = parseFloat($('#borrowing_rate').val().replace(".", "").replace(",", "."));
                                                        D[0] = null;
                                                        D[1] =null;
                                                        D[2] = null;
                                                        D[3] = null;
                                                /*        if(B[d]="")
                                                        {
                                                            D[d]="";

                                                        }
                                                        else*/
                                                            {
                                                            if(monthly_Deposit > M[d - 1]*(1+borrowing_rate/100/12))
                                                            {

                                                                D[d] = M[d - 1]*(1+borrowing_rate/12/100);
                                                            }
                                                            else
                                                                {
                                                                D[d] = monthly_Deposit;
                                                            }
                                                        }}
                                                    //Calculating column E
                                                    function columnE(e) {
                                                        // E[0] = null;
                                                        // E[1] =null;
                                                        // E[2] = null;
                                                        // E[3] = null;
                                                        // for(var e=5; e <= parseInt($('#loan_period').val()) * 12 + 4; e++)
                                                        // {
                                                            if(C[e]!=undefined){
                                                                if(parseInt(C[e].split("/")[0]) == parseInt($('#annual_unsheduled_month').val()) &&
                                                                    parseInt(C[e].split("/")[1]) >=$('#annual_unsheduled_year').val() &&
                                                                    parseInt(C[e].split("/")[1]) <=$('#annual_to_year').val())
                                                                {
                                                                    E[e] = parseFloat($('#annual_unsheduled_val').val());
                                                                }
                                                                else if(parseInt(C[e].split("/")[0]) == parseInt($('#annual_unsheduled_month').val()) &&
                                                                    parseInt(C[e].split("/")[1]) == $('#annual_unsheduled_year').val() &&
                                                                    $('#annual_to_year').val() ==null)
                                                                {
                                                                    E[e] = parseFloat($('#annual_unsheduled_val').val());
                                                                }
                                                                else{
                                                                    // E[e]="#N/A";
                                                                    E[e]=0;
                                                                }
                                                            }
                                                            else{
                                                                // E[e]="#N/A";
                                                                E[e]=0;
                                                            }
                                                            //     console.log('tu8');
                                                            //     for(var i=45; i<=364; i++)
                                                            //     {
                                                            //         console.log('tu2');
                                                            //         for(var j=5; j<=91; j++) {
                                                            //             console.log('tu1');
                                                            //             if (A[i] == C[e] || B[j] == C[e]) {
                                                            //                     E[e] = B[e];
                                                            //             }
                                                            //             else{
                                                            //                 E[e]="";
                                                            //             }
                                                            //         }
                                                            //     }
                                                        // }

                                                    }
                                                    //Calculating Column F
                                                    function columnF(f){
                                                        // F[0] = null;
                                                        // F[1] = null;
                                                        // F[2] = null;
                                                        // F[3] = null;
                                                        columnE(f);
                                                    /*    if(B[f]=="")
                                                        {
                                                            F[f]="";
                                                        }
                                                        else*/
                                                            {
                                                            if(E[f]=="N/A")
                                                            {
                                                                F[f]=0;
                                                            }
                                                            else{
                                                                F[f]=E[f];
                                                                // console.log('False');
                                                            }
                                                        }

                                                    }
                                                    //Calculating Column G
                                                    function columnG(g){
                                                        // G[0] = null;
                                                        // G[1] = null;
                                                        // G[2] = null;
                                                        // G[3] = null;
                                                        // for(var g=4;  g<=parseInt($('#loan_period').val()) * 12 + 4; g++ )
                                                        // {
                                                            if(($('#onetime_unsheduled_month').val()+"/"+$('#onetime_unsheduled_year').val())==C[g]){
                                                                G[g]=parseFloat($('#onetime_unsheduled_val').val());
                                                                // break;
                                                            }
                                                            else{
                                                                G[g]="N/A";

                                                            }
                                                        // }

                                                    }
                                                    // Calculating Column H
                                                    function columnH(h){

                                                        columnG(h);

                                                        // console.log("L",L);
                                                        // console.log("M",M);
                                                      /*  if(B[h]="")
                                                        {
                                                            H[h]="";
                                                        }
                                                        else */
                                                            if(G[h]=="N/A" || G[h] ==null){
                                                            H[h]=0;
                                                        }
                                                        else{
                                                            H[h]=G[h];
                                                        }
                                                    }
                                                    //Calculating Column I
                                                    function columnI(i){
                                                        I[0] = null;
                                                        I[1] = null;
                                                        I[2] = null;
                                                        I[3] = null;
                                                        I[4] = null;
                                                        columnF(i);
                                                                    columnH(i);
                                                                    I[i] = F[i]+H[i];
                                                        // if(i==5){
                                                        //     if (B[5] = "") {
                                                        //         I[5] = 0;
                                                        //     } else {
                                                        //         columnF(5);
                                                        //         columnH(5);
                                                        //         I[5] = F[5] + H[5];
                                                        //     }
                                                        // }
                                                        // else{
                                                        //     if(B[i]="")
                                                        //     {
                                                        //         I[i]=0;
                                                        //     }
                                                        //     else{
                                                        //         columnF(i);
                                                        //         columnH(i);
                                                        //         var i1=i;
                                                        //         if(F[i]+H[i] > M[--i1]){
                                                        //             I[i]=0;
                                                        //         }
                                                        //         else{
                                                        //             columnF(i);
                                                        //             columnH(i);
                                                        //             I[i] = F[i]+H[i];
                                                        //         }
                                                        //     }
                                                        // }
                                                    }
                                                    //Calculating Column J
                                                    function columnJ(j, monthly_depoit)
                                                    {
                                                        // var monthly_depoit = parseFloat($('#montly_deposit_val').val().replace(".", "").replace(",", "."));
                                                        var borrowing_rate = parseFloat($('#borrowing_rate').val().replace(".", "").replace(",", "."));
                                                   /*     if(B[j]="")
                                                        {
                                                            J[j]=0;
                                                        }
                                                        else */
                                                            {

                                                          /*  if(monthly_depoit > M[j - 1] * (1 + borrowing_rate / 100 / 12))
                                                            {

                                                                J[j] = M[j - 1] * (1 + borrowing_rate / 100 / 12);
                                                            }
                                                            else*/
                                                                {
                                                                columnD(j, monthly_depoit);
                                                                columnI(j);

                                                                J[j] = D[j]+I[j];

                                                            }
                                                        }
                                                    }



                                                });
                                                function save_calculation() {
                                                    //if ( confirm('Are you sure you want to submit?') ) {
                                                    var tenFieldFlag = $('#new_form_controller').val();
                                                    var serializeForm = $('#kunden_edit_form').serializeArray();
                                                     setTimeout(function(){
                                                        $("#kunden_edit_form").submit();
                                                        save_timeline();
                                                    }, 600);
                                                    setTimeout(function(){
                                                        repayment_save();
                                                    }, 300);
                                                    $.ajax({
                                                        url: 'save_calculation',
                                                        type: 'post',
                                                        data: {
                                                            _token: $('[name="_token"]').val(),
                                                            // New 11 fields
                                                            loan_period: $('#loan_period').val(),
                                                            payment_month: $('#payment_month').val(),
                                                            payment_year: $('#payment_year').val(),
                                                            registery_fees: $('#registery_fees').val(),
                                                            payment_discount: $('#payment_discount').val(),
                                                            payment_amount: $('#payment_amount').val(),
                                                            borrowing_rate: $('#borrowing_rate').val(),
                                                            repayment_date_inp: $('#repayment_date_inp').val(),
                                                            montly_deposit_val: $('#montly_deposit_val').val(),
                                                            message_payment_opt: $('#message_payment_opt').val(),
                                                            annual_unsheduled_month: $('#annual_unsheduled_month').val(),
                                                            annual_unsheduled_year: $('#annual_unsheduled_year').val(),
                                                            annual_unsheduled_val: $('#annual_unsheduled_val').val(),
                                                            annual_to_month: $('#annual_to_month').val(),
                                                            annual_to_year: $('#annual_to_year').val(),
                                                            onetime_unsheduled_month: $('#onetime_unsheduled_month').val(),
                                                            onetime_unsheduled_year: $('#onetime_unsheduled_year').val(),
                                                            onetime_unsheduled_val: $('#onetime_unsheduled_val').val(),
                                                            outstanding_balance: $('#Outstanding_balance').val(),
                                                            effective_interest: $('#effective_interest').val(),
                                                            connection_credit: $('#connection_credit').val(),
                                                            new_borrowing_rate: $('#new_borrowing_rate').val(),
                                                            new_repayment_rate_inp: $('#new_repayment_rate_inp').val(),
                                                            new_rate_inp: $('#new_rate_inp').val(),
                                                            total_maturity: $('#total_maturity').val(),
                                                            sparsumme: $('#sparsumme').val(),
                                                            monthly_interest: $('#monthly_interest').val(),
                                                            monthly_saving: $('#monthly_saving').val(),
                                                            monthly_payment: $('#monthly_payment').val(),
                                                            laufzeit: $('#laufzeit').val(),
                                                            bausparer_flag: document.getElementById('bausparer').checked,
                                                            acquisition_fee: $('#statements_due').val(),
                                                            bausparer_pay_type: document.getElementById('onetime_pay').checked == true ? 'one' : 'month',
                                                        },
                                                        success: function(res) {
                                                            toastr.success('saving success!');
                                                            console.log(res);
                                                        },
                                                        error: function(error) {
                                                            var error = JSON.parse(error.responseText);
                                                            error = error.errors;
                                                            $.each(error, function(k, v){
                                                                toastr.error(k+': '+v[0]);
                                                            })
                                                        }
                                                    });

                                                    function repayment_save()
                                                    {
                                                        var resarr = [];
                                                        for (var m = 4; m <= parseInt($('#loan_period').val()) * 12 + 4 ; m++) {
                                                            {
                                                                if(m==4){
                                                                    D[m] = "__";
                                                                    I[m] = "__";
                                                                    K[m] = "__";
                                                                    L[m] = "__";
                                                                }
                                                                else{
                                                                    D[m]=D[m].toFixed(2);
                                                                    I[m]=I[m].toFixed(2);
                                                                    K[m]=K[m].toFixed(2);
                                                                    L[m]=L[m].toFixed(2);
                                                                    M[m]=M[m].toFixed(2);
                                                                }
                                                                var temp = {
                                                                    'repayment_date': C[m],
                                                                    'rate': D[m],
                                                                    'sonder_tilgung': I[m],
                                                                    'zinsen': K[m],
                                                                    'tilgung': L[m],
                                                                    'darlehensrest': M[m]
                                                                };
                                                                resarr.push(temp);
                                                            }
                                                        }

                                                        $.ajax({
                                                            url: 'save_repayment',
                                                            type: 'post',
                                                            data: {
                                                                _token: $('[name="_token"]').val(),
                                                                data: resarr
                                                            }
                                                        });
                                                    }

                                                }
                                            </script>

                                            <table class="table table-striped table-bordered">

                                                <tr>
                                                    <td colspan="4"> <h5>Darlehensrechner</h5></td>

                                                </tr>

                                                <tr>
                                                    <td>Kreditsumme ( € ) <span class="text-danger" id="message_loan_amount"></span></td>
                                                    <td colspan="4"><input class="form-control text-right" value="{{ stringReplace($kunden->loan_amount,'.',',') }}" id="loan_amount" type=""></td>
                                                </tr>
                                                <tr>
                                                    <td >Zinsbindung <span class="text-danger" id="message_loan_period"></span></td>
                                                    <td colspan="4">
                                                        <select id="loan_period" class="form-control">
                                                            <?php
                                                            for($i= 1;$i<=30;$i++)
                                                            {
                                                            ?>
                                                            <option value="{{$i}}">
                                                                {{$i}}
                                                                @if($i==1)
                                                                    Jahr
                                                                @else
                                                                    Jahre
                                                                @endif
                                                            </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Auszahlungstermin</td>
                                                    <td colspan="2">
                                                        <select id="payment_month" class="form-control">
                                                            <option selected value='1'>Januar</option>
                                                            <option value='2'>Februar</option>
                                                            <option value='3'>Marz</option>
                                                            <option value='4'>April</option>
                                                            <option value='5'>Mai</option>
                                                            <option value='6'>Juni</option>
                                                            <option value='7'>Juli</option>
                                                            <option value='8'>August</option>
                                                            <option value='9'>September</option>
                                                            <option value='10'>Oktober</option>
                                                            <option value='11'>November</option>
                                                            <option value='12'>Dezember</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="4">

                                                        <select id="payment_year"  class="form-control">

                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>

                                                        </select>
                                                    </td>
                                                </tr>

                                                {{--<tr>--}}
                                                    {{--<td>Ende der Zinsbindung</td>--}}
                                                    {{--<td colspan="4"><input id="end_of_fixed_year" class="form-control text-right"  disabled></td>--}}
                                                {{--</tr>--}}

                                                <tr hidden>
                                                    <td>Grundbuchkosten ( € )</td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="registery_fees" class="form-control text-right" disabled>

                                                            <div class="input-group-append">
                                                                <span class="input-group-text">€</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr hidden>
                                                    <td>Disagio (Prozent)</td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="payment_discount" value=0.00 class="form-control text-right" disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Auszahlungsbetrag ( € )</td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="payment_amount" class="form-control text-right" value="{{ stringReplace($kunden->loan_amount, '.', ',') }}" disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">€</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Sollzinssatz (Prozent) <span class="text-danger" id="message_borrowing_rate"></span></td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="borrowing_rate" class="form-control text-right" value="1,50">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="repayment_date" name="repayment">
                                                            <label class="custom-control-label" for="repayment_date">Tilgungssatz (Prozent)</label>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="repayment_date_inp" class="form-control text-right" disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            {{--                                                            radio button input Monatsrate--}}
                                                            <input type="radio" class="custom-control-input" id="montly_deposit" name="repayment" checked>
                                                            <label class="custom-control-label" for="montly_deposit">Monatsrate ( € ) <span class="text-danger" id="message_montly_deposit"></span></label>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            {{--                                                        input field Monatsrate--}}
                                                            <input id="montly_deposit_val" class="form-control text-right" value="1.500,00">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">€</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="payment_opt_rad" name="repayment">
                                                            <label class="custom-control-label" for="payment_opt_rad">Volltilgerdarlehen</label>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            {{-- Alert message for Volltilgerdarlehen --}}
                                                            <input id="message_payment_opt" class="form-control text-right text-danger">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="bausparer" name="repayment">
                                                            <label class="custom-control-label" for="bausparer">Bausparer</label>
                                                        </div>
                                                    </td>
                                                    <td colspan="2">
                                                        <span>Bausparsumme</span>
                                                        <div class="input-group" style="padding-bottom: 15px; padding-top:5px !important;">
                                                            <input id="sparsumme" placeholder="Sparsumme" class="form-control text-right" disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">€</span>
                                                            </div>
                                                        </div>
                                                        <span>Zinsen (monatlich)</span>
                                                        <div class="input-group" style="padding-bottom: 15px; padding-top:5px !important;">
                                                            <input id="monthly_interest" placeholder="Interest" class="form-control text-right" disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">€</span>
                                                            </div>
                                                        </div>
                                                        <span>Sparbeitrag (monatlich)</span>
                                                        <div class="input-group" style="padding-bottom: 15px; padding-top:5px !important;">
                                                            <input id="monthly_saving" placeholder="Saving" class="form-control text-right" disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">€</span>
                                                            </div>
                                                        </div>
                                                        <span>Monatliche Rate</span>
                                                        <div class="input-group" style="padding-bottom: 15px; padding-top:5px !important;">
                                                            <input id="monthly_payment" placeholder="Monthly payment" class="form-control text-right" disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">€</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        Laufzeit
                                                        <div class="input-group" style="padding-bottom: 15px; padding-top:5px !important;">
                                                           <select id="laufzeit" class="form-control" placeholder="Laufzeit" disabled>
                                                                <?php
                                                                for($i = 1; $i <= 30; $i++)
                                                                {
                                                                ?>
                                                                <option value="{{$i}}">
                                                                    {{$i}}
                                                                    @if($i==1)
                                                                        Jahr
                                                                    @else
                                                                        Jahre
                                                                    @endif
                                                                </option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <span>Abschlussgebühr</span>
                                                        <div class="input-group" style="padding-bottom: 15px; padding-top:5px !important;">
                                                            <input id="statements_due" placeholder="Statements Due" class="form-control text-right" disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                        <div class="custom-control custom-radio" style="padding-bottom: 15px; padding-top:32px !important;">
                                                            <input type="radio" class="custom-control-input" id="onetime_pay" name="payment_type" checked disabled>
                                                            <label class="custom-control-label" for="onetime_pay">Einmal Zahlung</label>
                                                        </div>
                                                        <div class="custom-control custom-radio" style="padding-bottom: 15px; padding-top:43px !important;">
                                                            <input type="radio" class="custom-control-input" id="monthly_rate_pay" name="payment_type" disabled>
                                                            <label class="custom-control-label" for="monthly_rate_pay">Monatliche Zahlung</label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Jährliche Sondertilgungen ab</td>
                                                    <td>
                                                        <select id="annual_unsheduled_month" class="form-control">
                                                            <option selected value='1'>Januar</option>
                                                            <option value='2'>Februar</option>
                                                            <option value='3'>Marz</option>
                                                            <option value='4'>April</option>
                                                            <option value='5'>Mai</option>
                                                            <option value='6'>Juni</option>
                                                            <option value='7'>Juli</option>
                                                            <option value='8'>August</option>
                                                            <option value='9'>September</option>
                                                            <option value='10'>Oktober</option>
                                                            <option value='11'>November</option>
                                                            <option value='12'>Dezember</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select id="annual_unsheduled_year"  class="form-control">

                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                        </select>
                                                    </td>

                                                    <td colspan="4"><input id="annual_unsheduled_val" value=2400 class="form-control text-right"></td>
                                                </tr>

                                                <tr>
                                                    <td>bis</td>
                                                    <td>
                                                        <select id="annual_to_month" class="form-control">
                                                            <option value='1'>Januar</option>
                                                            <option value='2'>Februar</option>
                                                            <option value='3'>Marz</option>
                                                            <option value='4'>April</option>
                                                            <option value='5'>Mai</option>
                                                            <option value='6'>Juni</option>
                                                            <option value='7'>Juli</option>
                                                            <option value='8'>August</option>
                                                            <option value='9'>September</option>
                                                            <option value='10'>Oktober</option>
                                                            <option value='11'>November</option>
                                                            <option value='12'>Dezember</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="4">
                                                        <select id="annual_to_year"  class="form-control">
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2025">2026</option>
                                                            <option value="2025">2027</option>
                                                            <option value="2025">2028</option>
                                                            <option value="2025">2029</option>
                                                            <option value="2025">2030</option>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Einmalige Sondertilgung</td>
                                                    <td>
                                                        <select id="onetime_unsheduled_month" class="form-control">
                                                            <option selected value='1'>Januar</option>
                                                            <option value='2'>Februar</option>
                                                            <option value='3'>Marz</option>
                                                            <option value='4'>April</option>
                                                            <option value='5'>Mai</option>
                                                            <option value='6'>Juni</option>
                                                            <option value='7'>Juli</option>
                                                            <option value='8'>August</option>
                                                            <option value='9'>September</option>
                                                            <option value='10'>Oktober</option>
                                                            <option value='11'>November</option>
                                                            <option value='12'>Dezember</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select id="onetime_unsheduled_year"  class="form-control">

                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2030">2030</option>
                                                            <option value="2031">2031</option>
                                                            <option value="2032">2032</option>
                                                            <option value="2033">2033</option>
                                                            <option value="2032">2034</option>
                                                            <option value="2033">2035</option>
                                                        </select>
                                                    </td>

                                                    <td colspan="4"><input id="onetime_unsheduled_val" value="0" class="form-control text-right" value="50000"></td>

                                                </tr>

                                                <tr>
                                                    <td>Restschuld ( € ) <span class="text-danger" id="message_Outstanding_balance"></span></td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="Outstanding_balance" value="0,00" class="form-control text-right" disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">€</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                   
                                                    <td>Effektivzins (Prozent) </td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="effective_interest" class="form-control text-right" class="text-danger" value="  {{$CalData->effective_interest}} " >
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Anschlusskredit</td>
                                                    <td colspan="4"><input id="connection_credit" class="form-control text-right" disabled></td>
                                                </tr>

                                                <tr>
                                                    <td>Neuer Sollzinssatz (Prozent) <span id="message_new_borrowing_rate" class="text-danger"></span></td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="new_borrowing_rate" class="form-control text-right" value="4,00">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="new_repayment_rate" name="rates" checked>
                                                            <label class="custom-control-label" for="new_repayment_rate">Neuer Tilgungssatz (Proz.) <span id="message_new_repayment_rate" class="text-danger"></span></label>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="new_repayment_rate_inp" class="form-control text-right" value="1,00" data-toggle="tooltip" data-placement="right" title="Redemption rate as a percentage of the initial loan smount">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="new_rate" name="rates">
                                                            <label class="custom-control-label" for="new_rate">Neuer Rate (Euro)</label>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="new_rate_inp" class="form-control text-right" disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">€</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Gesamtlaufzeit (Jahre/Monate)</td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="total_maturity" class="form-control text-right" disabled>&nbsp;
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">J/M</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Running time</td>
                                                    <td colspan="4">
                                                        <div class="input-group">
                                                            <input id="running_time" class="form-control text-right" >
                                                        </div>
                                                    </td>

                                                </tr>
                                            </table>

                                            

                                        <div class="thisCtTimeline-{{$cIndex}}">
                                            @if(isset($cal->customerTimeline->id))
                                                <input type="hidden" name="Cal[{{$cIndex}}][customerTimeline][id]" value="{{$cal->customerTimeline->id}}">
                                                <div class="row ct_fields-{{$cIndex}} mt-35">
                                                    <div class="col-sm-12">
                                                        <h5>Zeitstrahl Phase 1 (Angepasster)</h5>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label>Darlehen</label>
                                                        <input type="text" name="Cal[{{$cIndex}}][customerTimeline][darlehen]" class="form-control" placeholder="" value="{{$cal->customerTimeline->darlehen}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label>Zinsstaz</label>
                                                        <input type="text" name="Cal[{{$cIndex}}][customerTimeline][zinsstaz]" class="form-control" placeholder="" value="{{$cal->customerTimeline->zinsstaz}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label>Tilgung</label>
                                                        <input type="text" name="Cal[{{$cIndex}}][customerTimeline][tilgung]" class="form-control" placeholder="" value="{{$cal->customerTimeline->tilgung}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label>Laufzeit</label>
                                                        <input type="text" name="Cal[{{$cIndex}}][customerTimeline][laufzeit]" class="form-control" placeholder="" value="{{$cal->customerTimeline->laufzeit}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label>Rate monatl</label>
                                                        <input type="text" name="Cal[{{$cIndex}}][customerTimeline][rate_monatl]" class="form-control" placeholder="" value="{{$cal->customerTimeline->rate_monatl}}" required>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label>Restschuld</label>
                                                        <input type="text" name="Cal[{{$cIndex}}][customerTimeline][restschuld]" class="form-control" placeholder="" value="{{$cal->customerTimeline->restschuld}}" required>
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>Angebotsdatum</h5>
                                    <input type="date" name="angebotdate" id="angebotdate" value="" placeholder="Angebotsdatum" class="form-control">

                                </div>
                                <div class="col-sm-6">
                                    <button type="button" value="calculation" name="calculation" class="btn btn-primary float-right" onclick="save_calculation()">Berechnung speichern</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-6">
                            <h4>Checkliste</h4>
                            <p>Folgende Unterlagen müssen eingereicht werden:</p>
                            <div class="row">
                                @php($i=0)
                                @foreach($checklistCategory as $category)
                                    @if(count($category->checklists)>0)
                                        <h5 class="w-100" style="padding: 10px 30px;">{{$category->name}}</h5>
                                        @foreach($category->checklists as $checklist)
                                            <div class="col-sm-12" style="padding: 10px 30px;">
                                                <input type="checkbox" class="cbx" id="cbx{{$i}}" style="display: none;" {{ $kunden->checklists->contains($checklist)?"checked":''}}>
                                                <label for="cbx{{$i}}" class="check" onclick="checkedFunction(this, 'kunden')" data-id="{{$checklist->id}}">
                                                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                                                        <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                                        <polyline points="1 9 7 14 15 4"></polyline>
                                                    </svg>
                                                </label>
                                                <label for="cbx{{$i}}" onclick="checkedFunction(this, 'kunden')" data-id="{{$checklist->id}}">{{$checklist->body}}</label>
                                            </div>
                                            @php($i++)
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @php($checklistEnable = $kunden->ehepartner_enabled? 'block':'none')
                        <div class="col-6" id="ehepartnerChecklist" style="display: {{$checklistEnable}}">
                            <h4>Checkliste (2. Darlehensnehmer)</h4>
                            <p>Folgende Unterlagen müssen eingereicht werden:</p>
                            <div class="row">

                                @foreach($checklistCategory as $category)
                                    @if(count($category->checklists)>0)
                                        <h5 class="w-100" style="padding: 10px 30px;">{{$category->name}}</h5>
                                        @foreach($category->checklists as $checklist)
                                            <div class="col-sm-12" style="padding: 10px 30px;">
                                                <input type="checkbox" class="cbx" id="cbx{{$i}}" style="display: none;" {{ $kunden->ehepartnerChecklists->contains($checklist)?"checked":''}}>
                                                <label for="cbx{{$i}}" class="check" onclick="checkedFunction(this, 'ehepartner')" data-id="{{$checklist->id}}">
                                                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                                                        <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                                        <polyline points="1 9 7 14 15 4"></polyline>
                                                    </svg>
                                                </label>
                                                <label for="cbx{{$i}}" onclick="checkedFunction(this, 'ehepartner')" data-id="{{$checklist->id}}">{{$checklist->body}}</label>
                                            </div>
                                            @php($i++)
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
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

    <?php $cIndex = 0 ?>
    @foreach($Calculations as $cal)
        <!-- Modal -->
        <div id="myModal-{{$cIndex}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                <form action="updatefinanceheading" method ="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="id" value="{{$cal->id}}">
                        <input type="text" class="form-control" name="heading" id="heading" value="{{$cal->name}}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
                
            </div>
        </div>
    <?php $cIndex++; ?>
    @endforeach



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
    <script type="text/javascript" src="{{ asset('/js/sweetalert.min.js') }}"></script>

    <script type="text/javascript">

        function removeCard(cardNo) {
            $('.card-' + cardNo).remove();
        }
        function save_timeline() {
            // alert('1');
            //if ( confirm('Are you sure you want to submit?') ) {
            var tenFieldFlag = $('#new_form_controller').val();
            var serializeForm = $('#kunden_edit_form').serializeArray();
            setTimeout(function(){
                $("#kunden_edit_form").submit();
            }, 500);
            $.ajax({
                url: 'save_timeline',
                type: 'post',
                data: {
                    _token: $('[name="_token"]').val(),
                    // New 11 fields
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
            });
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
            var curPayoutDate = new Date(payout.getFullYear(), payout.getMonth() + 1, 0);   // Nur zu Ausgabezwecken
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
                // loansRest = loansRest;
                resultString += "<tr><td>" + month_names_short[curPayoutDate.getMonth()] + " " + curPayoutDate.getFullYear() + "</td><td>" + changeString(round(calcInterest, 2)) + "     " + "</td><td>" +changeString(round(calcRepayment, 2)) + "</td><td>" + changeString(round(loansRest, 2)) + "</td></tr>";
                // curPayoutDate.setMonth(curPayoutDate.getMonth() + 1);
                curPayoutDate= new Date(curPayoutDate.getFullYear(), curPayoutDate.getMonth() + 1, 0);
                var temp = {
                    'repayment_date':(month_names_short[curPayoutDate.getMonth()]) + " " + curPayoutDate.getFullYear(),
                    'zinsen': changeString(round(calcInterest, 2)),
                    'tilgung': changeString(round(calcRepayment, 2)),
                    'darlehensrest': changeString(round(loansRest, 2))
                };
                curPayoutDate.setDate(curPayoutDate.getDate()+1);
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
        // function enabled(checkBox) {
        //     var calculation_id = $(checkBox).data('calculation_id');
        //     // If the checkbox is checked, display the output text
        //     $.ajax({
        //         url: '{{ route("calculation.statusChange") }}',
        //         type: 'post',
        //         data: {
        //             _token: $('[name="_token"]').val(),
        //             calculation_id: calculation_id
        //         },
        //         success: function (response) {
        //             console.log(response.calculation);
        //             if(response.calculation.enabled == 1) {
        //                 $(checkBox).prop('checked', true);
        //             } else {
        //                 $(checkBox).prop('checked', false);
        //             }
        //             swal({
        //                 title: "Enabled!",
        //                 text: "Your selected kalkulation is enabled for print.",
        //                 type: "success",
        //                 icon: 'success',
        //                 timer: 2000
        //             });
        //         },
        //         error: function (error) {
        //             if (checkBox.checked == false){
        //                 $(checkBox).prop('checked', true);
        //             } else {
        //                 $(checkBox).prop('checked', false);
        //             }
        //             swal({
        //                 title: "Error!",
        //                 text: "Something wrong. Try again.",
        //                 type: "error",
        //                 icon: 'error',
        //                 timer: 2000
        //             });
        //         }
        //     });
        // }
        function kundenSpouse(th) {
            if($(th).data('status') == 1) {
                $('input[name="ehepartner_enabled"]').val(0);
                $('#spouseDiv').fadeOut();
                $('#ehepartnerChecklist').fadeOut();
                $(th).data('status', 0);
                $(th).html('2. Darlehensnehmer hinzufügen');
                $(th).removeClass('btn-danger').addClass('btn-primary');
            } else {
                $('input[name="ehepartner_enabled"]').val(1);
                $('#spouseDiv').fadeIn();
                $('#ehepartnerChecklist').fadeIn();
                $(th).data('status', 1);
                $(th).html('2. Darlehensnehmer entfernen');
                $(th).removeClass('btn-primary').addClass('btn-danger');
            }
        }
        function checkedFunction(th, who) {
            $.ajax({
                url: "{{route('kundenChecklist')}}",
                type: 'post',
                data: {
                    _token: $('[name="_token"]').val(),
                    data_id: $(th).data('id'),
                    kunden_id: '{{$kunden->id}}',
                    who: who,
                    action: $(th).parent().find('input[type="checkbox"]').is(':checked') ? 1:0
                },
                success: function (res) {
                    if(res.success == true) {
                        // $(th).parent().find('input[type="checkbox"]').prop('checked', true);
                    } else {
                        if($(th).parent().find('input[type="checkbox"]').is(':checked')) {
                            $(th).parent().find('input[type="checkbox"]').prop('checked', false);
                        } else {
                            $(th).parent().find('input[type="checkbox"]').prop('checked', true);
                        }
                    }
                }
            });
        }




    </script>

@endsection
