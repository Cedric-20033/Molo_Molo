document.getElementById('arrow-button').addEventListener('click', function(){ //si le boutton arrow-button est cliqué
    document.getElementById('overlay').classList.add('d-block'); //ajouter la class d-block a overlay
    document.getElementById('arrow-button').classList.remove('d-block', 'd-lg-none'); //suprimer les class d-block, d-lg-none
    document.getElementById('arrow-button').classList.add('d-none'); //ajouter la classe d-none pour suprimer le boutton
    document.getElementById('close-overlay').classList.remove('d-none'); //suprimer la class d-none du deuxieme boutton
    document.getElementById('close-overlay').classList.add('d-block'); //afficher ce deuxieme boutton

    //positionner la superposition
    document.getElementById('overlay').classList.add('position-fixed', 'w-100', 'h-100');

    //appliquer un style a la superposition
    document.getElementById('overlay').classList.add('c-overlay');
    document.getElementById('overlay-content').classList.add('c-overlay-content');
});

document.getElementById('close-overlay').addEventListener('click', function(){
    document.getElementById('overlay').classList.remove('d-block');
    document.getElementById('arrow-button').classList.add('d-block', 'd-lg-none');
    document.getElementById('close-overlay').classList.add('d-none');
    document.getElementById('close-overlay').classList.remove('d-block');

    document.getElementById('overlay').classList.remove('position-fixed', 'w-100', 'h-100');

    //enlever le style a la superposition
    document.getElementById('overlay').classList.remove('c-overlay');
    document.getElementById('overlay-content').classList.remove('c-overlay-content');
});

//fermer la superposition si on clique sur un espace vide

document.getElementById('overlay').addEventListener('click', function(event){
    if(event.target === document.getElementById('overlay')){
        document.getElementById('overlay').classList.remove('d-block');
        document.getElementById('arrow-button').classList.add('d-block', 'd-lg-none');
        document.getElementById('close-overlay').classList.add('d-none');
        document.getElementById('close-overlay').classList.remove('d-block');

        document.getElementById('overlay').classList.remove('position-fixed', 'w-100', 'h-100');

        //enlever le style a la superposition
        document.getElementById('overlay').classList.remove('c-overlay');
        document.getElementById('overlay-content').classList.remove('c-overlay-content');
    }
})

//ajout des produit au panier

function ajouterAuPanier(id, nombre){
    let nbre = parseInt(nombre);
    let i = parseInt(id);
    $.post('cart.php', {action: 'addToCart', id: i, nombre: nbre}, function(response){
        //la requête enregistre dans le tableau php le nouvel id et nombre puis renvoie le tableau dans response
        alert("produit ajouté au panier");
    });
}

//payer un article par tranche
let prix = 0;
let mois;
let frequence;
let sms;
let cni;
let ville;
let quartier;
let profession;
let prix_tranche;

function tranche(id){
    // Récupérer l'élément du contenu du modal
    let contenuModal = $("#contenuModal");

    contenuModal.empty();

    //récupérer les informtions du produit en question avec une requête ajax
    $.ajax({
        url: './backend/produit.php',
        type: 'GET',
        data: { id: id },
        success: function(data) {
            let produit = JSON.parse(data);
                if (produit) {
                    prix = produit.prix;
                    contenuModal.append(`
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div><br> 
                        <div class="container mt-5">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Détails de l'article</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="media/images/${produit.image}" class="img-fluid" alt="${produit.nom}">
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Nom: ${produit.nom}</h4>
                                            <p class="text-muted"><s>Prix initial: ${produit.prix} XAF</s></p>
                                            <p class="text-success"><strong>Prix: ${produit.prix} XAF</strong></p>
                                            <p>Couleur: </p>
                                            <button class="btn btn-danger" id="paiement">Paiement en tranches</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5>Description:</h5>
                                    <p>Marque: </p>
                                    <p>Type de produit: ${produit.categorie}</p>
                                    <p>chargement...</p>
                                </div>
                            </div>
                        </div>
                    `);

                    const bouton = document.getElementById('paiement');
                    bouton.addEventListener('click', function() {
                        tranche2(id);      
                    });
                }
        }
    });
        
    // Mettre à jour le contenu du modal si on clique sur le boutton
    

    // Afficher le modal
    $('#monModal').modal('show');
}

//fonction tranche 2, il est lancer après le clique sur le boutton du premier modal, il doit configurer le paiement
function tranche2(id){
    // Récupérer l'élément du contenu du modal
    let contenuModal = $("#contenuModal");

    contenuModal.empty();

    contenuModal.append(`
    <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div><br> 

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Économisez molo molo</h3>
                <p>La dure de l'échéance</p>
            </div>
            <div class="card-body">
                <form id="paymentForm">
                    <div class="form-group">
                        <label for="months">mois</label>
                        <select class="form-control" id="months">
                            <option value="1">1 mois</option>
                            <option value="2">2 mois</option>
                            <option value="3">3 mois</option>
                            <!-- Ajoutez plus d'options si nécessaire -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="frequency">Fréquences</label>
                        <select class="form-control" id="frequency">
                            <option value="30">journalieres</option>
                            <option value="4">hebdomadaires</option>
                            <!-- Ajoutez plus d'options si nécessaire -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="notification">type d'alert</label>
                        <select class="form-control" id="notification">
                            <option value="sms">sms</option>
                            <option value="email">email</option>
                            <!-- Ajoutez plus d'options si nécessaire -->
                        </select>
                    </div>
                </form>
                <h3 class="text-success" id="amount"><h4 style='color: red' id="choix" class="d-block">choissez votre fréquence </h4></h3>
                <button class="btn btn-danger btn-block d-none" id="submitBtn">Allons-y</button>
            </div>
        </div>
    </div>

    `);

    //mettre a jour le montant a payer du modal
    document.getElementById('paymentForm').addEventListener('change', function() {

        document.getElementById('submitBtn').classList.remove('d-none'); //suprimer la class d-none du deuxieme boutton
        document.getElementById('submitBtn').classList.add('d-block'); //afficher ce deuxieme boutton

        //suprimer le message "choisissez votre fréqquence"
        document.getElementById('choix').classList.remove('d-block'); //suprimer la class d-none du deuxieme boutton
        document.getElementById('choix').classList.add('d-none'); //afficher ce deuxieme boutton

        const months = parseInt(document.getElementById('months').value);
        const frequency = parseInt(document.getElementById('frequency').value);

        const amount = (prix / months) / frequency; //obtenir le montant par tranche
        prix_tranche = parseFloat(amount);
        document.getElementById('amount').textContent = `${amount.toFixed(2)} XAF`;
    });

    document.getElementById('submitBtn').addEventListener('click', function() {
        mois = parseInt(document.getElementById('months').value);
        frequence = parseInt(document.getElementById('frequency').value);
        sms = document.getElementById('notification').value;

        //effacer le contenu
        contenuModal.empty();

        contenuModal.append(`
        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div><br> 

        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Informations personnelles</h3>
                </div>
                <div class="card-body">
                    <form id="infoForm">
                        <div class="form-group">
                            <label for="cni">Numéro de CNI</label>
                            <input type="text" class="form-control" id="cni" value="">
                        </div>
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" id="ville" value="">
                        </div>
                        <div class="form-group">
                            <label for="quartier">Quartier</label>
                            <input type="text" class="form-control" id="quartier" value="">
                        </div>
                        <div class="form-group">
                            <label for="profession">Profession</label>
                            <input type="text" class="form-control" id="profession" value="">
                        </div>
                    </form>
                    <button class="btn btn-danger btn-block" id="submitBtn2">Suivant</button>
                </div>
            </div>
        </div>

        `);

        $(document).ready(function() {
            // Effectuer une requête Ajax pour obtenir les informations de l'utilisateur
            let id_user = 1;
            $.ajax({
                url: './backend/utilisateur.php',
                type: 'POST',
                data: { id: id_user },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#cni').val(response.cni || ''); //afficher la cni recuperé ou le vide s'il y'a erreur
                        $('#ville').val(response.ville || '');
                        $('#quartier').val(response.quartier || '');
                        $('#profession').val(response.profession || '');
                    }
                },
                error: function() {
                    alert('Erreur lors de la récupération des informations de l\'utilisateur');
                }
            });
        
            $('#submitBtn2').click(function() {
                cni = document.getElementById('cni').value;
                quartier = document.getElementById('quartier').value;
                ville = document.getElementById('ville').value;
                profession = document.getElementById('profession').value;

                const estIndefinie = (cni === undefined || cni === '') || (quartier === undefined || quartier === '') || (ville === undefined || ville === '') || (profession === undefined || profession === '');

                if(estIndefinie === true){
                    alert("remplissez tous les champs");
                }else{
                    //effacer le contenu
                    contenuModal.empty();

                    contenuModal.append(`
                    <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                        </div><br>

                    <div class="container mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h3>vous devez savoir ceci !</h3>
                            </div>
                            <div class="card-body">
                                <p>Nous utilisons les services de <strong style="color: red">FlutterWave</strong> pour les paiements. vous aurez la possibilité de:</p>
                                <ul id="infoForm">
                                    <li><strong>Retrait:</strong> possibilité de retirer le produit par livraison ou dans les magasins après paiement total</li>
                                    <li><strong>Annulation:</strong> pénalité de 30% sur le montant épargné si on annule avant d'atteindre l'objectif ou l'écheance fixé.</li>
                                    <li><strong>Echange d'article:</strong> gratuit, en contactant le service client, vous pouvez échanger l'article contre un autre de même valeur</li>
                                    <li><strong>Fin d'épargne:</strong> prélèvement de 5% du montant épargné si on retire l'argent et non le produit solicité a la fin</li>
                                </ul>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="on" id="flexCheckDisabled">
                                    <label class="form-check-label" for="flexCheckDisabled">J'accepte</label>
                                </div>

                                <button class="btn btn-danger btn-block d-none" id="submitBtn3">Suivant</button>
                            </div>
                        </div>
                    </div>
                    `)

                    document.getElementById('flexCheckDisabled').addEventListener('change', function(){
                        let accepte = document.getElementById('flexCheckDisabled').value;
                        if(accepte === 'on'){
                            document.getElementById('submitBtn3').classList.remove('d-none'); //suprimer la class d-none du deuxieme boutton
                            document.getElementById('submitBtn3').classList.add('d-block'); //afficher ce deuxieme boutton
                        }
                    })

                    $('#submitBtn3').click(function() {
                        
                    
                    //insérer les informations dans la bd
                    $.ajax({
                        url: './backend/insert_epargne.php',
                        type: 'POST',
                        data: { 
                            prix: prix_tranche,
                            mois: mois,
                            frequence: frequence,
                            sms: sms,
                            cni: cni,
                            ville: ville,
                            quartier: quartier,
                            profession: profession,
                            id_produit: id, //c'est l'id passé en paramettre dans la fonction
                            type: 'produit'
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                /*$('#cni').val(response.cni || ''); //afficher la cni recuperé ou le vide s'il y'a erreur
                                $('#ville').val(response.ville || '');
                                $('#quartier').val(response.quartier || '');
                                $('#profession').val(response.profession || '');*/
                                console.log(response.success);

                                alert('paiement par tranche enclenché');

                                //effacer le contenu
                                contenuModal.empty();

                                contenuModal.append(`
                                    <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                    </div><br>

                                    <h3>vous pouvez consulter les paramètres de votre profil pour évoluer avec le paiement</3><br>
                                    <button type="button" class="btn btn-outline-secondary" id="commencer">commencer le paiement</button>
                                `)

                                //rediriger si on clique vers la page de profil
                                $('#commencer').click(function() {
                                    window.location.href = `profiles.php`;
                                })

                            }else{
                                console.log(response.erreur);
                            }
                        },
                        error: function(response) {
                            console.log(response);
                            alert('Erreur lors de l\'enregistrement des informations');
                        }
                    });


                    
            });
                    
                }
                
            });
        });
    });

    // Afficher le modal
    $('#monModal').modal('show');
}

