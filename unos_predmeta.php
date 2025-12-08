<?php

$dir = __DIR__.'/predmeti.json';

$predmetiString = file_get_contents($dir);
$predmeti = json_decode($predmetiString, true);


if(empty($predmeti)){
    $newID = 1;
}
else{
    $last = end($predmeti);
    $newID = $last['id'] + 1;
}


$user = array(
    'id' => $newID,
    'naziv' => $_POST['naziv'],
    'ime' => $_POST['ime'],
    'fond' => $_POST['fond'],
    'uvjet' => $_POST['uvjet'],
    'opis' => $_POST['opis']
    );
    if (isset($predmeti))
    {
        $predmeti[] = $user;
    }
    else
    {
        $predmeti = array($user);
    }

    $newString = json_encode($predmeti);
    file_put_contents(__DIR__.'/predmeti.json', $newString);

    header("Location: http://localhost/znamenacek/prakticna-provjera-json-2025/index.php");
    die();

?>

