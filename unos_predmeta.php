<?php

    $predmetiString = file_get_contents(__DIR__.'/predmeti.json');
    $predmetiJson = json_decode($userString,true);

    $nextId = 1;
    if(!empty($predmetiJson)){
        $ids = array_column($predmetiJson,'id');
        $nextId = max($ids)+1;
    }

    $uvjet= isset($_POST['UvjetGod']) ? $_POST['UvjetGod'] :'NE';

    $predmet =array(
        'id'=>$nextId,
        'NazivPredmeta'=>$_POST['NazivPredmeta'],
        'ime'=>$_POST['ime'],
        'GodisnjiFondSati'=>$_POST['GodisnjiFondSati'],
        'UvjetGod'=>$uvjet,
        'OpisPredmeta'=>$_POST['OpisPredmeta']
    );

    if(isset($predmetiJson)){
        $predmetiJson[]=$predmet;
    }else{
        $predmetiJson=array($predmet);
    }

    $newString = json_encode($predmetiJson);
    file_put_contents(__DIR__.'/predmeti.json', $newString);

    header("Location: index.php");
    die();
?>