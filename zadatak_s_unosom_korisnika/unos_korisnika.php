<?php

    $userString = file_get_contents(__DIR__.'/korisnici.json');
    $usersData = json_decode($userString);

    $user = array('ime' => $_POST['ime'], 
                    'prezime' => $_POST['prezime'], 
                    'datumRodenja' => $_POST['datumRodenja']);
    if (isset($usersData))
    {
        $usersData[] = $user;
    }
    else
    {
        $usersData = array($user);
    }

    $newString = json_encode($usersData);
    file_put_contents(__DIR__.'/korisnici.json', $newString);

    header("Location: http://localhost/FranMarosiPrakticna/prakticna-provjera-json-2025/zadatak_s_unosom_korisnika/index.php");
    die();
?>