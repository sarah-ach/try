<?php
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TrasabiliteController;
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

Route::get('/qrcode',function(Request $request){
    $data = new trasabilite;
   
        $data = $request->splice_name;
    return QrCode::size(300)->generate($data);
});