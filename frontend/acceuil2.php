<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molo Molo</title>
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            var navbar = document.getElementById('navbar');
            var sticky = navbar.offsetTop;
            window.onscroll = function(){
                if(window.pageYOffset >= sticky){
                    navbar.classList.add("fixed-top");
                }else{
                    navbar.classList.remove("fixed-top");
                }
            };
        });
    </script>
</head>
<body>
    <div class="container-fluid">
        <div class="bg-dark text-white text-center">30% de réduction - temps limité <a href="./shop.php" style="text-decoration: none; text-decoration: underline; color: yellow">boutique -></a></div>
    </div>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a href="#" class="navbar-brand">Molo Molo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="navbar-item">
                    <a href="" class="nav-link active">Accueil</a>
                </li>
                <li class="navbar-item">
                    <a href="./shop.php" class="nav-link">Boutique</a>
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
                    <a href="#" class="nav-link"><li class="fas fa-search" style="cursor: pointer"></li></a>
                </li>
                <li class="navbar-item ml-3 d-flex">
                    <a href="cart.php" class="nav-link mr-1"><li class="fas fa-shopping-cart" style="cursor: pointer"></a>5
                </li>
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link"><li class="fas fa-user" style="cursor: pointer"></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link"><li class="fas fa-sign-in-alt" style="cursor: pointer"></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link"><li class="fas fa-sign-out-alt" style="cursor: pointer"></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
    <header class="bg-warning text-dark text-center p-5 animate__fadeIn">
        <div class="container-fluid d-flex">
            <div class="col-md-5 ml-4">
                <img src="./media/images/voiture2.png" alt="" style="max-width: 100%" class="img-fluid animate__animated animate__bounceIn">
            </div>
            <div class="col-md-7 mr-4">
                <h1 class="font-weight-bold">votre Achat, votre <strong style="color: red;">EPARGNE</strong></h1>
                <p class="animate__animated lead">simplifiez vous la vie.</p>
                <p>transformez vos Achats en épargne sans effort.</p>
                <a href="#" style="background-color: red; border: none" class="btn btn-primary mt-3 animate__animated animate__bounceIn">Econnomisez maintenant</a>
            </div>
        </div>
    </header>
    </div>

    <section class="nouvautes py-5">
        <div class="container ">
            <h2 class="text-center mb-4 animate__animated animate__fadeInUp">nouveautés</h2>
            <div class="row no">
                <?php 
                    foreach ($new_product as $row) {
                        ?>
                        <div class="col-12 col-sm-6 col-lg-4 mb-4 animate__animated animate__zoomIn">
                            <div class="card">
                                <span class="badge badge-blanc text-dark col-2 mt-2 offset-1">NEW</span>
                                <img src="./media/images/<?=$row['image']; ?>" alt="<?=$row['nom']; ?>" class="card-img-top img-fluid mb-3">
                                <div class="card-body mt-0">
                                    <h5 class="card-title mt-0"><?=$row['nom']; ?> </h5>
                                    <p class="card-text mt-0 fw-bold"><?=number_format($row['prix'], 0, '.', ',').'FCFA'; ?> <del><?=number_format(floor($row['prix']*100/85), 0, '.', ',').'FCFA'; ?></del></p>
                                    <button class="btn btn-dark mt-3" id="<?=$row['id']; ?>" onclick="ajouterAuPanier(<?=$row['id']; ?>, 1)">ajouter au panier</button>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>

            </div>
        </div>
    </section>

    <section class="collection-boutique py-5 bg-light">
        <?php 
            //créer une instance de la connexion a la bd
            $db = new Database();
            $pdo = $db->pdo;

            //créer ue instance du gestionnaire de produit
            $productManager = new ProductManager($pdo);

            //sélectionner 3 categorie au hasard
            $randomCategorie = $productManager->getRandomCategories();

            //selectionner un produit au hasard pour chaque categorie
            $randomproducts = [];
            foreach ($randomCategorie as $categorie) {
                $product = $productManager->getRandomProductByCategorie($categorie['nom']);
                if($product){
                    $randomproducts[] = $product;
                }
            }
        ?>
        <div class="container">
            <h2 class="text-center mb-4 animate__animated animate__fadeInUp">collection de la boutique</h2>
            <div class="row">
                <?php 
                foreach ($randomproducts as $produit) {
                    ?>
                    <div class="col-12 col-lg-4 mb-4 animate__animated animate__zoomIn">
                        <div class="collection-item text-center">
                            <img src="./media/images/<?=$produit['image'];?>" alt="" class="img-collection img-fluid mb-3">
                            <h4 class="mt-3">collection: <?=$produit['categorie'];?></h4>
                            <h5 class="mt-3"><?=$produit['nom'];?></h5>
                            <a href="#" class="btn btn-dark mt-2">Collection</a>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </section>

    <section class="best-seller py-5">
        <?php 
        //$bestSeller = $productManager->getTopRateProducts();
        $bestSeller = produit_best();
        ?>
        <div class="container">
            <h2 class="text-center mb-4">meilleures ventes</h2>
            <div class="row">
                <?php 
                if(is_array($bestSeller) && count($bestSeller) > 0){
                    foreach ($bestSeller as $product) {
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card animate__animated animate__fadeInUp">
                                <span class="badge badge-danger col-2 offset-5">HOT</span>
                                <img src="./media/images/<?=$product['image'];?>" alt="produit 1" class="card-img-top img-luid mt-3">
                                <div class="card-body text-center" style="max-width: 90%; min-width: 90%;">
                                    <h5 class="card-title"><?=$product['nom']; ?></h5>
                                    <p class="card-text"><?=number_format($product['prix'], 0, '.', ',').'FCFA' ; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }else{
                    ?>
                        <div class="alert alert-warning">aucun article trouvé</div>
                    <?php
                }
                //$db->closeConnexion();
                
                ?>

            </div>
        </div>
    </section>

    <section class="promotion py-5 bg-danger text-white text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="./media/images/grand_format.png" alt="" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="mb-3">PROMOTION</h2>
                    <p>dépêchez-vous et gagnez jusqu'à <span style="color: black">-20% de réduction</span> a épargner sur cet article</p>
                    <p>des centaines d'articles vous attendent</p>
                    <div class="countdown mb-3">
                        <div class="d-inline-block mx-2">
                            <h3>2</h3>
                            <p>jours</p>
                        </div>
                        <div class="d-inline-block mx-2">
                            <h3>12</h3>
                            <p>heures</p>
                        </div>
                        <div class="d-inline-block mx-2">
                            <h3>45</h3>
                            <p>minutes</p>
                        </div>
                        <div class="d-inline-block mx-2">
                            <h3>05</h3>
                            <p>secondes</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-dark">Obtenir maintenant</a>
                </div>
            </div>
        </div>
    </section>

    <section class="advantages py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3">
                    <i class="fas fa-shipping-fast icon"></i>
                    <h5>livraison gratuite</h5>
                    <p>pour les achats de plus de 30.000 xaf</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-undo icon"></i>
                    <h5>satisfait / remboursé</h5>
                    <p>30 jours de garantie</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-lock icon"></i>
                    <h5>paiements sécurisés</h5>
                    <p>sécurisé par OM et MoMo</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-headset icon"></i>
                    <h5>support client</h5>
                    <p>téléphone ou email</p>
                </div>

            </div>
        </div>
    </section>

    <section class="instagram py-5 bg-light text-center">
        <div class="container">
            <i class="fas fa-instagram icon icon-instagram" title="instagram"></i>
            <h2 class="mb-4">instagram</h2>
            <p>suivez-nous sur les reseaux sociaux pour plus de promotion</p>
            <p>molo_molo_officiel</p>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <img src="./media/images/fauteuil.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <img src="./media/images/fauteuil.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <img src="./media/images/fauteuil.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    
</body>

<script>
    //ajout des produit au panier

    function ajouterAuPanier(id, nombre){
        let nbre = parseInt(nombre);
        let i = parseInt(id);
        $.post('cart.php', {action: 'addToCart', id: i, nombre: nbre}, function(response){
            //la requête enregistre dans le tableau php le nouvel id et nombre puis renvoie le tableau dans response
            alert("produit ajouté au panier");
        });
    }
</script>
</html>