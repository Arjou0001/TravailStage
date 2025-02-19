<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un article</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: #333;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            margin: 40px auto;
            max-width: 800px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .input-field,
        .textarea-field {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            color: #333;
        }

        .textarea-field {
            height: 150px;
        }

        .submit-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
            border: 2px solid #007bff;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }

        .back-link:hover {
            background-color: #007bff;
            color: #fff;
        }

        .error-message {
            color: #ff0000;
            font-size: 14px;
            margin-top: 5px;
        }

        .bg-red {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Créer un article</h1>

        <!-- Affichage des erreurs -->
        @if ($errors->any())
            <div class="bg-red">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error-message">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire de création d'article -->
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" class="input-field @error('titre') border-red-500 @enderror" value="{{ old('titre') }}" required>
                @error('titre')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="textarea-field @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="context">Contexte</label>
                <textarea name="context" id="context" class="textarea-field @error('context') border-red-500 @enderror">{{ old('context') }}</textarea>
                @error('context')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="instruction">Instructions</label>
                <textarea name="instruction" id="instruction" class="textarea-field @error('instruction') border-red-500 @enderror">{{ old('instruction') }}</textarea>
                @error('instruction')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="submit-button">Créer l'article</button>
        </form>

        <a href="{{ route('articles.index') }}" class="back-link">Retour</a>
    </div>

</body>
</html>
