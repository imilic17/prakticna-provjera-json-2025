<?php
    $predmetiString = file_get_contents(__DIR__.'/predmeti.json');
    $predemtiData = json_decode($predmetiString);

    $predmet = array('ime_predmeta' => $_POST['ime_predmeta'], 'naziv_profesora' => $_POST['naziv_profesora'], 'godisnji_fond' => $_POST['godisnji_fond'],'uvjet_za_iducu_godinu' => $_POST['uvjet_za_iducu_godinu'],'opis_predmeta' => $_POST['opis_predmeta']);
    if (isset($predmetiData))
    {
        $predemtiData[] = $predmet;
    }
    else
    {
        $predmetiData = array($predmet);
    }

    $newString = json_encode($predmetiData);
    file_put_contents(__DIR__.'/predmeti.json', $newString);

    header("Location: http://localhost/php_LS/prakticna-provjera-json-2025/index.php");
    die();
?>