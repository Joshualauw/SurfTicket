<?php

use App\Http\Controllers\adminCTR;
use App\Http\Livewire\Pages\Main;
use App\Http\Livewire\Pages\Login;
use App\Http\Livewire\Pages\Register;
use App\Http\Livewire\Components\TheHeader;
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

Route::get('/admin', [adminCTR::class, 'to_adminHome']);
Route::get('/profileAdmin',[adminCTR::class, 'to_profileAdmin']);
Route::post('/cek_profileAdmin', [adminCTR::class, 'cek_profile']);
