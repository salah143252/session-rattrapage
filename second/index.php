<?php

session_start();

$data = file_get_contents("produits.json");
$produits = json_decode($data, true);

$message = "";

if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = [];
}

if(isset($_POST['ok'])){

    $index = $_POST['produit'];
    $qte = $_POST['quantite'];

    if($qte <= $produits[$index]['stock']){

        $achat = [
            "nom" => $produits[$index]['nom'],
            "prix" => $produits[$index]['prix'],
            "quantite" => $qte
        ];

        $_SESSION['panier'][] = $achat;

        $produits[$index]['stock'] -= $qte;

        file_put_contents("produits.json", json_encode($produits));

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