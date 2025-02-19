<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        // Nombre d'articles par page
        $perPage = 6;
    
        // Récupérer la page actuelle ou définir la première page par défaut
        $currentPage = $request->page ?? 1;
    
        // Récupérer les articles paginés
        $paginatedArticles = Article::orderBy('created_at', 'desc')
                                    ->skip(($currentPage - 1) * $perPage)
                                    ->take($perPage)
                                    ->get();
    
        // Récupérer le nombre total d'articles
        $totalArticles = Article::count();
    
        // Calculer le nombre total de pages
        $totalPages = ceil($totalArticles / $perPage);
    
        // Récupérer les articles pour le carrousel (par exemple, les 3 premiers articles)
        $carouselArticles = Article::orderBy('created_at', 'desc')
                                    ->take(5) // Limiter à 3 articles pour le carrousel
                                    ->get();
    
        return view('articles.index', compact('paginatedArticles', 'totalPages', 'currentPage', 'carouselArticles'));
    }
    



    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'context' => 'required|string',
            'instruction' => 'required|string',
        ]);

        Article::create($validated);
        return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès.');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'context' => 'required|string',
            'instruction' => 'required|string',
        ]);

        $article = Article::findOrFail($id);
        $article->update($validated);
        return redirect()->route('articles.index')->with('success', 'Article mis à jour.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé.');
    }
}
