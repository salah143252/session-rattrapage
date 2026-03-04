<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form  method="post">
        <label>prix</label>
        <input type="number" name="Prix">
        <label >Qté</label>
        <input type="number" name="Qte">
        <button type="submit" >send the data</button>
    
    </form>
   
</body>
</html>
<?php 
$message = "";
function CalculePrix($Prix,$Qte){
$sum=$Prix*$Qte;
if($Qte>=10){
    $reduction= $sum - ($sum*0.1);
    return $reduction;
} else {
    return $sum;
}
}
if ($_SERVER["REQUEST_METHOD"] === "POST"){
$Prix=$_POST["Prix"];
$Qte=$_POST["Qte"];
 if(empty($Qte) || empty($Prix)){
        echo "Fill the fields";
    }elseif($Qte < 0 || $Prix < 0){
        echo "Valeurs invalide";
    }else{
        echo "Total : ". CalculePrix($Qte, $Prix);
    }
}

?>