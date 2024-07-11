<?php
if(isset($_SESSION['id_user']) && $_SESSION['id_user'] != ''){
    header("location: ./");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOLO MOLO - connexion</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-md-6 d-none d-md-flex bg-image"></div>
            <div class="col-md-6 bg-light">
                <div class="signin d-flex aligns-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <h3 class="display-4">CONNEXION</h3>
                                <p class="text-muted mb-4">vous n'avez pas de compte? <a href="./?sign=up">Sign up</a></p>
                                <form class="form-signin" >
                                    <div class="alert alert-danger d-none" id="danger">
                                        <strong>ERREUR!</strong> vérifiez vos informations et reéssayez !
                                    </div>
                                    <input type="hidden" name="action" value="signin" >
                                    <div class="form-group mb-3">
                                        <input type="text" name="username" id="username" placeholder="numéro ou email" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" name="password" id="password" placeholder="mot de passe" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" name="" id="customcheck1" class="custom-control-input">
                                        <label for="customcheck1" class="custom-control-label">se rappeler de moi</label>
                                    </div>
                                    <input type="reset" value="effacer" class="btn btn-secondary btn-block text-uppercase mb-2 rounded-pill shadow-sm">
                                    <button type="button" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" name="connexion" id="connect">connexion</button>
                                    <div class="text-right">
                                        <a href="#" class="text-muted">mot de passe oublié?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById('connect').addEventListener('click', function() {
    const password = document.getElementById('password').value;
    const username = document.getElementById('username').value;

    // Sélectionnez l'élément du bouton
    var monBoutton = document.getElementById("connect");

    // Modifiez le texte du bouton
    monBoutton.innerText = "chargement...";

    // Désactiver le bouton en ajoutant l'attribut disabled
    monBoutton.disabled = true;

    $.ajax({
        url: './backend/user.php',
        type: 'POST',
        data: { 
            username: username,
            password: password
        },
        success: function(rep) {
        let r = JSON.parse(rep);
        console.log(r);
        if(r.success){
            alert("connexion réussie");
            window.location.href = `./shop.php`;
        } else {
            var monBoutton = document.getElementById("connect");

            // Modifiez le texte du bouton
            monBoutton.innerText = "connexion";

            // Activer à nouveau le bouton en supprimant l'attribut disabled
            monBoutton.disabled= false;

            document.getElementById('danger').classList.remove('d-none'); //suprimer la class d-none du deuxieme boutton
            document.getElementById('danger').classList.add('d-block'); //afficher ce deuxieme boutton
        }
        }
    });
    });

    
</script>
</html>