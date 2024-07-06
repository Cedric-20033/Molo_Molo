<?php
session_start();

function produit($id) {
    // Connexion à la base de données
    $con=mysqli_connect("localhost","root","","molo_molo");

    $sql = "SELECT *  FROM produits";
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
    $id_commande = $_POST['id_commande'];

    $conn = new mysqli("localhost", "root", "", "molo_molo");

    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    $sql = "SELECT * FROM commandes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_commande);
    $stmt->execute();
    $commande = $stmt->get_result()->fetch_assoc();

    $sql = "SELECT produit_id, quantite, prix_unitaire FROM commande_produits WHERE commande_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_commande);
    $stmt->execute();
    $result = $stmt->get_result();

    $produits = [];
    while ($row = $result->fetch_assoc()) {
        $produit = produit($row['produit_id']);
        $produit['quantite'] = $row['quantite'];
        $produit['prix_unitaire'] = $row['prix_unitaire'];
        $produits[] = $produit;
    }

    $stmt->close();
    $conn->close();

    echo json_encode([
        'id' => $commande['id'],
        'date_commande' => $commande['date_commande'],
        'method_paiement' => $commande['method_paiement'],
        'produits' => $produits]);
}
?>