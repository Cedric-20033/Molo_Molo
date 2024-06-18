let panier = [];

$(document).ready(function(){
    chargerPanierDepuisServeur();
    //chargerArticlesPanier();

    $('input[name="shippingOption"]').change(function(){
        calculerTotal();
    });

    $('#checkout').click(function(){
        //simuler la sauvegarde des données

        window.location.href = 'cart2.php';
    });
});

function chargerPanierDepuisServeur(){
    $.post('cart.php', {action: 'getCart'}, function(response){
        panier = JSON.parse(response);
        chargerArticlesPanier()
    });
}

function chargerArticlesPanier(){
    $('#cart-items').empty();
    let sousTotal = 0;

    //utiliser promise.all pour garantir que les articles sont affichés dans l'ordre
    let promises = panier.map(item => {
        return new Promise((resolve, reject) => {
            document.getElementById('spinner-border').classList.add('d-block'); //ajouter la classe d-block pour afficher le chargement
            document.getElementById('spinner-border').classList.remove('d-none'); //suprimer la class d-none pour afficher le chargement
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
        document.getElementById('spinner-border').classList.add('d-none'); //ajouter la classe d-none pour enlever le chargement
        document.getElementById('spinner-border').classList.remove('d-block'); //suprimer la class d-block pour enlever le chargement
        if(results.length < 1){
            alert ("aucun article ajouté dans le panier");
        }
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
    panier = panier.filter(item => item.id != id);

    //retirer le produit dans le panier php
    $.post('cart.php', {action: 'updateCart', panier: JSON.stringify(panier)}, function(response){
        chargerArticlesPanier();
    });
}

function mettreAjourQuantite(id, quantite){
    alert("ok")
    let item = panier.find(item => item.id === id);
    if(item !== 0){
        item.nombre = parseInt(quantite);
    }

   for(let i=0; i < panier.length; i++){
        if(panier[i].id === item.id){
            panier[i].nombre = item.nombre;
            break;
        }
   }

    //modifier le produit dans le panier
    $.post('cart.php', {action: 'updateCart', panier: JSON.stringify(panier)}, function(response){
        panier = JSON.parse(response);
        chargerArticlesPanier();
    });
}

function calculerTotal(){
    let sousTotal = parseFloat($('#subtotal').text().replace('$', ''));
    let livraison = parseFloat($('input[name="shippingOption"]:checked').val());
    let total = sousTotal + livraison;
    $('#total').text(`${total.toFixed(2)} xaf`);
}

function ajouterAuPanier(id, nombre){
    $.post('cart.php', {action: 'addToCart', id: id, nombre: nombre}, function(response){
        //la requête enregistre dans le tableau php le nouvel id et nombre puis renvoie le tableau dans response
        panier = JSON.parse(response);
        chargerArticlesPanier();
    });
}