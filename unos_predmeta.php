<?php

$jsonFile = __DIR__.'/predmeti.json';
$data = [];


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
     header('Location: index.php?status=error');
    exit;
}


if (file_exists($jsonFile)) {
    $predmetiString = file_get_contents($jsonFile);
    $decodedData = json_decode($predmetiString, true);
    if ($decodedData !== null && is_array($decodedData)) {
        $data = $decodedData;
    }
}


$nextId = 1;
if (!empty($data)) {
    $last = end($data);
    if (isset($last['id']) && is_numeric($last['id'])) {
        $nextId = $last['id'] + 1;
    } else {
        $nextId = count($data) + 1;
    }
}


$novi_predmet = [
    "id" => $nextId,
    'ime_predmeta' => $_POST['ime_predmeta'] ?? '',
    'naziv_profesora' => $_POST['naziv_profesora'] ?? '',
    'godisnji_fond_sati' => $_POST['godisnji_fond_sati'] ?? '',
    'je_li_predmet_uvijet_za_sljedecu_godinu' => isset($_POST['je_li_predmet_uvijet_za_sljedecu_godinu']) ? true : false,
    'opis_predmeta' => $_POST['opis_predmeta'] ?? ''
];


$data[] = $novi_predmet;


$newString = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

if (file_put_contents($jsonFile, $newString) !== false) {
    header('Location: index.php?status=success');
    exit;
} else {
     header('Location: index.php?status=error');
    exit;
}
?>