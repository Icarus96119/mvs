<?php

namespace MVS\Http\Controllers;

use Illuminate\Http\Request;
use MVS\Kunden;
use DB;
use PDF;


class DynamicPDFController extends Controller
{
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('dynamic_pdf')->with('customer_data', $customer_data);
    }

    function get_customer_data($id)
    {
     $customer_data = Kunden::find($id);
     return $customer_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
     $customer_data = $this->get_customer_data();
     $output = '
     <h3 align="center">Angebot</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Vorname</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Nachname</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Stadt</th>
    <th style="border: 1px solid; padding:12px;" width="15%">PLZ</th>
   </tr>
     ';  
     foreach($customer_data as $kunden)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$kunden->vorname.'</td>
       <td style="border: 1px solid; padding:12px;">'.$kunden->nachname.'</td>
       <td style="border: 1px solid; padding:12px;">'.$kunden->wohnort.'</td>
       <td style="border: 1px solid; padding:12px;">'.$kunden->plz.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}
