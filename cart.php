<?php  
include("./backend/fonction.php");
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['action'])){
        if($_POST['action'] === 'getProduct' && isset($_POST['id'])){
            $product = select_product($_POST['id']);
            echo json_encode($product);
            exit;
        }elseif($_POST['action'] === 'addToCart' && isset($_POST['id']) && isset($_POST['nombre'])){
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            if(!isset($_SESSION['panier'])){
                $_SESSION['panier'] = [];
            }

            $found = false;
            foreach($_SESSION['panier'] as $item){
                if($item['id'] == $id){
                    $item['nombre'] = $nombre + 1;
                    $found = true;
                    break;
                }
            }

            if(!$found){
                $_SESSION['panier'] [] = ['id' => $id, 'nombre' => $nombre];
            }

            echo json_encode($_SESSION['panier']);
            exit;
        }elseif($_POST['action'] === 'getCart'){
            if(!isset($_SESSION['panier'])){
                $_SESSION['panier'] = [];
            }

            echo json_encode($_SESSION['panier']);
            exit;
        }elseif($_POST['action'] === 'updateCart' && isset($_POST['panier'])){
            $_SESSION['panier'] = json_decode($_POST['panier'], true);

            echo json_encode($_SESSION['panier']);
            exit;
        }
    }
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

    <div class="container mt-5 pt-5">
        <h1>panier</h1>

        <div class="row">
            <div class="col-md-8">
                <div id="cart-items">
                    <!-- ici les elements affichés par js -->
                </div>
                <div class="spinner-border" id="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cart-summary p-3 border-rounder">
                    <h5>résumé du panier</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="shippingOption" id="freeShipping" value="0" checked>
                        <label for="freeShipping" class="form-check-label">livraison gratuite 0 xaf</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="shippingOption" id="expressShipping" value="2000">
                        <label for="expressShipping" class="form-check-label">livraison rapide 2000 xaf</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="shippingOption" id="pickUp" value="2500">
                        <label for="pickUp" class="form-check-label">Retrait 2500 xaf</label>
                    </div>

                    <p class="mt-3">sous-total: <span id="subtotal">0 xaf</span></p>
                    <h5>Total: <span id="total">0 xaf</span></h5>
                    <a href="cart2.php"><button class="btn btn-dark btn-block" id="checkout">passer a la caisse</button></a>

                </div>
            </div>
        </div>

        <div class="mt-3">
            <h5>avez-vous un code promo ?</h5>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="code promo" arial-label="Coupon code" aria-describedby="applyCoupon">
                <div class="input-group-append">
                    <button class="btn btn-outline-dark" type="button" id="applyCoupon">Appliquer</button>
                </div>
            </div>
        </div>
    </div>

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
<script src="frontend/cart.js"></script>
    
</body>
</html>