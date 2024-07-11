<?php
session_start();

// Cette fonction prend un username et retourne les détails de l'utilisateur
function getUserDetails($username) {
    // Connexion à la base de données
    $conn = mysqli_connect("localhost", "root", "", "molo_molo");

    $sql = "SELECT * FROM utilisateur WHERE email = '$username' OR numero = '$username'";

    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) > 0) {
        return mysqli_fetch_assoc($res);
    }

    return null;
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Récupérer les détails de l'utilisateur
        $userDetails = getUserDetails($username);

        if ($userDetails != null) {
            // Vérifier le mot de passe
            if ($password == $userDetails['passe']) {
                $_SESSION['id_user'] =$userDetails ['id'];
                echo json_encode(['success' => true]);
                exit;
            }
        }
     }

     echo json_encode(['success' => false]);
}
?>
