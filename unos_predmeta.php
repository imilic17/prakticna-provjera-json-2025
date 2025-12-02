<?php

    $userString = file_get_contents(__DIR__.'/predmeti.json');
    $usersData = json_decode($userString);

    $user = array('naziv' => $_POST['Naziv predmeta'], 
                    'profesor' => $_POST['Ime profesora'],
                    'fondsati' => $_POST['Godišnji fond sati'],
                    'uvjet' => $_POST['Predmet je uvjet za iduću godinu'],
                    'Opis' => $_POST['Opis predmeta']);
    
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