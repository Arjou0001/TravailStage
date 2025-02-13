<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black">
<h1>Articles</h1>
<a href="{{ route('articles.create') }}" class="flex justify-between items-center font-bold text-orange-700 px-4 py-4 rounded-full bg-slate-300  hover:bg-slate-50 hover:scale-110 transition-all">Ajouter un nouvel article</a>

@if ($articles->isEmpty())
    <p class= "text-white">Aucun article trouvé.</p>
@else
    <ul>
        @foreach($articles as $article)
            <li>
            {{-- Corps de la page avec les articles --}}
       
                    
                {{-- Article --}}
                <article class="flex flex-col lg:flex-row pb-8 md:pb-4 border-b border-slate-50      bg-white/10 backdrop-blur-md border border-white/20 rounded-lg p-6 shadow-lg lg:hover:translate-x-10 lg:hover:scale-100 hover:scale-105 transition-all antialiased mx-6 my-6">

                    {{-- Texte --}}
                    <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12">
                        <h1 class="font-bold text-3xl  text-slate-50 ">{{ $article->titre }}</h1>
                        <p class="text-justify text-xl">{{ $article->description }}.</p>
                        <a href="{{ route('articles.show', $article->id) }}" class="flex justify-between items-center font-bold text-orange-700 px-4 py-4 rounded-full bg-slate-300  hover:bg-slate-50 hover:scale-110 transition-all">
                            Lire l'article
                        </a>
                        <a href="{{ route('articles.edit', $article->id) }}" class="flex justify-between items-center font-bold text-orange-700 px-4 py-4 rounded-full bg-slate-300  hover:bg-slate-50 hover:scale-110 transition-all">Éditer</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex justify-between items-center font-bold text-orange-700 px-4 py-4 rounded-full bg-slate-300  hover:bg-slate-50 hover:scale-110 transition-all">Supprimer</button>
                        </form>
                    </div>
                </article>
            </li>
        @endforeach
    </ul>
@endif

</body>
</html>

