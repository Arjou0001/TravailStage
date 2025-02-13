<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{ $article->titre }}</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   <style>
      body {
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         background-color: #333;
         margin: 0;
         padding: 0;
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
      }

      .container {
         background-color: #fff;
         box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
         border-radius: 8px;
         padding: 40px;
         width: 80%;
         max-width: 800px;
      }

      h1 {
         font-size: 36px;
         font-weight: bold;
         color: #333;
         margin-bottom: 20px;
      }

      p {
         font-size: 18px;
         line-height: 1.6;
         color: #555;
         margin-bottom: 20px;
      }

      a {
         font-size: 16px;
         color: #007bff;
         text-decoration: none;
         border: 2px solid #007bff;
         padding: 10px 20px;
         border-radius: 4px;
         font-weight: bold;
         transition: background-color 0.3s, color 0.3s;
      }

      a:hover {
         background-color: #007bff;
         color: #fff;
      }
   </style>
</head>
<body>
   <div class="container">
      <h1>{{ $article->titre }}</h1>
      <p><strong>Description:</strong> {{ $article->description }}</p>
      <p><strong>Contexte:</strong> {{ $article->context }}</p>
      <p><strong>Instructions:</strong> {{ $article->instruction }}</p>
      <a href="{{ route('articles.index') }}">Retour à la liste</a>
   </div>
</body>
</html>
