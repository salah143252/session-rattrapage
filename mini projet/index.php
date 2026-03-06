<?php

// Démarrer la session pour pouvoir utiliser $_SESSION (panier)
session_start();

// Lire le fichier JSON qui contient les produits
$data = file_get_contents("produits.json");

// Convertir le JSON en tableau PHP
$produits = json_decode($data, true);

// Message affiché à l'utilisateur
$message = "";

// Si le panier n'existe pas dans la session on le crée
if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = [];
}

// Vérifier si le bouton "Acheter" a été cliqué
if(isset($_POST['ok'])){

    // Récupérer l'index du produit sélectionné
    $index = $_POST['produit'];

    // Récupérer la quantité demandée
    $qte = $_POST['quantite'];

    // Vérifier si le stock est suffisant
    if($qte <= $produits[$index]['stock']){

        // Créer un tableau représentant l'achat
        $achat = [
            "nom" => $produits[$index]['nom'], 
            "prix" => $produits[$index]['prix'], 
            "quantite" => $qte
        ];

        // Ajouter l'achat dans le panier
        $_SESSION['panier'][] = $achat;

        // Diminuer le stock
        $produits[$index]['stock'] -= $qte;

        // Enregistrer dans le fichier JSON avec pretty print
        file_put_contents(
            "produits.json",
            json_encode($produits, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        // Message succès
        $message = "Produit ajouté au panier";
    }
    else{
        $message = "Stock insuffisant";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
<title>Achat produit</title>
</head>

<body>

<h2>Acheter un produit</h2>

<form method="POST">

<select name="produit">

<option value="0">Téléphone</option>
<option value="1">Casque</option>
<option value="2">Tablette</option>
<option value="3">Montre connectée</option>

</select>

<br><br>

<input type="number" name="quantite" placeholder="quantité">

<br><br>

<button type="submit" name="ok">Acheter</button>

</form>

<p><?php echo $message; ?></p>

<h3>Panier</h3>

<table border="1">

<tr>
<th>Produit</th>
<th>Quantité</th>
<th>Prix</th>
</tr>

<?php

// Afficher les produits dans le panier
foreach($_SESSION['panier'] as $p){

echo "<tr>";
echo "<td>".$p['nom']."</td>";
echo "<td>".$p['quantite']."</td>";
echo "<td>".$p['prix']."</td>";
echo "</tr>";

}

?>

</table>

<br>

<a href="facture.php">Visualiser la facture</a>

</body>
</html>
