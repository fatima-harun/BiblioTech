<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Vertical Dashboard</title>
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
            /* overflow-x: hidden; */
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            margin-top:20px
        }
        box-icon{
            margin-right:12px;
          
            height:auto;
            width:20px
        }
        .form-control{
            border-radius:20px;
            padding-right:600PX
        }
        .card-item{
            border-style:solid;
            border-width:thin;
            background-color:#a4b0be;
            color:#ffffff;
            padding-left:10px;
            padding-top:5px
        }
       
       .livre{
        display:flex;
        margin-left:40px;
        margin-top:30px;
        gap:20px
    }
    .image-top{
        width: 220px;
        height:320px
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
    <a href="#"> <box-icon name='home-smile' type='solid' color='#ffffff' ></box-icon>Espace personnel</a>
    <a href="#"><box-icon name='book' type='solid' color='#ffffff' ></box-icon>Livres</a>
    <a href="#"><box-icon name='library'color='#ffffff'></box-icon>Catégories</a>
    <a href="#"><box-icon name='folder-open'color='#ffffff'></box-icon>Rayon</a>
    <a href="{{route('ajout')}}"><box-icon name='book-add' color='#ffffff' ></box-icon>Ajouter un livre</a>
    <a href="#" ><box-icon name='log-out-circle' color='#ffffff' ></box-icon>Déconnexion</a>
</div>

<div class="content">
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="rechercher" aria-label="Search" >
      
    </form>
  </div>
</nav>
<h2>Liste des livres</h2>
<div class="livre">
    @foreach($livres as $livre)
    <div >
        <img src="{{$livre->url}}" alt="" class="image-top">
        <div class="card-item">
            <h6>{{$livre->titre}}</h6>
            <h6>{{$livre->auteur}}</h6>
        </div>
    </div>
    @endforeach
</div>
  

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
