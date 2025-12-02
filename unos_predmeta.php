<?php

    $userString = file_get_contents(__DIR__.'/predmeti.json');
    $usersData = json_decode($userString);

    $user = array('nazivPredmeta' => $_POST['nazivPredmeta'], 'imeProfesora' => $_POST['imeProfesora'], 'godisnjiFondSati' => $_POST['godisnjiFondSati'],'predmetJeUvjekZaIducuGodinu' => $_POST['predmetJeUvjetZaIducuGodinu'],'opisPredmeta' => $_POST['opisPredmeta']);
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

    header("Location: http://localhost/PRAKTICNA-PROVJERA-JSON-2025/index.php");
    die();
?>