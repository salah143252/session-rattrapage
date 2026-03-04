<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
</body>
</html>

<?php 
$students=[

['nom'=>'Alami','prénom'=>'Ali','notes'=>[12,7,14.5] ],

['nom'=>'Serraj','prénom'=>'Sara','notes'=>[10,17,12] ],

['nom'=>'Kamili','prénom'=>'Ilham','notes'=>[9,15,16.5] ]

];

//fonction qui calcule la moyenne d'un tableau de notes
function calculerMoyenne($notes){
    $sum=array_sum($notes);
    $avg=$sum/count($notes);

    return $avg;
}
?>
 <table border="1">
    <tr>
    <th>
            nom
        </th>
        <th>
            prénom
        </th>
        <th>
            note1
        </th>
        <th>
            note2
        </th>
        <th>
            note3
        </th>
        <th>
            moyenne
        </th>

    </tr>
   <?php 
   foreach($students as $student){
     echo "<tr>";
    echo "<td>".$student["nom"]."</td>";
    echo "<td>".$student["prénom"]."</td>";
    echo "<td>".$student["notes"][0]."</td>";
    echo "<td>".$student["notes"][1]."</td>";
    echo "<td>".$student["notes"][2]."</td>";
    echo "<td>".calculerMoyenne($student["notes"]). "</td>";
    echo "</tr>";
   }
   
   ?>