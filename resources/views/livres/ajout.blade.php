<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Livre</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
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
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 1.5rem;
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
    <h2>Ajouter un Livre</h2>

    <!-- Affichage des messages d'erreur -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/traiter" method="POST">
        @csrf
        @method('post')
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="titre" placeholder="Entrer le titre du livre" name="titre" value="{{ old('titre') }}">
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="auteur" placeholder="Entrer le nom de l'auteur" name="auteur" value="{{ old('auteur') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="editeur" placeholder="Entrer le nom de l'éditeur" name="editeur" value="{{ old('editeur') }}">
            </div>
            <div class="form-group col-md-6">
                <input type="date" class="form-control" id="publication" placeholder="Entrer la date de publication" name="publication" value="{{ old('publication') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="isbn" placeholder="Entrer l'isbn" name="isbn" value="{{ old('isbn') }}">
            </div>
            <div class="form-group col-md-6">
                <input type="number" class="form-control" id="page" placeholder="Entrer le nombre de pages" name="page" value="{{ old('page') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <select class="form-control" id="categorie_id" name="categorie_id">
                    <option value="" disabled selected>Choisir une catégorie</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
            <select class="form-control" id="rayon_id" name="rayon_id">
                    <option value="" disabled selected>Choisir un rayon</option>
                    @foreach($rayons as $rayon)
                        <option value="{{ $categorie->id }}">{{ $rayon->libelle }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
                <input type="text" class="form-control" id="image" placeholder="Entrer l'url de l'image" name="url" value="{{ old('url') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <textarea class="form-control" id="description" placeholder="Entrer le résumé du livre" name="description">{{ old('description') }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter le Livre</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
