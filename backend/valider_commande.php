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
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $streetAddress = $_POST['streetAddress'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['zipCode'];
    $paymentMethod = $_POST['paymentMethod'];
    $cardNumber = $_POST['cardNumber'];
    $expirationDate = $_POST['expirationDate'];
    $cvcCode = $_POST['cvcCode'];
    $panier = $_POST['panier'];

    $conn = new mysqli("localhost", "root", "", "molo_molo");

    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO commandes (prenom, nom, telephone, email, adresse, pays, ville, region, code_postal, method_paiement, numero_carte, expiration, cvc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssss", $firstName, $lastName, $phoneNumber, $email, $streetAddress, $country, $city, $state, $zipCode, $paymentMethod, $cardNumber, $expirationDate, $cvcCode);

    if ($stmt->execute()) {
        $commande_id = $stmt->insert_id;

        foreach ($panier as $item) {
            $produit = produit($item['id']);
            if ($produit) {
                $stmt = $conn->prepare("INSERT INTO commande_produits (commande_id, produit_id, quantite, prix_unitaire) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("iiid", $commande_id, $produit['id'], $item['nombre'], $produit['prix']);
                $stmt->execute();
            }
        }

        $stmt->close();
        $conn->close();

        echo json_encode(['success' => true, 'id_commande' => $commande_id]);
    } else {
        echo json_encode(['success' => false]);
    }
    
}
?>