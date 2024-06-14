let panier = [
    {id:1 , nombre: 2},
    {id:2 , nombre: 2},
    {id:3 , nombre: 1}
];

$(document).ready(function(){
    chargerArticlesPanier();

    $('input[name="shippingOption"]').change(function(){
        calculerTotal();
    });

    $('#checkout').click(function(){
        //simuler la sauvegarde des données

        window.location.href = 'cart2.php';
    });
});

function chargerArticlesPanier(){
    $('#cart-items').empty();
    let sousTotal = 0;

    //utiliser promise.all pour garantir que les articles sont affichés dans l'ordre
    let promises = panier.map(item => {
        return new Promise((resolve, reject) => {
            //on utilise une requête ajax pour envoyer la requette
            $.post('cart.php', {action: 'getProduct', id: item.id}, function(response){
                let product = JSON.parse(response);
                let totalProduit = product.prix * item.nombre;
                sousTotal += totalProduit;
                resolve({product, item, totalProduit});
            });
        });
    });

    Promise.all(promises).then(results => {
        results.forEach(({product, item, totalProduit}) => {
            $('#cart-items').append(`
                <div class="row mb-3">
                    <div class="col-md-2">
                        <img src="./media/images/${product.image}" alt="${product.nom}" class="product-image">
                    </div>
                    <div class="col-md-4">
                        <h5>${product.nom}</h5>
                        <p>categorie: ${product.categorie}</p>
                        <button class="icon-button" onclick="retirerArticle(${item.id})">Retirer</button>
                    </div>
                    <div class="col-md-2">
                        <input type="number" value="${item.nombre}" min="1" class="form-control" onchange="mettreAjourQuantite(${item.id}, this.value)">
                    </div>
                    <div class="col-md-2">
                        <p>${product.prix.toFixed(2)} xaf</p>
                    </div>
                    <div class="col-md-2">
                        <p>${totalProduit.toFixed(2)} xaf</p>
                    </div>
                </div>
            `);
        });

        $('#subtotal').text(`${sousTotal.toFixed(2)} xaf`);
        calculerTotal();
    });
}

function retirerArticle(id){
    panier = panier.filter(item => item.id !== id);
    chargerArticlesPanier();
}

function mettreAjourQuantite(id, quantite){
    let item = panier.find(item => item.id === id);
    if(item){
        item.nombre = parseInt(quantite);
    }
    chargerArticlesPanier();
}

function calculerTotal(){
    let sousTotal = parseFloat($('#subtotal').text().replace('$', ''));
    let livraison = parseFloat($('input[name="shippingOption"]:checked').val());
    let total = sousTotal + livraison;
    $('#total').text(`${total.toFixed(2)} xaf`);
}