<?php

use App\Livewire\Form;

\Illuminate\Support\Facades\Route::get('form', Form::class);

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('home');

Route::get('/about-me/', [PagesController::class, 'about'])->name('about');
Route::get('/projects/', [PagesController::class, 'projects'])->name('project');
Route::get('/contact/', [PagesController::class, 'contact'])->name('contact');


Route::fallback(function () {
    return view('mejba-theme-24.pages.404');
});
