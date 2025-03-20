<?php

use App\Http\Controllers\BlogController;
use App\Livewire\Form;
use App\Http\Controllers\PagesController;
use Aws\S3\S3Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

Route::get('form', Form::class);
Route::get('/', [PagesController::class, 'index'])->name('home');

Route::get('/about-me/', [PagesController::class, 'about'])->name('about');
Route::get('/projects/', [PagesController::class, 'projects'])->name('project');
Route::get('/project/{slug}', [PagesController::class, 'projectDetails'])->name('project.show');
Route::get('/contact/', [PagesController::class, 'contact'])->name('contact');

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index'); // Blog homepage
    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show'); // Single post
    Route::get('/category/{slug}', [BlogController::class, 'category'])->name('blog.category'); // Category page
    Route::get('/search', [BlogController::class, 'search'])->name('blog.search'); // Search page
});
