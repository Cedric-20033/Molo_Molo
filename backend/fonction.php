<?php 
session_start();
function connexion(){
    @$con=mysqli_connect("localhost","root","","molo_molo");
    //gerer les accents et autres carractere francais
    @$req=mysqli_query($con, "SET NAMES UTF8");
    if($con){
        return $con;
    }else{
        ?>
            <p class="text-danger"><?php echo "echec de connexion a la base de donnée"; ?></p>
        <?php
        return "echec_bd";
    }
}

//produit
function produit(){
    $con = connexion();
    $req="SELECT * FROM produits";
    $res=mysqli_query($con, $req);
    $products = array();
    if($res == true){
        while($row = mysqli_fetch_assoc($res)){
            $products[] = $row;
        }
    }

    mysqli_close($con);
    return $products;
}

//objectif
function objectif(){
    $con = connexion();
    $req="SELECT * FROM objectif";
    $res=mysqli_query($con, $req);
    $products = array();
    if($res == true){
        while($row = mysqli_fetch_assoc($res)){
            $products[] = $row;
        }
    }

    mysqli_close($con);
    return $products;
}

//meilleurs produits

function produit_best(){
    $con = connexion();
    $req="SELECT * FROM produits ORDER BY note DESC LIMIT 8";
    $res=mysqli_query($con, $req);
    $products = array();
    if($res == true){
        while($row = mysqli_fetch_assoc($res)){
            $products[] = $row;
        }
    }

    mysqli_close($con);
    return $products;
}

//poo

function connexion_poo(){
    $host = 'localhost';
    $db = 'molo_molo';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e){
        die("Erreur: " .$e->getMessage());
    }
}

function produit_poo(){
    $con = connexion_poo();

    $sql = "SELECT  * FROM produits";
    $elmt = $con -> prepare($sql);
    $elmt -> execute();

    //récuperer tous les résutats
    $results = $elmt -> fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

//fonction pour selectionner un seul produit

function select_product($id){
    /*$produits = [
        1=>["id" => 1, "nom" => "moto1", "image" => "moto.png", "categorie" => "automobile", "prix" => 1000000],
        2=>["id" => 2, "nom" => "moto2", "image" => "moto.png", "categorie" => "automobile", "prix" => 1000000],
        3=>["id" => 1, "nom" => "moto3", "image" => "moto.png", "categorie" => "automobile", "prix" => 1000000]
    ];

    return isset($produits[$id]) ? $produits[$id] : null;*/

     // Connexion à la base de données
     $conn = new mysqli("localhost", "root", "", "molo_molo");

     if ($conn->connect_error) {
         die("Connexion échouée : " . $conn->connect_error);
     }
 
     $sql = "SELECT * FROM produits WHERE id = ?";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("i", $id);
     $stmt->execute();
     $result = $stmt->get_result();
 
     if ($result->num_rows > 0) {
         return $result->fetch_assoc();
     } else {
         return null;
     }
 }
?>