$(document).ready(function() {
    chargerDetailsCommande();
});

function chargerDetailsCommande() {
    $.ajax({
        url: './backend/get_commande_details.php',
        type: 'POST',
        data: { id_commande },
        success: function(data) {
            let details = JSON.parse(data);
            let orderDetails = $("#orderDetails");

            orderDetails.empty();
            let total = 0;

            details.produits.forEach(item => {
                total += item.prix_unitaire * item.quantite;
                orderDetails.append(`
                    <div class="d-flex justify-content-between align-items-center order-item mb-2 animate_animated animate_fadeInLeft">
                        <img src="media/images/${item.image}" alt="${item.nom}" class="img-fluid">
                        <div>
                            <h6>${item.nom}</h6>
                            <p>Quantité: ${item.quantite}</p>
                        </div>
                    </div>
                `);
            });

            orderDetails.append(`
                <p>Code de commande: ${details.id}</p>
                <p>Date: ${details.date_commande}</p>
                <p>Total: ${total.toFixed(2)} Fcfa</p>
                <p>Méthode de paiement: ${details.method_paiement}</p>
            `);
        }
    });
}

function imprimerFacture() {
    $.ajax({
        url: './backend/genere_facture.php',
        type: 'POST',
        data: { id_commande },
        success: function(data) {
            // Code pour imprimer la facture
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Facture</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(data);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    });
}
