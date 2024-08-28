<?php

use App\Http\Controllers\UserController;
use App\Livewire\GraphicsContent;
use App\Livewire\ProductCatalog;
use App\Livewire\ProductForm;
use App\Livewire\PurchaseList;
use App\Livewire\TopCustomers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;


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

Route::get('/', ProductCatalog::class)->name('catalog.index');

Route::get('/fetch-users', [UserController::class, 'fetchUsers'])->name('users.fetch');
Route::get('/users', [UserController::class, 'index'])->name('users.index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {


    Route::get('/payment-success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment-cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

    Route::middleware(['role:Administrador'])->group(function () {

        Route::get('/dashboard', GraphicsContent::class)->name('dashboard');

        Route::get('/products', ProductForm::class)->name('products.index');

        Route::get('/purchases', PurchaseList::class)->name('admin.purchases');

        Route::get('/top-customers', TopCustomers::class)->name('top.customers');

    });

});


