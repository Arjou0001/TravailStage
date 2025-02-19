<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-custom">

<!-- Bannière -->
<div class="banner">
    <div class="banner-overlay">
        <h1>Articles</h1>
    </div>
</div>

<!-- Message de succès -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Bouton ajouter article -->
<a href="{{ route('articles.create') }}" class="add-article-btn">
    Ajouter un nouvel article
</a>

<!-- Carrousel d'articles -->
@if($carouselArticles->isNotEmpty())
<div class="carousel-container">
    <button class="prev" onclick="scrollCarousel(-1)">❮</button>
    <div class="carousel">
        @foreach($carouselArticles as $article)
            <div class="carousel-item">
                <article>
                    <h2>{{ $article->titre }}</h2>
                    <p>{{ Str::limit($article->description, 100) }}</p>
                    <div class="article-buttons">
                        <a href="{{ route('articles.show', $article->id) }}" class="blue">Lire</a>
                        <a href="{{ route('articles.edit', $article->id) }}" class="yellow">Éditer</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="red">Supprimer</button>
                        </form>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
    <button class="next" onclick="scrollCarousel(1)">❯</button>
</div>
@endif

<!-- Liste des articles -->
@if($paginatedArticles->isNotEmpty())
    <div class="articles-list">
        @foreach($paginatedArticles as $article)
            <article class="article-item">
                <h2>{{ $article->titre }}</h2>
                <p>{{ Str::limit($article->description, 100) }}</p>
                <div class="article-buttons">
                    <a href="{{ route('articles.show', $article->id) }}" class="blue">Lire</a>
                    <a href="{{ route('articles.edit', $article->id) }}" class="yellow">Éditer</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="red">Supprimer</button>
                    </form>
                </div>
            </article>
        @endforeach
    </div>

    <!-- Pagination manuelle -->
    <div class="pagination">
        @if ($currentPage > 1)
            <a href="{{ route('articles.index', ['page' => $currentPage - 1]) }}" class="page-link prev">❮</a>
        @endif

        @for ($i = 1; $i <= $totalPages; $i++)
            <a href="{{ route('articles.index', ['page' => $i]) }}" class="page-link">{{ $i }}</a>
        @endfor

        @if ($currentPage < $totalPages)
            <a href="{{ route('articles.index', ['page' => $currentPage + 1]) }}" class="page-link next">❯</a>
        @endif
    </div>
@else
    <p>Aucun article trouvé.</p>
@endif


<script>
    function scrollCarousel(direction) {
        let carousel = document.querySelector('.carousel');
        let scrollAmount = 300;
        carousel.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    }
</script>

</body>
</html>
