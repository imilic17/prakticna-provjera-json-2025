<?php

$dir = __DIR__.'/predmeti.json';

$predmetiString = file_get_contents($dir);
$predmeti = json_decode($predmetiString, true);


if(!is_array($predmeti)){
    $predmeti = [];
}

if(empty($predmeti)){
    $id=1;
}
else{
    $zadnjiId = end($predmeti);
    $noviId = $last['id'] + 1;
}

$noviPredmet = [
    "id" -> $noviId,
    "naziv" -> $_POST['naziv'],
    "ime" -> $_POST['ime'],
    "fond" -> $_POST['fond'],
    "uvjet" -> $_POST['uvjet'],
    "opis" -> $_POST['opis']
];

$predmeti[] = $noviPredmet;

file_put_contents($dir, json_encode($predmeti, JSON_PRETTY_PRINT));
header('Location: index.php');
exit();

?>