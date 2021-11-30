<?php

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

Route::get('/', Main::class);
Route::get('/login', Login::class);
Route::get('/register', Register::class);
