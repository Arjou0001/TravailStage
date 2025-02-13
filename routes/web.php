<?php
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Models\Article; // Importation du modèle Article

Route::resource('articles', ArticleController::class);

Route::get('/', function () {
    $articles = Article::all(); // Récupère tous les articles
    return view('articles.index', compact('articles')); // Passe $articles à la vue
});



