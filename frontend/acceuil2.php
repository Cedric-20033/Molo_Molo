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
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link"><li class="fas fa-shopping-cart" style="cursor: pointer"></a>
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
    <header class="bg-warning text-dark text-center p-5 animate__fadeIn">
        <div class="container-fluid d-flex">
            <div class="col-md-5 ml-4">
                <img src="./media/images/homme.png" alt="" style="max-width: 50%" class="img-fluid animate__animated animate__bounceIn">
            </div>
            <div class="col-md-7 mr-4">
                <h1 class="font-weight-bold">votre shopping, votre <strong style="color: red;">EPARGNE</strong></h1>
                <p class="animate__animated lead">simplifiez vous la vie.</p>
                <p>transformez vos dépenses en épargne sans effort.</p>
                <a href="#" style="background-color: red; border: none" class="btn btn-primary mt-3 animate__animated animate__bounceIn">Econnomisez maintenant</a>
            </div>
        </div>
    </header>

    <section class="nouvautes py-5">
        <div class="container">
            <h2 class="text-center mb-4 animate__animated animate__fadeInUp">nouvautés</h2>
            <div class="row no">
                <div class="col-lg-3 col-md-4 mb-4 animate__animated animate__zoomIn">
                    <div class="card h-100">
                        <img src="./media/images/fauteuil.jpg" alt="casque sans fil" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">casque sans fil model UF-285GG</h5>
                            <p class="card-text">12.000 xaf <del>18.000 xaf</del></p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-dark">ajouter au panier</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-4 animate__animated animate__zoomIn">
                    <div class="card h-100">
                        <img src="./media/images/fauteuil.jpg" alt="casque sans fil" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">casque sans fil model UF-285GG</h5>
                            <p class="card-text">12.000 xaf <del>18.000 xaf</del></p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-dark">ajouter au panier</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-4 animate__animated animate__zoomIn">
                    <div class="card h-100">
                        <img src="./media/images/fauteuil.jpg" alt="casque sans fil" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">casque sans fil model UF-285GG</h5>
                            <p class="card-text">12.000 xaf <del>18.000 xaf</del></p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-dark">ajouter au panier</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-4 animate__animated animate__zoomIn">
                    <div class="card h-100">
                        <img src="./media/images/fauteuil.jpg" alt="casque sans fil" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">casque sans fil model UF-285GG</h5>
                            <p class="card-text">12.000 xaf <del>18.000 xaf</del></p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-dark">ajouter au panier</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-4 animate__animated animate__zoomIn">
                    <div class="card h-100">
                        <img src="./media/images/fauteuil.jpg" alt="casque sans fil" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">casque sans fil model UF-285GG</h5>
                            <p class="card-text">12.000 xaf <del>18.000 xaf</del></p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-dark">ajouter au panier</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-4 animate__animated animate__zoomIn">
                    <div class="card h-100">
                        <img src="./media/images/fauteuil.jpg" alt="casque sans fil" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">casque sans fil model UF-285GG</h5>
                            <p class="card-text">12.000 xaf <del>18.000 xaf</del></p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-dark">ajouter au panier</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="collection-boutique py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4 animate__animated animate__fadeInUp">collection de la boutique</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 animate__animated animate__zoomIn">
                    <div class="collection-item text-center">
                        <img src="./media/images/fauteuil.jpg" alt="" class="img-fluid">
                        <h5 class="mt-3">headband</h5>
                        <a href="#" class="btn btn-dark mt-2">Collection</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 animate__animated animate__zoomIn">
                    <div class="collection-item text-center">
                        <img src="./media/images/fauteuil.jpg" alt="" class="img-fluid">
                        <h5 class="mt-3">headband</h5>
                        <a href="#" class="btn btn-dark mt-2">Collection</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 animate__animated animate__zoomIn">
                    <div class="collection-item text-center">
                        <img src="./media/images/fauteuil.jpg" alt="" class="img-fluid">
                        <h5 class="mt-3">headband</h5>
                        <a href="#" class="btn btn-dark mt-2">Collection</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="best-seller py-5">
        <div class="container">
            <h2 class="text-center mb-4">meilleures ventes</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card animate__animated animate__fadeInUp">
                        <span class="badge badge-danger col-2 offset-5">HOT</span>
                        <img src="./media/images/fauteuil.jpg" alt="produit 1" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">sony - wh-1000xm5 wireless</h5>
                            <p class="card-text">5.000 xaf</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card animate__animated animate__fadeInUp">
                        <span class="badge badge-danger col-2 offset-5">HOT</span>
                        <img src="./media/images/fauteuil.jpg" alt="produit 1" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">sony - wh-1000xm5 wireless</h5>
                            <p class="card-text">5.000 xaf</p>
                        </div>
                    </div>
                </div><div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card animate__animated animate__fadeInUp">
                        <span class="badge badge-danger col-2 offset-5">HOT</span>
                        <img src="./media/images/fauteuil.jpg" alt="produit 1" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">sony - wh-1000xm5 wireless</h5>
                            <p class="card-text">5.000 xaf</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card animate__animated animate__fadeInUp">
                        <span class="badge badge-danger col-2 offset-5">HOT</span>
                        <img src="./media/images/fauteuil.jpg" alt="produit 1" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">sony - wh-1000xm5 wireless</h5>
                            <p class="card-text">5.000 xaf</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card animate__animated animate__fadeInUp">
                        <span class="badge badge-danger col-2 offset-5">HOT</span>
                        <img src="./media/images/fauteuil.jpg" alt="produit 1" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">sony - wh-1000xm5 wireless</h5>
                            <p class="card-text">5.000 xaf</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card animate__animated animate__fadeInUp">
                        <span class="badge badge-danger col-2 offset-5">HOT</span>
                        <img src="./media/images/fauteuil.jpg" alt="produit 1" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">sony - wh-1000xm5 wireless</h5>
                            <p class="card-text">5.000 xaf</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card animate__animated animate__fadeInUp">
                        <span class="badge badge-danger col-2 offset-5">HOT</span>
                        <img src="./media/images/fauteuil.jpg" alt="produit 1" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">sony - wh-1000xm5 wireless</h5>
                            <p class="card-text">5.000 xaf</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card animate__animated animate__fadeInUp">
                        <span class="badge badge-danger col-2 offset-5">HOT</span>
                        <img src="./media/images/fauteuil.jpg" alt="produit 1" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">sony - wh-1000xm5 wireless</h5>
                            <p class="card-text">5.000 xaf</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="promotion py-5 bg-danger text-white text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="./media/images/homme.png" alt="" class="img-fluid">
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
                    <h5>livraison gratuite</h5>
                    <p>pour les achats de plus de 30.000 xaf</p>
                </div>
                <div class="col-md-3">
                    <h5>satisfait / remboursé</h5>
                    <p>30 jours de garantie</p>
                </div>
                <div class="col-md-3">
                    <h5>paiements sécurisés</h5>
                    <p>sécurisé par OM et MoMo</p>
                </div>
                <div class="col-md-3">
                    <h5>support client</h5>
                    <p>téléphone ou email</p>
                </div>

            </div>
        </div>
    </section>

    <section class="instagram py-5 bg-light text-center">
        <div class="container">
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
</html>