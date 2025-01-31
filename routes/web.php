<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class,'login'])->name('loggedIn');

Route::get('/customerRegister', [AuthController::class,'showCustomerRegistrationForm'])->name('customerRegister');
Route::post('/customerRegister', [AuthController::class,'customerRegister'])->name('customerRegistration');
Route::get('/customers', [AuthController::class, 'showCustomers'])->name('customers.index');

Route::get('/adminRegister', [AuthController::class,'showAdminRegistrationForm'])->name('adminRegister');
Route::post('/adminRegister', [AuthController::class,'register'])->name('registration');
Route::get('/admins', [AuthController::class, 'showAdmins'])->name('admins.index');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [AuthController::class,'dashboard'])->name('dashboard');
