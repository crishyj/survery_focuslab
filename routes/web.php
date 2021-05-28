<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleValid;

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
    return view('welcome');
});

Route::get('/answer/{id}', [App\Http\Controllers\AnswerContoller::class, 'index'])->name('answerSurvey');
Route::post('/answer/{id}', [App\Http\Controllers\AnswerContoller::class, 'checkCode'])->name('checkCode');
Route::post('/suranswer', [App\Http\Controllers\AnswerContoller::class, 'suranswer'])->name('suranswer');
Route::post('/queanswer', [App\Http\Controllers\AnswerContoller::class, 'queanswer'])->name('queanswer');
Route::post('/addanswer', [App\Http\Controllers\AnswerContoller::class, 'addanswer'])->name('addanswer');


Auth::routes();


// Route::get('/guest', [App\Http\Controllers\ClientController::class, 'index'])->name('guest');
Route::get('/guest', [App\Http\Controllers\ClientController::class, 'viewSurvey'])->name('guest');
Route::get('/detailSurvey/{id}', [App\Http\Controllers\ClientController::class, 'detailSurvey'])->name('detailSurvey');
Route::get('/surveyReport/{id}', [App\Http\Controllers\ClientController::class, 'surveyReport'])->name('surveyReport');


Route::group(['middleware' => ['Role']], function () {
    Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
    Route::get('/createClient', [App\Http\Controllers\AdminController::class, 'createClient'])->name('createClient');
    Route::post('/createClient', [App\Http\Controllers\AdminController::class, 'storeClient'])->name('storeClient');
    Route::get('/viewClient', [App\Http\Controllers\AdminController::class, 'viewClient'])->name('viewClient');
    Route::get('/viewClient/{id}', [App\Http\Controllers\AdminController::class, 'clientDelete'])->name('clientDelete');
    
    Route::get('/createCulture', [App\Http\Controllers\AdminController::class, 'createCulture'])->name('createCulture');
    Route::post('/createCulture', [App\Http\Controllers\AdminController::class, 'storeCulture'])->name('storeCulture');
    Route::get('/viewCulture', [App\Http\Controllers\AdminController::class, 'viewCulture'])->name('viewCulture');
    Route::post('/viewCulture', [App\Http\Controllers\AdminController::class, 'updateCulture'])->name('updateCulture');
    Route::get('/viewCulture/{id}', [App\Http\Controllers\AdminController::class, 'cultureDelete'])->name('cultureDelete');
    
    Route::get('/createModel', [App\Http\Controllers\AdminController::class, 'createModel'])->name('createModel');
    Route::post('/createModel', [App\Http\Controllers\AdminController::class, 'storeModel'])->name('storeModel');
    Route::get('/viewModel', [App\Http\Controllers\AdminController::class, 'viewModel'])->name('viewModel');
    Route::post('/viewModel', [App\Http\Controllers\AdminController::class, 'updateModel'])->name('updateModel');
    Route::get('/viewModel/{id}', [App\Http\Controllers\AdminController::class, 'modelDelete'])->name('modelDelete');

    Route::get('/createComponent', [App\Http\Controllers\AdminController::class, 'createComponent'])->name('createComponent');
    Route::post('/createComponent', [App\Http\Controllers\AdminController::class, 'storeComponent'])->name('storeComponent');
    Route::get('/viewComponent', [App\Http\Controllers\AdminController::class, 'viewComponent'])->name('viewComponent');
    Route::post('/viewComponent', [App\Http\Controllers\AdminController::class, 'updateComponent'])->name('updateComponent');
    Route::get('/viewComponent/{id}', [App\Http\Controllers\AdminController::class, 'componentDelete'])->name('componentDelete');
    
    Route::get('/createAttribute', [App\Http\Controllers\AdminController::class, 'createAttribute'])->name('createAttribute');
    Route::post('/createAttribute', [App\Http\Controllers\AdminController::class, 'storeAttribute'])->name('storeAttribute');
    Route::get('/viewAttribute', [App\Http\Controllers\AdminController::class, 'viewAttribute'])->name('viewAttribute');
    Route::post('/viewAttribute', [App\Http\Controllers\AdminController::class, 'updateAttribute'])->name('updateAttribute');
    Route::get('/viewAttribute/{id}', [App\Http\Controllers\AdminController::class, 'attributeDelete'])->name('attributeDelete');

    Route::get('/createProject', [App\Http\Controllers\AdminController::class, 'createProject'])->name('createProject');
    Route::post('/createProject', [App\Http\Controllers\AdminController::class, 'storeProject'])->name('storeProject');
    Route::get('/viewProject', [App\Http\Controllers\AdminController::class, 'viewProject'])->name('viewProject');
    Route::post('/viewProject', [App\Http\Controllers\AdminController::class, 'updateProject'])->name('updateProject');
    Route::get('/viewProject/{id}', [App\Http\Controllers\AdminController::class, 'projectDelete'])->name('projectDelete');
    
    Route::get('/createEvalution', [App\Http\Controllers\AdminController::class, 'createEvalution'])->name('createEvalution');
    Route::post('/createEvalution', [App\Http\Controllers\AdminController::class, 'storeEvalution'])->name('storeEvalution');
    Route::get('/viewEvalution', [App\Http\Controllers\AdminController::class, 'viewEvalution'])->name('viewEvalution');
    Route::post('/viewEvalution', [App\Http\Controllers\AdminController::class, 'updateEvalution'])->name('updateEvalution');
    Route::get('/viewEvalution/{id}', [App\Http\Controllers\AdminController::class, 'evalutionDelete'])->name('evalutionDelete');
     
    Route::get('/createModelanalysis', [App\Http\Controllers\AdminController::class, 'createModelanalysis'])->name('createModelanalysis');
    Route::post('/createModelanalysis', [App\Http\Controllers\AdminController::class, 'storeModelanalysis'])->name('storeModelanalysis');
    Route::get('/viewModelanalysis', [App\Http\Controllers\AdminController::class, 'viewModelanalysis'])->name('viewModelanalysis');
    Route::post('/viewModelanalysis', [App\Http\Controllers\AdminController::class, 'updateModelanalysis'])->name('updateModelanalysis');
    Route::get('/viewModelanalysis/{id}', [App\Http\Controllers\AdminController::class, 'modelanalysisDelete'])->name('modelanalysisDelete');

    Route::get('/parameters', [App\Http\Controllers\AdminController::class, 'parameters'])->name('parameters');

    Route::get('/createSurvey', [App\Http\Controllers\AdminController::class, 'createSurvey'])->name('createSurvey');
    Route::post('/createSurvey', [App\Http\Controllers\AdminController::class, 'storeSurvey'])->name('storeSurvey');
    Route::post('/storeQuestion', [App\Http\Controllers\AdminController::class, 'storeQuestion'])->name('storeQuestion');
    Route::post('/storeAddquestion', [App\Http\Controllers\AdminController::class, 'storeAddquestion'])->name('storeAddquestion');
    Route::get('/viewSurvey', [App\Http\Controllers\AdminController::class, 'viewSurvey'])->name('viewSurvey');
    Route::get('/viewSurvey/{id}', [App\Http\Controllers\AdminController::class, 'surveyDetail'])->name('surveyDetail');
    Route::get('/viewSurvey/{id}/delete', [App\Http\Controllers\AdminController::class, 'surveyDelete'])->name('surveyDelete');

    
});

