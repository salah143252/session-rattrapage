<?php
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

$total = 0;

if(isset($_SESSION['panier'])){

foreach($_SESSION['panier'] as $p){

$prix_total = $p['prix'] * $p['quantite'];

$total += $prix_total;

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