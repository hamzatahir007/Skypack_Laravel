<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TravelerController;
use App\Http\Controllers\TravelFlightController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Website\WebsiteAuthController;
use App\Http\Controllers\Website\ClientAuthController;
use App\Http\Controllers\Website\IndexAuthController;
use App\Http\Controllers\Website\TravelerAuthController;
use App\Http\Controllers\WithdrawReqController;

Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Product routes (CRUD) - use resource
Route::middleware('auth')->group(function () {
    Route::resource('admin/products', ProductController::class);
});

// Clients Resource Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/clients', ClientController::class);
});

// Clients Resource Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/travelers', TravelerController::class);
});

// Clients Resource Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/travel_flights', TravelFlightController::class);
});

// inquiries Resource Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/inquiries', InquiryController::class);
});

// inquiries Resource Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/inventory', InventoryController::class);
});

// request Resource Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/withdrawRequest', WithdrawReqController::class);
});



// Website pages
// Route::get('/', function () {
//     return view('website.index'); // homepage
// })->name('website.home');

Route::get('/', [IndexAuthController::class, 'dashboard'])->name('/');
Route::get('/flight/{id}', [IndexAuthController::class, 'show'])->name('flight.details');

// Website Login & Register
Route::prefix('client')->name('client.')->group(function () {
    Route::get('login', [ClientAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [ClientAuthController::class, 'login'])->name('login.post');

    Route::get('register', [ClientAuthController::class, 'showRegister'])->name('register');
    Route::post('register', [ClientAuthController::class, 'register'])->name('register.post');

    Route::middleware('clientAuth')->group(function () {
        Route::get('dashboard', [IndexAuthController::class, 'dashboard'])->name('dashboard');
        // Route::get('dashboard', [ClientAuthController::class, 'dashboard'])->name('dashboard');

        // flights route 
        Route::get('inquiries', [ClientAuthController::class, 'inquiries'])->name('inquiries');
        // CREATE
        Route::get('inquiries/create/{flight_id?}', [ClientAuthController::class, 'createInquiry'])->name('inquiries.create');
        Route::post('inquiries/store', [ClientAuthController::class, 'storeInquiry'])->name('inquiries.store');

        // EDIT
        Route::get('inquiries/{id}/edit', [ClientAuthController::class, 'editInquiry'])->name('inquiries.edit');
        Route::put('inquiries/{id}/update', [ClientAuthController::class, 'updateInquiry'])->name('inquiries.update');

        // DELETE
        Route::delete('inquiries/{id}/delete', [ClientAuthController::class, 'deleteInquiry'])->name('inquiries.delete');
        Route::get('inquiries/{id}/deposit', [ClientAuthController::class, 'deposit'])->name('inquiries.deposit');
        Route::post('inquiries/{id}/pay', [ClientAuthController::class, 'pay'])->name('inquiries.pay');

        Route::post('inquiries/{id}/checkout', [ClientAuthController::class, 'checkout'])->name('inquiries.checkout');
        Route::get('inquiries/payment/success', [ClientAuthController::class, 'paymentSuccess'])->name('inquiries.success');
        Route::get('inquiries/payment/cancel', [ClientAuthController::class, 'paymentCancel'])->name('inquiries.cancel');



        Route::post('logout', [ClientAuthController::class, 'logout'])->name('logout');
    });
});


Route::prefix('traveler')->name('traveler.')->group(function () {

    Route::get('login', [TravelerAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [TravelerAuthController::class, 'login'])->name('login.post');

    Route::get('register', [TravelerAuthController::class, 'showRegister'])->name('register');
    Route::post('register', [TravelerAuthController::class, 'register'])->name('register.post');

    Route::middleware('travelerAuth')->group(function () {
        Route::get('dashboard', [IndexAuthController::class, 'dashboard'])->name('dashboard');
        // Route::get('dashboard', [TravelerAuthController::class, 'dashboard'])->name('dashboard');

        // flights route 
        Route::get('flights', [TravelerAuthController::class, 'flights'])->name('flights');
        // CREATE
        Route::get('flights/create', [TravelerAuthController::class, 'createFlight'])->name('flights.create');
        Route::post('flights/store', [TravelerAuthController::class, 'storeFlight'])->name('flights.store');

        // EDIT
        Route::get('flights/{travel_flight}/edit', [TravelerAuthController::class, 'editFlight'])->name('flights.edit');
        Route::put('flights/{travel_flight}/update', [TravelerAuthController::class, 'updateFlight'])->name('flights.update');

        // DELETE
        Route::delete('flights/{travel_flight}/delete', [TravelerAuthController::class, 'deleteFlight'])->name('flights.delete');

        Route::get('flights/{id}/inquiries', [TravelerAuthController::class, 'flightInquiries'])
            ->name('flights.inquiries');
        Route::get('inquiry/{id}/accept', [TravelerAuthController::class, 'acceptInquiry'])
            ->name('inquiry.accept');
        Route::get('inquiry/{id}/reject', [TravelerAuthController::class, 'rejectInquiry'])
            ->name('inquiry.reject');

        Route::post('inquiry/{id}/verify-code', [TravelerAuthController::class, 'verifyCode'])->name('inquiry.verify');

        Route::get('inquiry/{inquiry}/withdraw', [TravelerAuthController::class, 'withdrawCreate'])->name('inquiry.withdrawCreate');

        Route::post('withdraw', [TravelerAuthController::class, 'storeWithdraw'])->name('inquiry.storeWithdraw');

        Route::get('inquiry/{inquiry}/withdraw-detail', [TravelerAuthController::class, 'withdrawDetail'])->name('inquiry.withdrawDetail');


        Route::post('logout', [TravelerAuthController::class, 'logout'])->name('logout');
    });
});


require __DIR__ . '/auth.php';
