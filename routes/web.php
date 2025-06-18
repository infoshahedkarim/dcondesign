<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DconController;





Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/projects', function () {
    return view('frontend.projects');
})->name('projects');

Route::get('/architecture', function () {
    return view('frontend.archi');
})->name('architecture');

Route::get('/details', function () {
    return view('frontend.details');
})->name('details');








Route::get('/form', function () {
    return view('backend.form-layouts');
});

Route::get('/invoice', function () {
    return view('backend.icons-boxicons');
});

Route::get('/invoice/list', function () {
    return view('backend.invoices-list');
});

Route::get('/icon', function () {
    return view('backend.icons-evaicons');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/index', function () {
        return view('index');
    })->name('index');


});

Route::get('/user', [AdminController::class, 'index']);
Route::get('/admin', [AdminController::class, 'admin'])->name('back.index')->middleware(['auth','admin']);


Route::post('/send-mail',[DconController    ::class, 'getmsg'])->name('email.store');




