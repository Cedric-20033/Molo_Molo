<?php
function produit($id) {
    $conn = new mysqli("localhost", "root", "", "molo_molo");

    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    $sql = "SELECT id, nom, image, prix, categorie FROM produits WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $produit = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $produit;
    } else {
        $stmt->close();
        $conn->close();
        return null;
    }
}

session_start();
if (!isset($_POST['id_commande'])) {
    die("ID de commande non fourni.");
}

$id_commande = $_POST['id_commande'];
$conn = new mysqli("localhost", "root", "", "molo_molo");

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les détails de la commande
$sql = "SELECT id, prenom, nom, telephone, email, adresse, pays, ville, region, code_postal, date_commande, method_paiement FROM commandes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_commande);
$stmt->execute();
$result = $stmt->get_result();
$commande = $result->fetch_assoc();

// Récupérer les produits de la commande
$sql = "SELECT produit_id, quantite, prix_unitaire FROM commande_produits WHERE commande_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_commande);
$stmt->execute();
$result = $stmt->get_result();

$produits = [];
$total = 0;

while ($row = $result->fetch_assoc()) {
    $produit = produit($row['produit_id']);
    if ($produit) {
        $produit['quantite'] = $row['quantite'];
        $produit['prix_unitaire'] = $row['prix_unitaire'];
        $produits[] = $produit;
        $total += $row['quantite'] * $row['prix_unitaire'];
    }
}

$stmt->close();
$conn->close();

// Générer la facture en HTML
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total-row {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Facture</h2>
    <p>Commande #<?php echo $commande['id']; ?></p>
    <p>Date: <?php echo $commande['date_commande']; ?></p>
    <p>Client: <?php echo $commande['prenom'] . ' ' . $commande['nom']; ?></p>
    <p>Téléphone: <?php echo $commande['telephone']; ?></p>
    <p>Email: <?php echo $commande['email']; ?></p>
    <p>Adresse: <?php echo $commande['adresse'] . ', ' . $commande['ville'] . ', ' . $commande['region'] . ', ' . $commande['code_postal'] . ', ' . $commande['pays']; ?></p>
    <p>Méthode de paiement: <?php echo $commande['method_paiement']; ?></p>

    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produits as $produit): ?>
                <tr>
                    <td><?php echo $produit['nom']; ?></td>
                    <td><?php echo $produit['quantite']; ?></td>
                    <td><?php echo number_format($produit['prix_unitaire'], 2); ?> Fcfa</td>
                    <td><?php echo number_format($produit['quantite'] * $produit['prix_unitaire'], 2); ?> Fcfa</td>
                </tr>
            <?php endforeach; ?>
            <tr class="total-row">
                <td colspan="3">Montant Total</td>
                <td><?php echo number_format($total, 2); ?> Fcfa</td>
            </tr>
        </tbody>
    </table>
</body>
</html>