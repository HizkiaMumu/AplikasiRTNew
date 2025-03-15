<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TemplateSuratController;
use App\Http\Controllers\TemplateKeywordController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\RatingController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/logout', [AuthController::class, 'signOut']);

    Route::get('/dashboard', [PagesController::class, 'dashboardPage']);
    
    Route::get('/users', [PagesController::class, 'usersPage']);
    
    Route::post('/users/create', [UserController::class, 'createUser']);
    
    Route::post('/users/edit/{id}', [UserController::class, 'editUser']);
    
    Route::get('/users/delete/{id}', [UserController::class, 'deleteUser']);
    
    Route::get('/template-surat', [PagesController::class, 'templateSuratPage']);
    
    Route::post('/template-surat/create', [TemplateSuratController::class, 'createTemplate']);
    
    Route::post('/template-surat/edit/{id}', [TemplateSuratController::class, 'editTemplate'])->name('template-surat.update');
    
    Route::get('/template-surat/delete/{id}', [TemplateSuratController::class, 'deleteTemplate']);
    
    Route::get('/template-keywords/{template_surat_id}', [TemplateKeywordController::class, 'index'])->name('template-keywords.index');
    
    Route::post('/template-keywords/create', [TemplateKeywordController::class, 'create'])->name('template-keywords.create');
    
    Route::post('/template-keywords/edit/{id}', [TemplateKeywordController::class, 'edit'])->name('template-keywords.update');
    
    Route::get('/template-keywords/delete/{id}', [TemplateKeywordController::class, 'delete'])->name('template-keywords.delete');
    
    Route::resource('surat', SuratController::class)->except(['show']); // Using resource route to handle CRUD
    
    Route::get('/surat/{id}/isi-data', [PagesController::class, 'isiDataSuratPage']);
    
    Route::post('/surat/{id}/isi-data', [SuratController::class, 'isiData']);
    
    Route::get('/surat/{id}/approve', [SuratController::class, 'approveSurat']);
    
    Route::post('/surat/{id}/reject', [SuratController::class, 'rejectSurat'])->name('surat.reject');

    Route::post('ratings/{templateSuratId}', [RatingController::class, 'store'])->name('ratings.store');

});

Route::get('/login', [PagesController::class, 'loginPage'])->name('login');

Route::post('/login', [AuthController::class, 'signIn']);

Route::get('/register', [PagesController::class, 'registerPage']);

Route::post('/register', [AuthController::class, 'signUp']);