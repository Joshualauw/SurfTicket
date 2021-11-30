<?php

use App\Http\Controllers\adminCTR;
use App\Http\Livewire\Pages\Main;
use App\Http\Livewire\Pages\Login;
use App\Http\Livewire\Pages\Register;
use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Pages\Tickets;
use Illuminate\Support\Facades\Route;

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

//USERS
Route::get('/', Main::class);
Route::get('/login', Login::class);
Route::get('/register', Register::class);
Route::get("/home", Home::class);
Route::get("/tickets", Tickets::class);
Route::get('/admin', [adminCTR::class, 'to_adminHome']);
Route::get('/profileAdmin',[adminCTR::class, 'to_profileAdmin']);
Route::post('/cek_profileAdmin', [adminCTR::class, 'cek_profile']);
Route::get('/masterUser',[adminCTR::class, 'to_mUser']);
Route::get('/masterTicket',[adminCTR::class, 'to_mTicket']);
Route::get('/masterPromo',[adminCTR::class, 'to_mPromo']);
Route::get('/masterTransaksi',[adminCTR::class, 'to_mTrans']);