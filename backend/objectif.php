<?php

//cette fonction prend un id et retourne les details de ce produit
function produit($id) {
    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "molo_molo");

    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    $sql = "SELECT * FROM objectif WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode([]);
    }

    $stmt->close();
    $conn->close();
}

if (isset($_GET['id'])) {
    produit($_GET['id']);
}
?>