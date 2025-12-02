<?php
$path = __DIR__ . '/predmeti.json';

$predmetiString = file_get_contents($path);
$predmeti = json_decode($predmetiString, true);

if(!is_array($predmeti)) {
    $predmeti = [];
}

if(empty($predmeti)){
    $newId = 1;
} else {
    $last = end($predmeti);
    $newId = $last['id'] + 1;
}


$uvjet = isset($_POST['uvjet']) ? "DA" : "NE";

$novi =[
    "id" => $newId,
    "naziv" => $_POST['naziv'],
    "profesor" => $_POST['profesor'],
    "sati" => (int)$_POST['sati'],
    "uvjet" => $uvjet,
    "opis" => $_POST['opis']
];

$predmeti[] = $novi;

file_put_contents($path, json_encode($predmeti, JSON_PRETTY_PRINT));
header('Location: index.php');
exit();
?>
