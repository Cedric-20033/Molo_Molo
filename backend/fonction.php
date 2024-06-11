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
?>