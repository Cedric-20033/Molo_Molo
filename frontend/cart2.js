console.log("cart2.js chargé")

$(document).ready(function() {
    chargerPanier();
});

function chargerPanier() {
    let total = 0;
    let orderSummary = $("#orderSummary");
    orderSummary.empty();

    panier.forEach(item => {
        $.ajax({
            url: './backend/produit.php',
            type: 'GET',
            data: { id: item.id },
            success: function(data) {
                let produit = JSON.parse(data);
                if (produit) {
                    total += produit.prix * item.nombre;

                    orderSummary.append(`
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <img src="media/images/${produit.image}" alt="${produit.nom}" class="img-fluid" style="max-width: 50px; max-height: 50px;">
                            <div>
                                <h6>${produit.nom}</h6>
                                <p>${produit.prix} x ${item.nombre}</p>
                            </div>
                            <p>$${produit.prix * item.nombre}</p>
                        </div>
                    `);

                    $("#orderTotal").text(`${total.toFixed(2)}`);
                }
            }
        });
    });
}

function validerCommande() {
    let firstName = $("#firstName").val();
    let lastName = $("#lastName").val();
    let phoneNumber = $("#phoneNumber").val();
    let email = $("#email").val();
    let streetAddress = $("#streetAddress").val();
    let country = $("#country").val();
    let city = $("#city").val();
    let state = $("#state").val();
    let zipCode = $("#zipCode").val();
    let paymentMethod = $("input[name='paymentMethod']:checked").val();
    let cardNumber = $("#cardNumber").val();
    let expirationDate = $("#expirationDate").val();
    let cvcCode = $("#cvcCode").val();

    $.ajax({
        url: './backend/valider_commande.php',
        type: 'POST',
        data: {
            firstName,
            lastName,
            phoneNumber,
            email,
            streetAddress,
            country,
            city,
            state,
            zipCode,
            paymentMethod,
            cardNumber,
            expirationDate,
            cvcCode,
            panier
        },
        success: function(response) {
            r = JSON.parse(response); //convertir la chaine de carractère reçus en format en json en objet js
            if (r.success) {
                alert("commande validé");
                window.location.href = "confirmation.php";
            } else {
                alert("Erreur lors de la validation de la commande. Veuillez réessayer.");
            }
        }
    });
}