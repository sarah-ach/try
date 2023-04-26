<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\TrasabiliteController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use App\Models\trasabilite;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
});

Route::get('/search', function () {
    return view('search');
});
// Route::get('/',[App\Http\Controllers\LocationController::class, 'search']);
/*Route::controller(LocationController::class)->group(function(){
    Route::get('home', 'search');

});*/

Route::controller(TrasabiliteController::class)->group(function(){
    Route::get('home', 'index');
    Route::post('home', 'storeH');
});

Route::controller(LocationController::class)->group(function(){
    Route::get('search', 'index');
    Route::get('search', 'search');
});

Route::get('/home/search',[App\Http\Controllers\LocationController::class, 'search']);



//to run the qrcode from the route
/* Route::get('/qrcode',function(Request $request){
    $data = new trasabilite;
   
        $data = $request->splice_name;
        $data2 = $request->id_operateur;
        $data3=$request->location;
     

        $test=QrCode::size(50)->generate($data);
        $grp=' </br>'.$data.' </br>'.'Id opérateur:'. $data2.' </br>'.$data3;
        $grp2=$grp." </br>".$test;
    return $grp2;
}); */

//to run the qrcode from the controller
//Route::get('/qrcode',[QrController::class,'pdfForm']);


//Route::get('/generate-pdf', [QrController::class, 'generatePDF']);
//Route::get('/qrcode',[QrController::class,'index']);
//Route::get('pdf/preview',[PdfController::class,'preview'])->name('pdf.preview');
Route::get('/qrcode',[PdfController::class,'generatePDF'])->name('pdf.generate');
//Route::resource('/qrcode', PdfController::class);