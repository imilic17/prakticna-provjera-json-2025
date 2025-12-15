<?php

    $predmetString = file_get_contents(__DIR__.'/predmetii.json');
    $predmetiiData = json_decode($userString);

    if(empty($predmet)){
        $newID=1;
    }
    else{
        $last = end($predmeti);
        $newID = $last["id"] + 1;
    }

    $user = array('id' => $newID,'ime' => $_POST['ime'], 'prezime' => $_POST['prezime'], 'datumRodenja' => $_POST['datumRodenja'], 'Godisnjifondsati' => $_POST['Godisnjifondsati']);
    if (isset($usersData))
    {
        $predmetiData[] = $predmet;
    }
    else
    {
        $predmetiData = array($predmet);
    }

    $newString = json_encode($predmetiData);
    file_put_contents(__DIR__.'/predmetii.json', $newString);

    header("Location: http://localhost/prakticna-provjera-json-2025/zadatak_s_unosom_korisnika/index.php");
    die();
?>