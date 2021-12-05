<?php

use App\Http\Controllers\adminCTR;
use App\Http\Livewire\Pages\Checkout;
use App\Http\Livewire\Pages\Main;
use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Pages\Promo;
use App\Http\Livewire\Pages\Settings;
use App\Http\Livewire\Pages\Ticket;
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
Route::get('/', Main::class)->name('main');
Route::get('/main', Main::class);
Route::get("/home", Home::class);
Route::get("/tickets", Tickets::class);
Route::get("/ticket/{id}", Ticket::class);
Route::get('/promo/{id}', Promo::class);

Route::middleware(["auth", "isUser"])->group(function () {
  Route::get('/settings', Settings::class);
  Route::get("/checkout", Checkout::class);
});

//ADMINS
Route::middleware(["auth", 'isAdmin'])->group(function () {
  Route::get('/admin', [adminCTR::class, 'to_adminHome']);
  Route::get('/profileAdmin', [adminCTR::class, 'to_profileAdmin']);
  Route::post('/cek_profileAdmin', [adminCTR::class, 'cek_profile']);
  Route::get('/masterUser', [adminCTR::class, 'to_mUser']);
  Route::get('/masterTicket', [adminCTR::class, 'to_mTicket']);
  Route::get('/masterPromo', [adminCTR::class, 'to_mPromo']);
  Route::get('/masterTransaksi', [adminCTR::class, 'to_mTrans']);
  Route::post('/cek_ticketBaru', [adminCTR::class, 'cek_addTicket']);
  Route::post('/cek_changePromo', [adminCTR::class, 'change_promo']);

  Route::get('/detailTicket/{id}', [adminCTR::class, 'to_dtlTicket']);
  Route::post('/cek_updateTicket', [adminCTR::class, 'cek_uptTicket']);
  Route::post('/cek_changeJadwal', [adminCTR::class, 'change_jadwal']);
  Route::post('/cek_adminBaru', [adminCTR::class, 'add_admin']);

  Route::get('/dataUser', [adminCTR::class, 'load_tbuser']);
  Route::get('/banUser', [adminCTR::class, 'ban_user']);
  Route::get('/dataPromo', [adminCTR::class, 'load_tbpromo']);
  Route::get('/cariPromo', [adminCTR::class, 'cari_promo']);
  Route::get('/delPromo', [adminCTR::class, 'hapus_promo']);
  Route::post("/logout", [adminCTR::class, 'logout']);

  Route::get('/dataKota', [adminCTR::class, 'load_kota']);
  Route::get('/dataTicket', [adminCTR::class, 'load_ticket']);
  Route::get('/deleteTicket/{id}', [adminCTR::class, 'to_delTicket']);

  Route::get('/dataJadwal', [adminCTR::class, 'load_jadwal']);
  Route::get('/cariJadwal', [adminCTR::class, 'cari_jadwal']);
  Route::get('/delJadwal', [adminCTR::class, 'hapus_jadwal']);

  Route::get('/dataTrans',[adminCTR::class, 'load_trans']);
  Route::get('/tolTrans',[adminCTR::class, 'tolak_trans']);
  Route::get('/terTrans',[adminCTR::class, 'terima_trans']);

  Route::get('/tes',[adminCTR::class, 'test_email']);
});
