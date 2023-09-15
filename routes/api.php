<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\kategorijaController;
use App\Http\Controllers\KorisnikController;
use App\Http\Controllers\PorudzbinaController;
use App\Http\Controllers\ProizvodKontroler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Proveri sve funkcije za sve kontrolere i rute , ovo  su korisnik rute 
Route::get('/korisnik', [KorisnikController::class, 'index'])->name('korisnik.index');
Route::get('/korisnik/create', [KorisnikController::class, 'create'])->name('korisnik.create');
Route::post('/korisnik', [KorisnikController::class, 'store'])->name('korisnik.store');
Route::get('/korisnik/{id}/edit', [KorisnikController::class, 'edit'])->name('korisnik.edit');
Route::put('/korisnik/{id}', [KorisnikController::class, 'update'])->name('korisnik.update');
Route::delete('/korisnik/{id}', [KorisnikController::class, 'destroy'])->name('korisnik.destroy');

//Promeni ovo , KATEGORIJE,  Rute 
Route::get('/kategorije', [kategorijaController::class,'index'])->name('kategorije.index');
Route::get('/kategorije/create',[kategorijaController::class,'create'])->name('kategorije.create');
Route::post('/kategorije', [kategorijaController::class,'store'])->name('kategorije.store');
Route::get('/kategorije/{id}/edit',  [kategorijaController::class,'edit'])->name('kategorije.edit');
Route::put('/kategorije/{id}',  [kategorijaController::class,'update'])->name('kategorije.update');
Route::delete('/kategorije/{id}',  [kategorijaController::class,'destroy'])->name('kategorije.destroy');

////Promeni ovo Proizvodi, rute 
Route::get('/proizvodi', [ProizvodKontroler::class,'index'])->name('proizvodi.index');
Route::get('/proizvodi/create', [ProizvodKontroler::class,'create'])->name('proizvodi.create');
Route::get('/proizvodi/{id}/prikaz', [ProizvodKontroler::class,'prikaz'])->name('proizvodi.show');
Route::post('/proizvodi',[ProizvodKontroler::class,'store'])->name('proizvodi.store');
Route::get('/proizvodi/{id}/edit', [ProizvodKontroler::class,'edit'])->name('proizvodi.edit');
Route::put('/proizvodi/{id}',  [ProizvodKontroler::class,'update'])->name('proizvodi.update');
Route::delete('/proizvodi/{id}', [ProizvodKontroler::class,'destroy'])->name('proizvodi.destroy');

//Promeni ovo NARUDZBINE,rute 
Route::get('/porudzbina', [PorudzbinaController::class,'index'])->name('porudzbina.index');
Route::get('/porudzbina/create', [PorudzbinaController::class,'create'])->name('porudzbina.create');
Route::post('/porudzbina', [PorudzbinaController::class,'store'])->name('porudzbina.store');
Route::get('/porudzbina/{id}/edit', [PorudzbinaController::class,'edit'])->name('porudzbina.edit');
Route::get('/porudzbina/{id}', [PorudzbinaController::class, 'show'])->name('porudzbina.show');
Route::put('/porudzbina/{id}',[PorudzbinaController::class,'updateStatus'])->name('porudzbina.update');
Route::delete('/porudzbina/{id}', [PorudzbinaController::class,'destroy'])->name('porudzbina.destroy');


Route::post('/register', [RegisterController::class,'create'])->name('register');
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout']);