<?php

    $userString = file_get_contents(__DIR__.'/predmeti.json');
    $usersData = json_decode($userString);

    $user = array('id' => $_POST['id'],'ime_profesora' => $_POST['ime'], 'fond_sati' => $_POST['fond_sati'], 'naziv_predmeta' => $_POST['naziv_predmeta'], 'uvjet_za_sljedecu_godinu' => $POST['uvjet_za_sljedecu_godinu']);
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

    header("Location: http://localhost/pernar/prakticna-provjera-json-2025/index.php");
    die();
?>