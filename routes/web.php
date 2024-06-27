<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantControlleur;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


Route::get('/documentation', function () {
    return view('documentation');
});
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

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/aseho/{id}',[EtudiantControlleur::class,'aseho_appel']);
// Route::post('/addcours/traitement',[EtudiantControlleur::class,'ajouter_etudiant_cours']);
// Route::get('/addcourset',[EtudiantControlleur::class,'affichage_coursetd']);
// Route::get('/cours/{id}',[EtudiantControlleur::class,'cours_edudiant']);
// Route::get('/cas/{id}',[EtudiantControlleur::class,'cas_et']);
// Route::get('/deleteetudiant/{id}',[EtudiantControlleur::class,'delete_etudiant']);
// Route::get('/updateetudiant/{id}',[EtudiantControlleur::class,'update_etudiant']);
// Route::get('/etudiant',[EtudiantControlleur::class,'affichage_etudiant']);
// Route::get('/ajouter',[EtudiantControlleur::class,'ajouter_etudiant']);
// Route::post('/ajouter/traitement',[EtudiantControlleur::class,'ajouter_etudiant_traitement']);
// Route::post('/etudiant/rechercher', [EtudiantControlleur::class, 'rechercher_etudiant']);
// Route::post('/update/traitement', [EtudiantControlleur::class, 'update_etudiant_traitement']);
// Route::get('/pre', [EtudiantControlleur::class, 'gerer_presence'])->name('gerer_presence');
// Route::get('/Presence/{id}', [EtudiantControlleur::class, 'AfficheEtd_in_cours'])->name('cours.presence');
// Route::get('/mamafa/{id}',[EtudiantControlleur::class,'mamafa_cours']);
// Route::post('/insertpre',[EtudiantControlleur::class,'present_cours']);
// Route::get('/presenEtd',[EtudiantControlleur::class,'affichage_et_present']);
// Route::get('/absentEtd',[EtudiantControlleur::class,'affichage_et_absent']);
// Route::get('/absent/{id}',[EtudiantControlleur::class,'absence_etudiant']);
