<?php

    $userString = file_get_contents(__DIR__.'/predmeti.json');
    $usersData = json_decode($userString);

    $user = array('ime' => $_POST['ime'], 'prezime' => $_POST['prezime'], 'datumRodenja' => $_POST['datumRodenja'], 'Godisnjifondsati' => $_POST['Godisnjifondsati']);
    if (isset($usersData))
    {
        $usersData[] = $user;
    }
    else
    {
        $usersData = array($user);
    }

    $newString = json_encode($usersData);
    file_put_contents(__DIR__.'/predmeti.json', $newString);

    header("Location: http://localhost/prakticna-provjera-json-2025/zadatak_s_unosom_korisnika/index.php");
    die();
?>