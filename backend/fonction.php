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


?>