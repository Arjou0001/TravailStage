@vite(['resources/css/app.css', 'resources/js/app.js'])
<!-- Affichage des erreurs -->
@if ($errors->any())
    <div class="bg-red-500 text-white p-4 rounded-md mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Formulaire de création d'article -->
<form action="{{ route('articles.store') }}" method="POST" class="bg-white p-6 rounded-md shadow-md text-gray-900">
    @csrf

    <div class="mb-4">
        <label for="titre" class="block text-sm font-medium text-gray-700">Titre</label>
        <input type="text" name="titre" id="titre"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 @error('titre') border-red-500 @enderror"
               value="{{ old('titre') }}">
        @error('titre')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
        @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="context" class="block text-sm font-medium text-gray-700">Contexte</label>
        <textarea name="context" id="context"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 @error('context') border-red-500 @enderror">{{ old('context') }}</textarea>
        @error('context')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="instruction" class="block text-sm font-medium text-gray-700">Instruction</label>
        <textarea name="instruction" id="instruction"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 @error('instruction') border-red-500 @enderror">{{ old('instruction') }}</textarea>
        @error('instruction')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="bg-blue-600 hover:bg-slate-950 text-white font-bold py-2 px-4 rounded-md transition-all">
        Créer l'article
    </button>
</form>
