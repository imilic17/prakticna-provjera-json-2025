<?php

$predmetiString = file_get_contents(__DIR__ . '/predmeti.json');
$predmetiJson = json_decode($predmetiString, true);


$nextId = 1; 
if (!empty($predmetiJson)) {
    $id1 = array_column($predmetiJson, 'id');
    $nextId = max($id1) + 1;
}

$predmet = array(
    'id' => $nextId,
    'NazivPredmeta' => $_POST['NazivPredmeta'],
    'ime' => $_POST['ime'],
    'GodisnjiFondSati' => $_POST['GodisnjiFondSati'],
    'UvjetGod' => $_POST['UvjetGod'],
    'OpisPredmeta' => $_POST['OpisPredmeta']
);

if (isset($predmetiJson))
{
    $predmetiJson[] = $predmet;
}
else
{
    $predmetiJson = array($predmet);
}

$newString = json_encode($predmetiJson);
file_put_contents(__DIR__.'/predmeti.json', $newString);

header("Location: http://localhost/Vjezba/prakticna-provjera-json-2025/index.php");
die();

?>