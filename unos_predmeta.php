<?php

    $predmetString = file_get_contents(__DIR__.'/predmeti.json');
    $predmetData = json_decode($predmetString);

 

    $predmet = array('id' => $newID, 'naziv_predmeta' => $_POST['naziv_predmeta'], 'ime_profesora' => $_POST['ime_profesora'], 'godisnji_fond_sati' => $_POST['godisnji_fond_sati'], 'predmet_je_uvjet' => $_POST['predmet_je_uvjet'], 'opis_predmeta' => $_POST['opis_predmeta']);
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

    header("Location: http://localhost/zadatak_s_unosom_korisnika/index.php");
    die();
?>