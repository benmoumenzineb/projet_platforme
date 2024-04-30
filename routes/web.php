<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeetudiantController;
use App\Http\Controllers\Profil_etudiantController;
use App\Http\Controllers\DemandeetudiantController;
use App\Http\Controllers\EmploietudiantController;
use App\Http\Controllers\ReclamationetudiantController;
use App\Http\Controllers\PaiementetudiantController;
use App\Http\Controllers\NoteEtudiantController;
use App\Http\Controllers\ExamEtudiantController;
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

Route::get('/', function () {
    return view('login_etudiant');
});
Route::get('/footer', function () {
    return view('etudiant.layouts.footer');
});
Route::get('/homeetudiant', [homeetudiantController::class, 'index'])->name('homeetudiant');
Route::get('/Profil_etudiant', [Profil_etudiantController::class, 'index'])->name('Profil_etudiant');
route::get('/emploi','App\Http\Controllers\EmploietudiantController@index')->name('emploi');
route::get('/demande','App\Http\Controllers\DemandeetudiantController@index')->name('demande');
route::get('/reclamation','App\Http\Controllers\ReclamationetudiantController@index')->name('reclamation');
route::get('/paiement','App\Http\Controllers\PaiementetudiantController@index')->name('paiement');
route::get('/note','App\Http\Controllers\NoteEtudiantController@index')->name('note');
route::get('/exam','App\Http\Controllers\ExamEtudiantController@index')->name('exam');
Route::get('/nav', function () {
    return view('prof.layouts.navbarprof');
});