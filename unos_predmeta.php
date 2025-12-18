<?php

    $predmetiString = file_get_contents(__DIR__.'/predmeti.json');
    $predmetiJson = json_decode($userString,true);

    $nextId = 1;
    if(!empty($predmetiJson)){
        $ids = array_column($predmetiJson,'id');
        $nextId = max($ids)+1;
    }

    $user = array('ime_profesora' => $_POST['ime'], 'fond_sati' => $_POST['fond_sati'], 'naziv_predmeta' => $_POST['naziv_predmeta'], 'uvjet_za_sljedecu_godinu' => $POST['uvjet_za_sljedecu_godinu']);
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

    header("Location: index.php");
    die();
?>