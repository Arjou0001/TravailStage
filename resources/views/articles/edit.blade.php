<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'article</title>
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
    </style>
</head>
<body>

    <div class="container">
        <h1>Modifier l'article</h1>

        <form action="{{ route('articles.update', $article->id) }}" method="POST" class="form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" name="titre" value="{{ old('titre', $article->titre) }}" required class="input-field">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" required class="textarea-field">{{ old('description', $article->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="context">Contexte</label>
                <textarea name="context" class="textarea-field">{{ old('context', $article->context) }}</textarea>
            </div>

            <div class="form-group">
                <label for="instruction">Instructions</label>
                <textarea name="instruction" class="textarea-field">{{ old('instruction', $article->instruction) }}</textarea>
            </div>

            <button type="submit" class="submit-button">Mettre à jour</button>
        </form>

        <a href="{{ route('articles.index') }}" class="back-link">Retour</a>
    </div>

</body>
</html>
