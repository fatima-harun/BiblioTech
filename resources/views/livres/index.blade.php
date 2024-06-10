<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioTech</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container-fluid{
            display:flex
        }
        
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
        .form-control {
            border-radius: 20px;
            padding-right: 600px;
        }
        .card-item {
            color: #e84118;
            padding-left: 10px;
            padding-top: 5px;
        }
        h3 {
            margin-left: 40px;
            margin-top: 35px;
            color: #808e9b;
        }
        .livre {
            display: flex;
            flex-wrap: wrap; /* Permet aux éléments de passer à la ligne */
            margin-left: 40px;
            margin-top: 30px;
            gap: 45px;
        }
        .image-top {
            width: 220px;
            height: 320px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
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

<div class="content">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="rechercher" aria-label="Search">
            </form>
            <div><h5>Bonjour, {{ $user->nom}}  {{ $user->prenom}}</h5></div>
        </div>
    </nav>
    <h3>Liste des livres</h3>
    <div class="livre">
        @foreach($livres as $livre)
        <a href="detailsLivre/{{$livre->id}}">
            <div class="mb-4"> <!-- Ajout de la classe mb-4 pour un espace entre les cartes -->
                <img src="{{$livre->url}}" alt="" class="image-top">
                <div class="card-item">
                    <h6>{{$livre->titre}}</h6>
                    <h6>{{$livre->auteur}}</h6>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
