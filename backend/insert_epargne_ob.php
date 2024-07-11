<?php
session_start();
function date_in(){
    return date('Y-m-d H:i:s');
}

function produit($id) {
    // Connexion à la base de données
    $con=mysqli_connect("localhost","root","","molo_molo");

    $sql = "SELECT *  FROM objectif";
    $req = mysqli_query($con, $sql);
    if($req == true){
        while($tab = mysqli_fetch_assoc($req)){
            if($tab['id'] == $id){
                return $tab;
                break;
            }
        }
    }else{
        return false;
    }

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prix = $_POST['prix'];
    $prix_total = $_POST['prix_total'];
    $mois = (int)$_POST['mois'];
    $frequence = $_POST['frequence'];
    $sms = $_POST['sms'];
    $cni = $_POST['cni'];
    $ville = $_POST['ville'];
    $quartier = $_POST['quartier'];
    $profession = $_POST['profession'];
    $id_produit = $_POST['id_produit'];
    $type = $_POST['type'];

    $id_user = $_SESSION['id_user'];

    $produit = produit($id_produit);
    //$prix_produit = $produit['prix'];
    $nom_produit = $produit['nom'];

    $montant_actuel = 0;

    $date = date_in();

    $conn = mysqli_connect("localhost", "root", "", "molo_molo");

    $sql = "INSERT INTO epargne (`id_epargne`, `id_user`, `nom`, `montant`, `type`, `type_alert`, `frequence`, `mois`, `date_debut`, `montant_actuel`, `montant_total`, `cni`, `ville`, `quartier`, `profession`) VALUES ('$id_produit', '$id_user', '$nom_produit', '$prix', '$type', '$sms', '$frequence', '$mois', '$date', '$montant_actuel', '$prix_total', '$cni', '$ville', '$quartier', '$profession')";

    $res = mysqli_query($conn, $sql);

    if ($res) {

        echo json_encode(['success' => true, 'id_epargne' => $res]);
    } else {
        echo json_encode(['success' => false, 'erreur' => mysqli_error($conn)]);
    }
    
}
?>