<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TrasabiliteController;
use App\Models\trasabilite;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use DB;
use Spatie\PdfToImage\Pdf;


class QrController extends Controller
{
     public function index(Request $request)
    {
        $data = new trasabilite;
   
        $data = $request->splice_name;
        $data2 = $request->id_operateur;
        $data3=$request->location;
      

        $test=QrCode::size(50)->generate($data);
        $grp=' </br>'.$data.' </br>'.'Id opérateur:'. $data2.' </br>'.$data3;
        $grp2=$grp." </br>".$test;
        $pdf = PDF::loadView('preview');
         return $pdf->download('pdf_download.pdf');
         return view('/qrcode',['trasabilite'=>$grp2]);
    } 


   /*  public function index()
    {
        return view('/preview');
    }
 */

    public function pdfForm(Request $request){
        $products = DB::table("trasabilite")->get();
        view()->share('trasabilite',$products);       
              
                $data = $request->splice_name;
                $test=QrCode::size(50)->generate($data);

                $pdf = PDF::loadView('preview');
                
                return $pdf->download('pdf_download.pdf');
               
                  
        return view('/preview',['trasabilite'=>$products]);
         
    }


    public function generateQRCode($data)
        {
            $qrCode = QrCode::format('png')->size(50)->errorCorrection('H')->generate($data);
            $imagePath = storage_path('app/qr_codes/' . uniqid() . '.png');
            file_put_contents($imagePath, $qrCode);
            return $imagePath;
        }


        public function generatePDF()
        {
            $pdfPath = storage_path('app/public/pdf/' . uniqid() . '.pdf');
            $data = 'Data to be encoded in the QR code';
            $qrCodePath = $this->generateQRCode($data);
            $pdf = new Pdf(storage_path('app/public/sample.pdf'));
            $pdf->setPage(1)->saveImage($qrCodePath);
            $pdf->setPage(1)->saveAs($pdfPath);
            unlink($qrCodePath);
            return response()->download($pdfPath);
        }
}
