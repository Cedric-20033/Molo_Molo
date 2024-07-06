<?php 
    include("./backend/fonction.php");
    $product = produit();
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
    <link rel="stylesheet" href="./frontend/shop.css">
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
                    <a href="" class="nav-link active">Boutique</a>
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
                    <a href="#" class="nav-link"><li class="fas fa-search" style="cursor: pointer; color: white;"></li></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="cart.php" class="nav-link"><li class="fas fa-shopping-cart" style="cursor: pointer; color: white;"></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="profiles.php" class="nav-link"><li class="fas fa-user" style="cursor: pointer"></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link"><li class="fas fa-sign-in-alt" style="cursor: pointer; color: white;"></a>
                </li>
                <li class="navbar-item ml-3">
                    <a href="#" class="nav-link"><li class="fas fa-sign-out-alt" style="cursor: pointer; color: white;"></a>
                </li>
            </ul>
        </div>
    </nav><br><br><br></b>

    <!-- banniere -->
    <header class="shop-header text-center py-5">
        <div class="container">
            <h1>Boutique</h1>
            <p>concevez l'espace dont vous avez toujours rêvé.</p>
        </div>
    </header>

    <!-- contenue principal-->
    <div class="container-fluid">
        <div class="row">
            <!-- filtre -->
            <aside class="col-lg-3 overlay d-none d-lg-block" id="overlay">
                <div class="overlay-content" id="overlay-content">
                    <div class="d-flex"><h5 class="mt-4">Filtres</h5></div>
                    <div class="filter-category">
                        <h6>CATEGORIES</h6>
                        <ul class="list-unstyled">
                            <li><input type="checkbox" name="category" value="all" checked>tous</li>
                            <li><input type="checkbox" name="category" value="ordinateur" >ordinateur</li>
                            <li><input type="checkbox" name="category" value="automobile" >automobile</li>
                            <li><input type="checkbox" name="category" value="cuisine" >cuisine</li>
                            <li><input type="checkbox" name="category" value="electromenager" >électro-ménager</li>
                            <li><input type="checkbox" name="category" value="meuble" >meuble</li>
                            <li><input type="checkbox" name="category" value="montre" >montre</li>
                        </ul>
                    </div>
                    <div class="filter-price">
                        <h6>PRIX</h6>
                        <ul class="list-unstyled">
                            <li><input type="checkbox" name="price" value="0-10000">0-10000</li>
                            <li><input type="checkbox" name="price" value="10000-100000">10.000xaf - 100.000xaf</li>
                            <li><input type="checkbox" name="price" value="100000-200000">100.000xaf - 200.000xaf</li>
                            <li><input type="checkbox" name="price" value="200000-300000">200.000xaf - 300.000xaf</li>
                            <li><input type="checkbox" name="price" value="400000">400.000xaf +</li>
                        </ul>
                    </div>

                    <button type="button" class="btn btn-danger d-none" id="close-overlay">Fermer</button>
                </div>
            </aside>

            <button class="arrow-button d-block d-lg-none" id="arrow-button" style="border: none">Filtres &#x25B2;</button>

            <!-- produits-->
            <main class="col-12 col-lg-9">
                <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                    <h5>séjour</h5>
                    <div>
                        <span>Article</span>
                        <select id="sort" class="form-control d-inline-block w-auto">
                            <option value="default">par défaut</option>
                            <option value="price_asc">prix croissant</option>
                            <option value="price_desc">prix décroissant</option>
                        </select>
                    </div>
                </div>

                <div id="product-grid" class="row">
                    <!-- les produits seront inséré ici via js -->

                </div>
                <div class="text-center mt-4 mb-4">
                    <button id="show-more" class="btn btn-dark">suivant</button>
                </div>
            </main>
        </div>
    </div>

    <?php 
        include("./frontend/footer.php");
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    var products = <?php echo json_encode($product); ?>;
    var currentPage = 1;
    var productsPerPage = 9;

    function renderProducts(products) {
        $('#product-grid').empty();
        products.forEach(product => {
            var productHTML = `
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 animate__animated animate__zoomIn">
                        <img src="./media/images/${product.image}" class="card-img-top img-fluid mb-3" alt="${product.nom}">
                        <div class="container">
                            <button class="btn btn-dark add-to-cart" onclick="ajouterAuPanier(${product.id}, 1)" data-id="${product.id} " style="width: 100%">ajouter au panier</button>
                        </div>
                        <div class="card-body">
                            <div class="ratings">
                                ${renderStars(product.note)}
                            </div>
                            <h5 class="card-title">${product.nom}</h5>
                            <p class="card-text">${product.prix} xaf</p>
                        </div>
                    </div>
                </div>
            `;
            $('#product-grid').append(productHTML);
        });
    }

    function renderStars(rating){
        var starsHTML = '';
        for(var i = 0; i < 5; i++){
            if(i < rating){
                starsHTML += '<i class="fas fa-star"></i>';
            }else{
                starsHTML += '<i class="far fa-star"></i>';
            }
        }
        return starsHTML;
    }

    function paginateProducts(products, pageNumber){
        var start = (pageNumber - 1) * productsPerPage;
        var end = start + productsPerPage;
        return products.slice(start, end);
    }

    function filterProducts(){
        var filteredProducts = products;
        var categories = [];
        $('input[name="category"]:checked').each(function(){
            categories.push($(this).val());
        });

        if(categories.length && categories.indexOf('all') === -1){
            filteredProducts = filteredProducts.filter(product => categories.includes(product.categorie));
        }

        var priceRange = $('input[name="price"]:checked').map(function(){
            return $(this).val();
        }).get();

        if(priceRange.length){
            filteredProducts = filteredProducts.filter(product => {
                var price = parseFloat(product.prix);
                return priceRange.some(range => {
                    var [min, max] = range.split('-').map(parseFloat);
                    return price >= min && (isNaN(max) || price <= max);
                });
            });
        }

        return filteredProducts;
    }

    function updateProducts(){
        var filteredProducts = filterProducts();

        renderProducts(paginateProducts(filteredProducts, currentPage));
    }

    $('input[name="category"], input[name="price"]').change(function(){
        currentPage = 1;
        updateProducts();
    });

    $('#sort').change(function() {
        var sortValue = $(this).val();
        products.sort((a, b) => {
            if(sortValue === 'price_asc'){
                return parseFloat(a.price) - parseFloat(b.price);
            } else if(sortValue === 'price_desc'){
                return parseFloat(b.price) - parseFloat(a.price);
            }
            return 0;
        });
        updateProducts();
    });

    $('#show-more').click(function(){
        currentPage ++;
        updateProducts();
    });

    updateProducts();
})
</script>
<script src="./frontend/shop.js"></script>
    
</body>
</html>