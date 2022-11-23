<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BisnisController;
use App\Http\Controllers\IndoregionController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/persediaan', [BisnisController::class, 'stock']);
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function(){

// Route::prefix('persediaan')->middleware('auth')->group(function(){
//     Route::resource('/transaksi', TransaksiController::class);
//     Route::resource('/persediaan', ProdukController::class);
//     Route::resource('/agen', AgenController::class);

// });
    
// });

Route::middleware(['auth'])->group(function(){
    Route::get('/', function () {
        return redirect('home');
    });
    Route::resource('/transaksi', TransaksiController::class);
    Route::resource('/persediaan', ProdukController::class);
    Route::resource('/agen', AgenController::class);
    Route::resource('/persediaan', StockController::class);
    Route::resource('/produk', ProdukController::class);
    Route::get('/katalog', [KatalogController::class, 'index']);
    Route::resource('/register', RegistersUsers::class);
    Route::resource('/profile', ProfileController::class);
    Route::get('/agen/create', [AgenController::class, 'create'])->name('create');
    Route::post('getkabupaten', [AgenController::class, 'getkabupaten'])->name('getkabupaten');
    Route::post('getkecamatan', [AgenController::class, 'getkecamatan'])->name('getkecamatan');
    Route::get('/agen/show/{item}', [AgenController::class, 'show']);


});

// Route::get('/create', [AgenController::class, 'create'])->name('create');


Auth::routes();

// $router->group(
//     [
//         'namespace' => '\Laravolt\Indonesia\Http\Controllers',
//         'prefix' => config('laravolt.indonesia.route.prefix'),
//         'as' => 'indonesia::',
//         'middleware' => config('laravolt.indonesia.route.middleware'),
//     ],
//     function ($router) {
//         $router->resource('provinsi', 'ProvinsiController');
//         $router->resource('kabupaten', 'KabupatenController');
//         $router->resource('kecamatan', 'KecamatanController');
//         $router->resource('kelurahan', 'KelurahanController');
//     }
// );

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
