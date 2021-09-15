<?php

use App\Http\Controllers\backend\adminEmbara\adminEmbaraController;
use App\Http\Controllers\backend\auth\AuthAgentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\paketTrip\PaketTripController;
use App\Http\Controllers\backend\auth\AuthEmbaraController;
use App\Http\Controllers\backend\kategoriTrip\kategoriTripController;
use App\Http\Controllers\backend\rajaOngkir\RajaOngkirController;
use App\Http\Controllers\backend\registerAgent\RegisterAgentController;
use App\Http\Controllers\frontend\checkout\CheckoutController;
use App\Http\Controllers\frontend\destinasi\DestinasiController;
use App\Http\Controllers\frontend\home\HomeController;
use App\Http\Controllers\frontend\checkout\NotifCheckoutController;
use App\Http\Controllers\frontend\invoice\InvoiceController;
use App\Http\Controllers\frontend\order\OrderController;
use App\Http\Controllers\frontend\tentangKami\TentangKamiController;

// Front Route
Route::group(['prefix' => '/', 'namespace' => 'frontend'], function(){
    Route::get('home', [HomeController::class, 'index']);
    Route::get('tentang', [TentangKamiController::class, 'index']);
    Route::get('destinasi', [DestinasiController::class, 'index']);
    Route::get('destinasi-details/{id?}', [DestinasiController::class,'details']);
    Route::get('cart', [DestinasiController::class,'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [DestinasiController::class,'addToCart']);
    Route::patch('update-cart', [DestinasiController::class,'updateCart']);
    Route::delete('delete-cart', [DestinasiController::class,'deleteCart']);

    Route::middleware(['auth'])->group(function(){
        Route::post('checkout', [CheckoutController::class, 'checkOutCart']);
        Route::get('checkout-details', [CheckoutController::class, 'checkout']);
        Route::post('order', [OrderController::class, 'PostOrder']);
        Route::get('invoice', [InvoiceController::class, 'getInvoice']);
        Route::get('payment-notif', [NotifCheckoutController::class, 'paymentNotif']);
    });
});

// Backend
Route::group(['prefix' => 'admin', 'namespace' => 'backend'], function(){

    // Auth
    Route::get('/login', [AuthAgentController::class, 'Login'])->name('agent.login');
    Route::post('/login/post', [AuthAgentController::class, 'LoginPost']);
    Route::get('/logout', [AuthAgentController::class, 'Logout']);

    Route::group(['middleware' => 'auth:agent'], function(){
        Route::get('/', [DashboardController::class, 'index']);

        // PaketTrip
        Route::get('/pakettrip', [PaketTripController::class, 'index']);
        Route::get('/create-pakettrip/{id?}', [PaketTripController::class, 'formCreate']);
        Route::get('/getKotaList/{id}', [PaketTripController::class, 'getDataKota']);
        Route::post('/save-pakettrip/{id?}', [PaketTripController::class, 'saveAndEdit']);
        Route::get('/delete/{id?}', [PaketTripController::class, 'delete']);
    });

});

// Backend Embara
Route::group(['prefix' => 'admin-embara', 'namespace' => 'backend'], function(){

    Route::get('/login', [AuthEmbaraController::class, 'Login'])->name('embara.login');
    Route::post('/login/post', [AuthEmbaraController::class, 'LoginPost']);
    Route::get('/logout', [AuthEmbaraController::class, 'Logout']);

    Route::group(['middleware' => 'auth:admin-embara'], function() {
        // Home Dashboard Embara
        Route::get('/',[DashboardController::class, 'backendEmbara']);
        Route::get('/pageBackend', [adminEmbaraController::class, 'index']);
        Route::get('/pageCreate/{id?}', [adminEmbaraController::class, 'createBackend']);
        Route::post('/storeBackend/{id?}', [adminEmbaraController::class, 'storeBackend']);
        Route::get('/delete/{id}', [adminEmbaraController::class, 'delete']);
        // Kategori Trip
        Route::get('/pageKategori', [kategoriTripController::class, 'index']);
        Route::get('/create-kategori/{id?}', [kategoriTripController::class, 'createKategori']);
        Route::post('/storeKategori/{id?}', [kategoriTripController::class, 'storeKategori']);
        Route::get('/deleteKategori/{id}', [kategoriTripController::class, 'deleteKategori']);

        // Agent
        Route::get('/agent', [adminEmbaraController::class, 'agentIndex']);
        Route::get('/register-agent', [RegisterAgentController::class, 'registerAgent']);
        Route::post('/register-agent/post', [RegisterAgentController::class, 'registerAgentPost']);

        // Load Provinsi dan Kota
        Route::get('/provinsi', [RajaOngkirController::class, 'indexProvinsi']);
        Route::get('/kota', [RajaOngkirController::class, 'indexKota']);
        Route::get('/rajaongkir/getProvinsi', [RajaOngkirController::class, 'getDataProvinsi']);
        Route::get('/rajaongkir/getKota', [RajaOngkirController::class, 'getDataKota']);
    });
});
