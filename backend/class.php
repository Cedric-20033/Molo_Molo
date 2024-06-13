<?php 

class Database{
    private $host = 'localhost';
    private $db = 'molo_molo';
    private $user = 'root';
    private $pass = '';
    public $pdo;

    public function __construct(){
        try {
            $this->pdo = new PDO("mysql:host=$this->host; dbname=$this->db", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //return $this->pdo;
        } catch (PDOException $e){
            die("Erreur: " .$e->getMessage());
        }
    }
}

class productManager{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    //selectionner 3 categorie au hasard
    public function getRandomCategories($limit=3){
        $stmt = $this->pdo->prepare("SELECT * FROM categorie ORDER BY RAND() LIMIT :limit");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //selectionner un produit au hasard pour une categorie donnée
    public function getRandomProductByCategorie($categorie){
        $stmt = $this->pdo->prepare("SELECT * FROM produits WHERE categorie = :categorie ORDER BY RAND() LIMIT 1");
        $stmt->bindParam(':categorie', $categorie, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //selectionner 8 produits les plus notés
    public function getTopRateProducts(){
        $stmt = $this->pdo->prepare("SELECT * FROM produits ORDER BY note DESC LIMIT 8");
        //$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
 ?>