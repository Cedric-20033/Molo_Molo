alert('ok');
$(document).ready(function() {
    var products = <?php echo json_encode(produit()); ?>;
    var currentPage = 1;
    var productsPerPage = 6;

    function renderProducts(products) {
        $('#product-grid').empty();
        products.forEach(product => {
            var productHTML = `
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="./media/images/${product.image}" class="card-img-top" alt="${product.nom}">
                        <div class="card-body">
                            <h5 class="card-title">${product.nom}</h5>
                            <p class="card-text">${product.prix} xaf</p>
                            <div class="ratings">
                                ${renderStars(product.note)}
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-dark add-to-cart" data-id=" ${product.id} ">ajouter au panier</button>
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