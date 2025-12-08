<?php


$predmetString = file_get_contents(__DIR__ . '/predmeti.json');
$predmetiData = json_decode($predmetString, true);


if (!is_array($predmetiData)) {
    $predmetiData = [];
}


$nextId = 1;
if (!empty($predmetiData)) {
    $last = end($predmetiData);
    $nextId = $last['id'] + 1;
}

$uvjet = ($_POST['radioDefault'] === 'on' || $_POST['radioDefault'] === 'Da') ? true : false;


$predmet = [
    'id' => $nextId,
    'naziv-predmeta' => $_POST['naziv-predmeta'],
    'ime-profesora' => $_POST['ime-profesora'],
    'godisnji-fond-sati' => intval($_POST['godisnji-fond-sati']),
    'predmet-je-uvjet-za-iducu-godinu' => $uvjet,
    'opis-predmeta' => $_POST['opis-predmeta']
];


$predmetiData[] = $predmet;


file_put_contents(__DIR__ . '/predmeti.json', json_encode($predmetiData, JSON_PRETTY_PRINT));


header("Location: index.php");
exit;

?>
