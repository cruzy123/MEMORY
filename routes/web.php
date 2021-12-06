<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FrontendController;

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

Route::post('/getStatut', [FrontendController::class, 'getStatut']);
Route::post('/make-demande', [FrontendController::class, 'storeDemande']);
Route::get('/make-demande/{id}', [FrontendController::class, 'makeDemande']);
Route::get('/frontend/services', [FrontendController::class, 'services']);
Route::get('/frontend/index', [FrontendController::class, 'index']);
Route::get('/frontend/suivre', [FrontendController::class, 'suivre']);
Route::get('/', function () {
    return view('welcome');
});
Route::post('/validateDemandeAjax', [MainController::class, 'validateDemandeAjax']);
Route::post('/rejectDemandeAjax', [MainController::class, 'rejectDemandeAjax']);
Route::get('/validate/{id}', [MainController::class, 'validateDemande']);
Route::get('/reject/{id}', [MainController::class, 'rejectDemande']);
Route::post('/submitLoginAjax', [LoginController::class, 'submitLoginAjax']);
Route::get('/login', [LoginController::class, 'login']);
Route::get('index', [MainController::class, 'index']);
Route::get('demandes', [MainController::class, 'demandes']);
Route::get('view-demande/{id}', [MainController::class, 'view']);
Route::get('add-document', [MainController::class, 'addDocument']);
Route::get('documents', [MainController::class, 'documents']);
Route::get('document/{id}', [MainController::class, 'document']);
Route::get('employees', [MainController::class, 'employees']);
Route::get('add-employee', [MainController::class, 'addEmployee']);
Route::get('/read/{file}', function ($file) {

    ini_set('memory_limit', '-1');
    $filePath = 'storage/fichiers/' . urldecode($file);
    // echo $filePath;
    header('Content-type:application/pdf');
    header('Content-disposition: inline; filename="' . urldecode($file) . '"');
    header('content-Transfer-Encoding:binary');
    header('Accept-Ranges:bytes');
    @readfile($filePath);
});

Route::post('/addDocumentAjax', [MainController::class, 'addDocumentAjax']);
Route::post('/addEmployeeAjax', [MainController::class, 'addEmployeeAjax']);
