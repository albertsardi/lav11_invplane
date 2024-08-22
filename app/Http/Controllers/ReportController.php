<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Mpdf\Mpdf as PDF; 
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    function testpdf() {
        //return 'controller start';
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
 
        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$documentFileName.'"'
        ];
 
        // Write some simple Content
        $document->WriteHTML('<h1 style="color:blue">TheCodingJack</h1>');
        $document->WriteHTML('<p>Write something, just for fun!</p>');
         
        // Save PDF on your public storage 
        Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));
         
        // Get file back from storage with the give header informations
        return Storage::disk('public')->download($documentFileName, 'Request', $header); //
    }
}
