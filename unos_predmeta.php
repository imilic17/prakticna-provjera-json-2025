<?php

    $predmetString = file_get_contents(__DIR__.'/predmeti.json');
    $predmetData = json_decode($predmetString);

    if(empty($predmet)){
        $newID=1;
    }
    else{
        $last = end($predmeti);
        $newID = $last["id"] + 1;
    }

    $predmet = array('id' => $newID,'naziv_predmeta' => $_POST['naziv_predmeta'],'ime' => $_POST['ime'], 'prezime' => $_POST['prezime'], 'datumRodenja' => $_POST['datumRodenja'], 'Godisnjifondsati' => $_POST['Godisnjifondsati'],'predmet_je_uvjet' => $_POST['predmet_je_uvjet'],'opis_predmeta' => $_POST['opis_predmeta']);
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