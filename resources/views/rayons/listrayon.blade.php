<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des rayons</title>
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
        .btn-categorie{
          border:none;
          background-color:#e84118;
          color:#f5f6fa;
          border-radius:10px
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
    <a href="#"><box-icon name='log-out-circle' color='#ffffff'></box-icon>Déconnexion</a>
</div>

<div class="content">
    <h2>Liste des rayons</h2>
    <a href="/rayons"> <button class="btn-categorie">Ajouter un rayon</button></a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Libelle</th>
      <th scope="col">Partie</th>
      <th scope="col">Modification</th>
      <th scope="col">Suppression</th>
    </tr>
  </thead>
  <tbody>
    @foreach($rayons as $rayon)
    <tr>
      <th scope="row">{{$rayon->id}}</th>
      <td>{{$rayon->libelle}}</td>
      <td>{{$rayon->partie}}</td>
      <td>
        <a href="/editer/{{$rayon->id}}">
        <box-icon name='edit-alt' type='solid' color='#ee5a24' ></box-icon>
        </a>
      </td>
      <td>
      <form action="{{ url('supprimer', $rayon->id) }}" method="POST" >
       @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-sm btn-outline-secondary"><box-icon type='solid' name='message-alt-x'color='#ee5a24'></box-icon></button>
      </form>
      </td>
    </tr>
    @endforeach
  </tbody>
    </table>

  
       
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
