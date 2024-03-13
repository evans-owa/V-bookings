<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Helpers\helpers;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});


Route::get('movietickets', function () {
    return view('frontend.movietickets');
});

Route::get('concertstickets', function () {
    return view('frontend.concertstickets');
});


Route::get('/index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::get('/admin/addTicket', function () {
    return view('admin.addTicket');
})->middleware(['auth:admin', 'verified'])->name('admin.addTicket');

require __DIR__.'/adminauth.php';

// admin functionality
Route::post('/add_ticket', [AdminTicketController::class, 'add_ticket']);
Route::get('admin/addTicket', [AdminTicketController::class, 'ticket_adminview']);
Route::get('admin/editTicket/{id}', [AdminTicketController::class, 'edit_ticket']);
Route::put('/edit_ticket/{id}', [AdminTicketController::class, 'update_ticket']);
Route::get('delete_ticket/{id}', [AdminTicketController::class, 'delete_ticket']);

//user side functionality
Route::get('movietickets', [CustomerController::class, 'customer_veiwticket']);

// ticket views
Route::get('/singleEventView/{id}', [UserController::class, 'detail_ticket']);

Route::post('/add-to-wait', [UserController::class, 'addToWait']);
Route::get('checkout', [CheckoutController::class, 'finalizeTicket']);

Route::middleware(['auth'])->group(function () {
    Route::get('frontend/wait', [UserController::class, 'viewwait']);
    Route::get('delete-wait-item/{id}', [UserController::class, 'deletehold']);
    Route::post('/book_ticket', [CheckoutController::class,'ticket_Booked']);

    Route::get('userTickets', [UserController::class, 'myTicket']);
});

Route::get('admin/dashboard',[AdminTicketController::class, 'adminBookingView']);
