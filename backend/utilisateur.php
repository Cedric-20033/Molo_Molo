<?php
session_start();

class Utilisateur {
    private $id;
    private $cni;
    private $ville;
    private $quartier;
    private $profession;

    public function __construct($id) {
        $this->id = $id;
        // Simuler la récupération des données de l'utilisateur à partir d'une base de données
        // Connexion à la base de données
        $con=mysqli_connect("localhost","root","","molo_molo");

        $sql = "SELECT *  FROM utilisateur";
        $req = mysqli_query($con, $sql);
        if($req == true){
            while($tab = mysqli_fetch_assoc($req)){
                if($tab['id'] == $id){
                    $this->cni = $tab['cni'];
                    $this->ville = $tab['ville'];
                    $this->quartier = $tab['quartier'];
                    $this->profession = $tab['profession'];
                    break;
                }
            }
        }
    }

    public function getUserInfo() {
        return [
            'cni' => $this->cni,
            'ville' => $this->ville,
            'quartier' => $this->quartier,
            'profession' => $this->profession
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['id_user'];
    $utilisateur = new Utilisateur($id);
    echo json_encode($utilisateur->getUserInfo());
}
?>