<?php

    $predmetString = file_get_contents(__DIR__.'/predmeti.json');
    $predmetData = json_decode($predmetString);

    $user = array('idPredmeta' => $_POST['idPredmeta'], 'imePredmeta' => $_POST['imePredmeta'], 'nazivProfesora' => $_POST['nazivProfesora'], 'godisnjiFondSati' => $_POST['godisnjiFondSati'], 'obavezan' => $_POST['obavezan'], 'opisPredmeta' => $_POST['opisPredmeta']);
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

    header("Location: http://localhost/prakticna-provjera-json-2025/index.php");
    die();
?>