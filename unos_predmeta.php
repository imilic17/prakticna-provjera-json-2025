<?php

$path = __DIR__ . '/predmeti.json';

$predmetString = file_get_contents($path);
$predmetData = json_decode($predmetString, true); 


if (empty($predmetData)) {
    $newID = 1;
    $predmetData = [];
} else {
    $last = end($predmetData);
    $newID = $last['id'] + 1;
}

$predmet = [
    'id' => $newID,
    'naziv_predmeta' => $_POST['naziv_predmeta'],
    'ime_profesora' => $_POST['ime_profesora'],
    'godisnji_fond_sati' => $_POST['godisnji_fond_sati'],
    'predmet_je_uvjet' => $_POST['predmet_je_uvjet'], 
    'opis_predmeta' => $_POST['opis_predmeta']
];

$predmetData[] = $predmet;

file_put_contents($path, json_encode($predmetData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

header("Location: index.php");// redirect na index jer nije bilo
exit;
