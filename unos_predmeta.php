<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonFile = 'predmeti.json';
    $predmeti = [];
    if (file_exists($jsonFile)) {
        $jsonData = file_get_contents($jsonFile);
        $predmeti = json_decode($jsonData, true);
    }
    $noviId = 1;
    if (!empty($predmeti)) {
        $maxId = 0;
        foreach ($predmeti as $predmet) {
            if (isset($predmet['id']) && $predmet['id'] > $maxId) {
                $maxId = $predmet['id'];
            }
        }
        $noviId = $maxId + 1;
    }
    $noviPredmet = [
        'id' => $noviId,
        'ime' => $_POST['ime'],
        'profesor' => $_POST['profesor'],
        'sati' => intval($_POST['sati']),
        'uvjet' => $_POST['uvjet'],
        'opis' => $_POST['opis'] ?? ''
    ];
    
    $noviPredmet['id'] = $noviId;
    $predmeti[] = $noviPredmet;
    file_put_contents($jsonFile, json_encode($predmeti, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>