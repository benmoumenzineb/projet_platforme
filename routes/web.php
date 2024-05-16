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
use App\Http\Controllers\homeProfController;
use App\Http\Controllers\homeScolariteController;
use App\Http\Controllers\LoginetudiantController;
use App\Http\Controllers\ListetudiantController;
use App\Http\Controllers\DemandeScolariteController;
use App\Http\Controllers\ReclamationScolariteController;
use App\Http\Controllers\PaiementScolariteController;
use App\Http\Controllers\CahierTextProfController;
use App\Http\Controllers\PresenceProfController;
use App\Http\Controllers\FormtelechargerController;
use App\Http\Controllers\HistoriqueprofController;

use App\Http\Controllers\NotifactionsexamController;
use App\Http\Controllers\NoteProfController;
use App\Http\Controllers\AjouteNoteController;
use App\Http\Controllers\ListePresenceController;
use App\Http\Controllers\AjouterEtudiantController;
use App\Http\Controllers\RhPersonnelControlleur;

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
    return view('etudiant.views.login_etudiant');
});
Route::get('/loginscolarite', function () {
    return view('etudiant.views.login_etudiant');
});
Route::get('/footer', function () {
    return view('etudiant.layouts.footer');
});
Route::get('/homeetudiant', [homeetudiantController::class, 'index'])->name('homeetudiant');

route::get('/emploi','App\Http\Controllers\EmploietudiantController@index')->name('emploi');
route::get('/demande','App\Http\Controllers\DemandeetudiantController@index')->name('demande');
route::post('/enregistrer-demande','App\Http\Controllers\DemandeetudiantController@enregistrerDemande')->name('endemande');
route::get('/reclamation','App\Http\Controllers\ReclamationetudiantController@index')->name('reclamation');
Route::post('/enregistrer-reclamation', 'App\Http\Controllers\ReclamationetudiantController@enregistrerReclamation')->name('enreclamation');
Route::post('/enregistrer-paiement', 'App\Http\Controllers\PaiementetudiantController@enregistrerPaiement')->name('enpaiement');

route::get('/paiement','App\Http\Controllers\PaiementetudiantController@index')->name('paiement');
route::get('/note','App\Http\Controllers\NoteEtudiantController@index')->name('note');
route::get('/exam','App\Http\Controllers\ExamEtudiantController@index')->name('exam');
Route::get('/nav', function () {
    return view('prof.layouts.navbarprof');
   
});
Route::get('/etudiants', [LoginetudiantController::class, 'index']);
Route::get('/etudiants/search', [LoginetudiantController::class, 'search'])->name('etudiant.search');
Route::get('/homeprof', [homeProfController::class, 'index'])->name('homeprof');

Route::get('/navbarsscolarite', function () {
    return view('scolarite.layouts.navbarscolarite');
   
});
Route::get('/homescolarite', [homeScolariteController::class, 'index'])->name('homescolarite');
Route::get('/scolarite', [ListetudiantController::class, 'index'])->name('listetudiant');
Route::get('/etudiants/search/scolarite', [ListetudiantController::class, 'search'])->name('etudiant.search.scolarite');
Route::get('/demandescolarite', [DemandeScolariteController::class, 'index'])->name('demandescolarite');
Route::get('/demandescolarite/search', [DemandeScolariteController::class, 'search'])->name('demandescolarite.search');
Route::get('/reclamationscolarite/search', [ReclamationScolariteController::class, 'search'])->name('reclamationscolarite.search');
Route::get('/reclamationscolarite', [ReclamationScolariteController::class, 'index'])->name('reclamationscolarite');
Route::get('/paiementscolarite/search', [PaiementScolariteController::class, 'search'])->name('paiementscolarite.search');
Route::get('/paiementscolarite', [PaiementScolariteController::class, 'index'])->name('paiementscolarite');


Route::get('/Profil_etudiant', [Profil_etudiantController::class, 'index'])->name('Profil_etudiant');


//PROF
Route::get('/cahiertextprof', [CahierTextProfController::class, 'index'])->name('cahiertextprof');
Route::get('/Presence', [ PresenceProfController::class, 'index'])->name('PresenceEtudiant');
Route::post('/telecharger-fichier', [FormtelechargerController::class, 'telechargerFichier'])->name('telecharger.fichier');


Route::post('/enregistrercahiertext', 'App\Http\Controllers\FormtelechargerController@enregistrercahiertext')->name('enregistrercahiertext');




Route::get('/search', [ListePresenceController::class, 'search'])->name('listepresence.search');



Route::get('/etudiants', [ListePresenceController::class, 'indexx'])->name('listetudiants');
Route::get('/ajoute-etudiant', [ListePresenceController::class, 'indexx'])->name('listetudiants');
route::get('/notificationsexame','App\Http\Controllers\NotifactionsexamController@index')->name('notificationsexam');


Route::post('/notificationsexame', 'App\Http\Controllers\NotifactionsexamController@enregistrercahiertext')->name('enregnotificationsexam');


Route::post('/enregistrer-exam', 'App\Http\Controllers\NotifactionsexamController@enregistrerPaiement')->name('enregnotificationsexam');
Route::get('/Note_etudiants', [NoteProfController::class, 'index'])->name('noteetudiants');

Route::get('/Note_etudiants', [NoteProfController::class, 'index'])->name('noteetudiants');
Route::get('/Note_etudiants_Ajoute', [AjouteNoteController::class, 'indexx'])->name('Ajouternoteetudiants');
//Route::get('/search', [AjouteNoteController::class, 'search'])->name('ajouternote.search');





Route::post('/ajouter-etudiant', [ListetudiantController::class, 'ajouterEtudiant'])->name('ajouter.etudiant');


Route::delete('/etudiant/{CNE}', [ListetudiantController::class, 'supprimerEtudiant'])->name('supprimer.etudiant');
Route::post('/modifier-etudiant', [ListetudiantController::class, 'modifierEtudiant'])->name('modifier.etudiant');
Route::get('fetchetudiants', [ListetudiantController::class, 'fetchEtudiants'])->name('getDataEtudients');
Route::post('/update-notes', [AjouteNoteController::class, 'updateNotes'])->name('update.notes');
Route::get('fetch-etudiants', [AjouteNoteController::class, 'fetchEtudiants'])->name('fetch.etudiants');
Route::get('demadnescolariteetudiants', [DemandeScolariteController::class, 'demandeEtudiants'])->name('getDataDemande');
Route::get('/historiqueprofesseur/search', [HistoriqueprofController::class, 'fetchHistorique'])->name('hisroriqueprofesseur');
Route::get('/historiqueprof', [HistoriqueprofController::class, 'index'])->name('historiqueprof');

//Route::put('/etudiant/{id}', 'AjouteNoteController@update')->name('etudiant.update');

//Route::put('/etudiants/{id}/edit', [AjouteNoteController::class, 'update'])->name('etudiant.update');

// Route pour récupérer les étudiants (utilisée par DataTables)
//Route::get('/fetch-etudiants', [AjouteNoteController::class, 'fetchEtudiants'])->name('fetch.etudiants');


//Route::get('/ajoutenote', [AjouteNoteController::class, 'indexx'])->name('ajoutenote.index');
//Route::get('/fetch/etudiants', [AjouteNoteController::class, 'fetchEtudiants'])->name('fetch.etudiants');
//Route::put('/etudiant/update/{id}', [AjouteNoteController::class, 'update'])->name('etudiant.update');

Route::get('/fetch-etudiants', [AjouteNoteController::class, 'indexx'])->name('fetch.etudiants');
Route::get('/fetch', [AjouteNoteController::class, 'index'])->name('fetch');


Route::get('reclamationscolariteetudiants', [ReclamationScolariteController::class, 'reclamationEtudiants'])->name('getDataReclamation');
Route::get('paiementscolariteetudiants', [PaiementScolariteController::class, 'paiementEtudiants'])->name('getDataPaiement');

//Route::put('/etudiants/{id}/edit', [AjouteNoteController::class, 'update'])->name('etudiant.update');

// Route pour récupérer les étudiants (utilisée par DataTables)
//Route::get('/fetch-etudiants', [AjouteNoteController::class, 'fetchEtudiants'])->name('fetch.etudiants');


//Route::get('/ajoutenote', [AjouteNoteController::class, 'indexx'])->name('ajoutenote.index');
//Route::get('/fetch/etudiants', [AjouteNoteController::class, 'fetchEtudiants'])->name('fetch.etudiants');
//Route::put('/etudiant/update/{id}', [AjouteNoteController::class, 'update'])->name('etudiant.update');

Route::get('/fetch-etudiants', [AjouteNoteController::class, 'indexx'])->name('fetch.etudiants');
Route::get('/fetch', [AjouteNoteController::class, 'index'])->name('fetch');
Route::post('/update-etudiant', [ListetudiantController::class, 'updateEtudiant'])->name('update-etudiant');
Route::post('/delete-etudiant', 'ListetudiantController@deleteEtudiant')->name('delete-etudiant');
Route::post('/ajouter-etudiant', [ListetudiantController::class,'ajouterEtudiant'])->name('ajouter.etudiant');
Route::post('/ajouter-Personnel', [RhPersonnelControlleur::class,'ajouterPersonnel'])->name('ajouter-Personnel');

Route::post('/delete-Personnel', [RhPersonnelControlleur::class, 'deletePersonne'])->name('delete-Personnel');

Route::post('/update-Personnel', [RhPersonnelControlleur::class, 'updatePersonne'])->name('update-Personnel');
Route::get('fetch-Personnel', [RhPersonnelControlleur::class, 'fetchPersonnel'])->name('getDataPersonnel');
Route::get('/Personnel', [RhPersonnelControlleur::class, 'index'])->name('listPersonnel');