<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

// Route principale affichant la liste des articles
Route::get('/', [ArticleController::class, 'index'])->name('articles.index');

// Routes RESTful pour les articles
Route::resource('articles', ArticleController::class);
