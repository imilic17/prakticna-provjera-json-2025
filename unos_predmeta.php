<?php

    $userString = file_get_contents(__DIR__.'/predmeti.json');
    $usersData = json_decode($userString);

    $user = array('naziv' => $_POST['naziv'], 
                    'profesor' => $_POST['profesor'],
                    'fondsati' => $_POST['fondsati'],
                    'uvjet' => $_POST['uvjet'],
                    'opis' => $_POST['opis']);
    
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
    header("Location: http://localhost/FranMarosiPrakticna/prakticna-provjera-json-2025/unos_predmeta.php");        
    die();

?>