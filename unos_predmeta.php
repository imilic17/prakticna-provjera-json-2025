<?php

    $predmetString = file_get_contents(__DIR__.'/predmeti.json');
    $predmetData = json_decode($predmetString);

    $predmet = array(
    'predmet' => $_POST['predmet'],
     'ime_prof' => $_POST['ime_prof'],
     'fond_sati' => $_POST['fond_sati'],
     'pjuzig' => $_POST['pjuzig'],
    'opis_predmeta' => $_POST['opis_predmeta']);
    
    if (isset($predmetData))
    {
        $predmetData[] = $predmet;
    }
    else
    {
        $predmetData = array($predmet);
    }

    $newString = json_encode($predmetData);
    file_put_contents(__DIR__.'/predmeti.json', $newString);

    header("Location: index.php");
    die();
?>