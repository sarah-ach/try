<?php

namespace App\Http\Controllers;
use App\Models\trasabilite;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use App\Http\Controllers\QrController;

class PdfController extends Controller
{

    public function preview()
    {
        return view('preview');
    }


    public function generatePDF()
    {
        $pdf = PDF::loadView('preview');
        return $pdf->download('demo.pdf');
    }

    public function index(Request $request)
	{
	    $data = new trasabilite;
   
        $data = $request->splice_name;
        $data2 = $request->id_operateur;
        $data3=$request->location;
     

        $test=QrCode::size(50)->generate($data);
        $grp=' </br>'.$data.' </br>'.'Id opérateur:'. $data2.' </br>'.$data3;
        $grp2=$grp." </br>".$test;

	    if($request->has('download'))
	    {
	        $pdf = PDF::loadView('index',$data);
	        return $pdf->download('users_pdf_example.pdf');
	    }

	    return view('preview');
	}
}
