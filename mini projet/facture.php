<?php
// Démarrer la session pour accéder au panier
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Facture</title>
</head>

<body>

<h2>Facture</h2>

<table border="1">

<tr>
<th>Produit</th>
<th>Quantité</th>
<th>Prix</th>
<th>Total</th>
</tr>

<?php

// Variable pour calculer le total général
$total = 0;

// Vérifier si le panier existe
if(isset($_SESSION['panier'])){

// Parcourir les produits du panier
foreach($_SESSION['panier'] as $p){

// Calculer le total pour chaque produit
$prix_total = $p['prix'] * $p['quantite'];

// Ajouter au total général
$total += $prix_total;

// Afficher les données dans le tableau
echo "<tr>";
echo "<td>".$p['nom']."</td>";
echo "<td>".$p['quantite']."</td>";
echo "<td>".$p['prix']."</td>";
echo "<td>".$prix_total."</td>";
echo "</tr>";

}

}

?>

<tr>
<td colspan="3">Total à payer</td>

<td><?php echo $total ?></td>
</tr>

</table>

</body>
</html>
