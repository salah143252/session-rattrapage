<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wid th=device-width, initial-scale=1.0">
    <title>simple page</title>
</head>
<body>
    <h2>Saisir une note : </h2><br>
    <form method="POST">
        <input type="text" name="note" placeholder="écrire une note ici">
        <button type="submit" name="push">ok</button>
    </form>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $note = $_POST["note"];
    if (empty($note)) {
        echo "<br> The input is empty...";
    } else {
        if (is_numeric($note) && $note >= 0 && $note <= 20) {
            if ($note >= 10) {
                echo "<p>Vous étes admis</p>";
            } else {
                echo "<p>Vous n'étes pas admis</p>";
            }
        }
        else {
            echo "<br> Non valide :(";
        }
    }
}

?>