<?php
include("./backend/fonction.php");
if(!isset($_SESSION['id_user']) || $_SESSION['id_user']==''){
    header("location: ./index.php?sign='in'");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inclure les liens vers les fichiers CSS Bootstrap -->
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Molo Molo</title>
    <link rel="stylesheet" href="./frontend/proiles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
        <a href="#" class="navbar-brand">Molo Molo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
                <li class="navbar-item">
                    <a href="./" class="nav-link">Accueil</a>
                </li>
                <li class="navbar-item">
                    <a href="./shop.php" class="nav-link">Boutique</a>
                </li>
                <li class="navbar-item">
                    <a href="./epargne.php" class="nav-link">Epargne</a>
                </li>
                <li class="navbar-item">
                    <a href="" class="nav-link">Nous contater</a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link"><li class="fas fa-search" style="cursor: pointer; color: white"></li></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link"><li class="fas fa-shopping-cart" style="cursor: pointer; color: white"></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="profiles.php" class="nav-link"><li class="fas fa-user" style="cursor: pointer; color: white"></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link"><li class="fas fa-sign-in-alt" style="cursor: pointer; color: white"></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="./frontend/user_session.php" class="nav-link"><li class="fas fa-sign-out-alt" style="cursor: pointer; color: white"></a>
                </li>
            </ul>
        </div>
    </nav><br><br>

    <div class="container">
    <div class="menu-item">
        <a href="#" data-toggle="modal" data-target="#modal" data-url="profil2.php">
            <span>Mon profil</span>
            <i class="fas fa-user"></i>
        </a>
    </div>
    <div class="menu-item">
        <a href="#" data-toggle="modal" data-target="#modal" data-url="objectif.php">
            <span>Mes Objectifs</span>
            <i class="fas fa-tags"></i>
        </a>
    </div>
    <div class="menu-item">
        <a href="#" data-toggle="modal" data-target="#modal" data-url="historique_retrait.php">
            <span>Historiques des retraits</span>
            <i class="fas fa-store"></i>
        </a>
    </div>
    <div class="menu-item">
        <a href="#" data-toggle="modal" data-target="#modal" data-url="vendeur.php">
            <span>Suggérer un vendeur</span>
            <i class="fas fa-store-alt"></i>
        </a>
    </div>
    <div class="menu-item">
        <a href="#" data-toggle="modal" data-target="#modal" data-url="modifier_profil.php">
            <span>Modifier mon profil</span>
            <i class="fas fa-edit"></i>
        </a>
    </div>
    <div class="menu-item">
        <a href="#" data-toggle="modal" data-target="#modal" data-url="politique.php">
            <span>Politique de confidentialité</span>
            <i class="fas fa-shield-alt"></i>
        </a>
    </div>
    <div class="menu-item text-danger">
        <a href="./frontend/user_session.php">
            <span>Se déconnecter</span>
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Détail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Contenu chargé dynamiquement -->
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    $('#modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var url = button.data('url');
        var modal = $(this);
        $.ajax({
            url: url,
            success: function(data) {
                modal.find('.modal-body').html(data);
            }
        });
    });

</script>

<script src="frontend/profiles.js"></script>
    
</body>
</html>