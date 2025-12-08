<?php
    $userString = file_get_contents(__DIR__.'/predmeti.json');
    $usersData = json_decode($userString); 


    $predmet = array('id' => $_POST['id'], 'naziv' => $_POST['naziv'], 'profesor' => $_POST['profesor'],
     'fond_sati' => $_POST['fond_sati'], 'uvjet' => isset($_POST['uvjet']) ? 'DA' : 'NE',  'opis' => $_POST['opis']);
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

    header("Location: http://localhost/prakticna-provjera-json-2025/index.php");
    die();
?>