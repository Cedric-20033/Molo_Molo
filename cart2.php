<?php  
include("./backend/fonction.php");
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'getproduct' && isset($_POST['id'])){
    $product = select_product($_POST['id']);
    echo json_encode($product);
    exit;
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
    <link rel="stylesheet" href="./frontend/cart.css">
    <title>Molo Molo</title>
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
                    <a href="./shop.php" class="nav-link active">Boutique</a>
                </li>
                <li class="navbar-item">
                    <a href="./epargne.php" class="nav-link">Epargne</a>
                </li>
                <li class="navbar-item">
                    <a href="./contact.php" class="nav-link">Nous contater</a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link" ><li class="fas fa-search" style="cursor: pointer; color: white"></li></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link"><li class="fas fa-shopping-cart" style="cursor: pointer"></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link" ><li class="fas fa-user" style="cursor: pointer; color: white"></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link" ><li class="fas fa-sign-in-alt" style="cursor: pointer; color: white"></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link" ><li class="fas fa-sign-out-alt" style="cursor: pointer; color: white"></a>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        alert(window.ok);
    </script>

    <?php 
        /*if(isset($_GET['sign']) && $_GET['sign']=='up'){
            include("frontend/inscription.php");
        }else{
            include("./frontend/connexion.php");
        }*/

        
        include("./frontend/footer.php")
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="frontend/cart2.js"></script>
    
</body>
</html>