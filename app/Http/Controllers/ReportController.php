<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

use \Mpdf\Mpdf as PDF; 
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    function start() {
        return 'controller start';
        // Setup a filename 
        //cod etaken from 
        // http://www.thecodingjack.com/creating-beautiful-documents-with-mpdf-and-laravel/
        $documentFileName = "fun.pdf";
 
        // Create the mPDF document
        $document = new PDF( [
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);  
        
        $data =[
            'foo'=>'foo',
            'bar'=>'bar'
        ];
        $pdf = PDF::loadview('pdf.pdftemplate.blade', $data);
        $pdf->save( public_path('pdf\out.pdf') );
        return $pdf->stream('document.pdf');
 
        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$documentFileName.'"'
        ];
 
        // Write some simple Content
        //$document->WriteHTML('<h1 style="color:blue">TheCodingJack</h1>');
        //$document->WriteHTML('<p>Write something, just for fun!</p>');

        $document->setDocTemplate(public_path('pdf\pdftemplate'), true);
        $document->WriteHTML(public_path('pdf\out'));
         
        // Save PDF on your public storage 
        Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));
         
        // Get file back from storage with the give header informations
        return Storage::disk('public')->download($documentFileName, 'Request', $header); //
    }

    // http://localhost/lav11_invplanePdf/invoice/generate_pdf/1234
    // public function generatePDF($id) {
    //     //return "report generate $id";
    //     $mpdf = new PDF;
    //     $data = [
    //         'data' => 'This is a sample PDF test lo ..',
    //         'table' =>[
    //             ['PCode'=>'code1', 'PName'=>'name1','Qty'=>123,'Price'=>10],
    //             ['PCode'=>'code2', 'PName'=>'name2','Qty'=>456,'Price'=>20],
    //             ['PCode'=>'code3', 'PName'=>'name3','Qty'=>789,'Price'=>30],
    //             ['PCode'=>'code4', 'PName'=>'name4','Qty'=>123,'Price'=>40],
    //             ['PCode'=>'code5', 'PName'=>'name5','Qty'=>456,'Price'=>50],
    //             ],
    //     ];
    //     $data['table'] = $this->createtable($data['table'],['col1','col2','col3','col4','Amount']);
    //     //dd($data['table']);
    //     //$html = view('pdf_template', $data)->render();
    //     $html = view('pdf.invoice_template2', $data)->render();
    //     $mpdf->WriteHTML($html);
    //     return response()->stream(
    //         function() use ($mpdf) {
    //             $mpdf->Output();
    //         },
    //         200,
    //         [
    //             'Content-Type' => 'application/pdf',
    //             'Content-Disposition' => 'inline; filename="sample.pdf"',
    //         ]
    //     );

        
    //     $filePdf = public_path('pdf\invoice_001.pdf');
    //     return response()->file($filePdf);
    //   }

      public function generatePDF($id) {
        //return "report generate $id";
        $db = 'invoice';
        $data = [];
        $data['data'] = DB::table($db)->where('id', $id)->first();
        $invno = $data['data']->TransNo;
        //dd($invno);
        //dd($data);
        $detail = DB::table('transdetail')->where('InvNo', $invno)->get();
        //dd($data);
        $accCode =$data['data']->AccCode;
        //dd($accCode);
        // $data->account = DB::table('clients')->where('AccCode', $accCode)->first(); 
        $data['data']->account = DB::table('clients')->where('AccCode', $accCode)->first(); 
        if(!empty($detail)) {
            foreach($detail as $d) {
                $d->Amount = intval($d->Price??0) * intval($d->Qty??0);
            }
            $data['data']->detail = $detail;
        } else {
            $data['data']->detail = [];
        }
        //dd($data);
        $mpdf = new PDF;
        // dd($data);
        $accName= $data['data']->AccName;
        $addr1 = $data['data']->account->Address1 ?? '';
        $addr2 = $data['data']->account->Address2 ?? '';
        $city = $data['data']->account->City ?? '';
        $state = $data['data']->account->State ?? '';
        $zipcode = $data['data']->account->ZipCode ?? '';
        $countryName = $data['data']->account->CountryName ?? '';
        $phone = $data['data']->account->Phone ?? '';
        $email = $data['data']->account->Email ?? '';
        $data['from'] = "<b>BoostrapBrain</b> <br/>
                        875 Coast Hwybr <br/>
                        Laguna Beach, California,92651 <br/>
                        United States <br/>
                        Phone: (949) 494-7695 <br/>
                        Email: email@domain.com";
        $data['to']="<strong>$accName</strong><br>
                        $addr1<br>
                        $addr2<br>
                        $city, $state, $zipcode <br>
                        $countryName <br>
                        Phone: $phone <br>
                        Email: $email ";
        $data['table'] =[
                ['PCode'=>'code1', 'PName'=>'name1','Qty'=>123,'Price'=>10],
                ['PCode'=>'code2', 'PName'=>'name2','Qty'=>456,'Price'=>20],
                ['PCode'=>'code3', 'PName'=>'name3','Qty'=>789,'Price'=>30],
                ['PCode'=>'code4', 'PName'=>'name4','Qty'=>123,'Price'=>40],
                ['PCode'=>'code5', 'PName'=>'name5','Qty'=>456,'Price'=>50],
        ];
        //dd($data);
        //$data['table'] = $detail;
        //$data['table'] = $this->createtable($data['table'],['col1','col2','col3','col4','Amount']);
        //dd($data['table']);
        //$html = view('pdf_template', $data)->render();
        $subtot = 0; 
        //dd($data['table']);
        foreach($data['table'] as &$t) {
            //dd($t);
            $amount = intval($t['Qty']??0) * intval($t['Price']??0); 
            //array_push($t,['Amount'=>$amount]);
            //$data[$idx]['Amount'] = $amount;
            $t['Amount'] = $amount;
            $subtot += $t['Amount'];
        }
        $data['subtotal'] = $subtot;
        
        //dd($data);
        
        $html = view('pdf.invoice_template2', $data)->render();
        $mpdf->WriteHTML($html);
        return response()->stream(
            function() use ($mpdf) {
                $mpdf->Output();
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="sample.pdf"',
            ]
        );

        
        $filePdf = public_path('pdf\invoice_001.pdf');
        return response()->file($filePdf);
      }

      function createtable($data,$caption) {
        $out='<tr>';
        foreach($caption as $c) {
            $out.='<th>'.$c.'</th>';
        }
        $out.='</tr>';
        foreach($data as $r) {
            $out.='<tr>';
            $out.="<td>".$r['PCode']."</td>";
            $out.="<td>".$r['PName']."</td>";
            $out.="<td>".$r['Qty']."</td>";
            $out.="<td>".$r['Price']."</td>";
            $out.="<td>".$r['Qty']*$r['Price']."</td>";
            // foreach($r as $c) {
            //     $out.="<td>".$c."</td>";
            // }
            $out.='</tr>';    
        }
        
        return $out;

      }
}
