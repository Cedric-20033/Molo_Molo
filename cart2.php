<?php  
include("./backend/fonction.php");
if (empty($_SESSION['panier'])) {
    echo "Votre panier est vide.";
    exit();
}
$panier = $_SESSION['panier'];

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
    <link rel="stylesheet" href="./frontend/cart2.css">
    <title>Molo Molo</title>
    <script>
        const panier = <?php echo json_encode($_SESSION['panier']); ?>;
        console.log(panier)
    </script>
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
                    <a href="profiles.php" class="nav-link"><li class="fas fa-user" style="cursor: pointer"></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link" ><li class="fas fa-sign-in-alt" style="cursor: pointer; color: white"></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link" ><li class="fas fa-sign-out-alt" style="cursor: pointer; color: white"></a>
                </li>
            </ul>
        </div>
    </nav><br><br><br>

    <div class="container">
    <h1 class="text-center">Détails de la commande</h1>

    <!--div class="container">
        <ul class="progressbar">
            <li class="active">Shopping cart</li>
            <li>Checkout details</li>
            <li>Order complete</li>
        </ul>
    </div><br><br><br-->

        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">détails de la commande</div>
        </div><br>

    <div class="row">
        <div class="col-md-8">
            <div class="card form-section">
                <div class="card-body">
                    <h4>Informations de contact</h4>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstName">Prénom</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Prénom">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Nom</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Nom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Numéro de téléphone</label>
                        <input type="text" class="form-control" id="phoneNumber" placeholder="Numéro de téléphone">
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" class="form-control" id="email" placeholder="Votre email">
                    </div>
                </div>
            </div>

            <div class="card form-section">
                <div class="card-body">
                    <h4>Adresse de livraison</h4>
                    <div class="form-group">
                        <label for="streetAddress">Adresse</label>
                        <input type="text" class="form-control" id="streetAddress" placeholder="Adresse">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="country">Pays</label>
                            <select id="country" class="form-control">
                                <option selected>Cameroun</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city">Ville</label>
                            <input type="text" class="form-control" id="city" placeholder="Ville">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="state">Région</label>
                            <input type="text" class="form-control" id="state" placeholder="Région">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="zipCode">Code postal</label>
                            <input type="text" class="form-control" id="zipCode" placeholder="Code postal">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card form-section">
                <div class="card-body">
                    <h4>Méthode de paiement</h4>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" checked>
                            <label class="form-check-label" for="creditCard">
                                Payer par carte de crédit
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="paypal">
                            <label class="form-check-label" for="paypal">
                                Paypal
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cardNumber">Numéro de carte</label>
                        <input type="text" class="form-control" id="cardNumber" placeholder="1234 1234 1234 1234">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="expirationDate">Date d'expiration</label>
                            <input type="text" class="form-control" id="expirationDate" placeholder="MM/AA">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cvcCode">CVC</label>
                            <input type="text" class="form-control" id="cvcCode" placeholder="CVC">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Résumé de la commande</h4>
                    <div id="orderSummary">
                        <!-- Les produits du panier seront chargés ici -->
                    </div>
                    <h5 class="mt-3">Total : <span id="orderTotal">$0.00</span></h5>
                    <button class="btn btn-dark btn-checkout mt-3" onclick="validerCommande()">Passer la commande</button>
                </div>
            </div>
        </div>
    </div>
</div>

   

    <?php 
        include("./frontend/footer.php")
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="frontend/cart2.js"></script>
    
</body>
</html>