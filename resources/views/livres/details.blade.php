<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <title>Détails du livre</title>

    <style>
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #e84118;
            padding-top: 60px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            margin-top: 20px;
        }
        box-icon {
            margin-right: 12px;
            height: auto;
            width: 20px;
        }
        a:hover {
            text-decoration: none;
        }
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            display: flex;
            gap: 50px;
            margin: 50px auto;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .image-container {
            flex: 0 0 350px;
        }

        .image-top {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .details-container {
            flex: 1;
        }

        .details-container p {
            margin: 10px 0;
        }

        .details-container .title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .details-container .box {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    
<div class="sidebar">
    <a href=""><h2>BiblioTech</h2></a>
    <a href="/index"><box-icon name='home-smile' type='solid' color='#ffffff'></box-icon>Espace personnel</a>
    <a href="/index"><box-icon name='book' type='solid' color='#ffffff'></box-icon>Livres</a>
    <a href="/listecategorie"><box-icon name='library' color='#ffffff'></box-icon>Catégories</a>
    <a href="/listerayon"><box-icon name='folder-open' color='#ffffff'></box-icon>Rayon</a>
    <a href="{{route('ajout')}}"><box-icon name='book-add' color='#ffffff'></box-icon>Ajouter un livre</a>
</div>
    <div class="container">
        <div class="image-container">
            <img src="{{$livre->url}}" alt="Image du livre" class="image-top">
        </div>
        <div class="details-container">
            <p class="title">{{$livre->titre}}</p>
            <div class="box">
                <p><strong>Éditeur:</strong> {{$livre->editeur}}</p>
                <p><strong>Nombre de pages:</strong> {{$livre->page}}</p>
                <p><strong>ISBN:</strong> {{$livre->isbn}}</p>
                <p><strong>Date de publication:</strong> {{$livre->publication}}</p>
                <p><strong>Rayon:</strong> {{$livre->rayon}}</p>
            </div>
            <div class="box">
                <p><strong>Description:</strong></p>
                <p>{{$livre->description}}</p>
                <div style="display: flex; gap: 10px;">
    <a href="/editerlivre/{{$livre->id}}">
        <box-icon name='edit-alt' type='solid' color='#ee5a24'></box-icon>
    </a>
      <form action="{{ url('supprimerlivre', $livre->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-outline-secondary"><box-icon type='solid' name='message-alt-x'color='#ee5a24'></box-icon></button>
        </form>
        </div>
            </div>
            

        </div>
        
    </div>
</body>
</html>
