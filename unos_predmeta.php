<?php

    $userString = file_get_contents(__DIR__.'/predmeti.json');
    $usersData = json_decode($userString);

    $predmet = array('naziv_predmeta' => $_POST['naziv_predmeta'], 'ime_profesora' => $_POST['ime_profesora'], 'godisnji_fond' => $_POST['godisnji_fond']);
    if (isset($usersData))
    {
        $usersData[] = $predmet;
    }
    else
    {
        $usersData = array($predmet);
    }

    $newString = json_encode($usersData);
    file_put_contents(__DIR__.'/predmeti.json', $newString);

    header("Location: http://localhost/zadatak_s_unosom_korisnika/index.php");
    die();
?>