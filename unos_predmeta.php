<?php

    $predmetiString = file_get_contents(__DIR__.'/predmeti.json');
    $predmetiJson = json_decode($predmetiString,true);

    $nextId = 1;
    if(!empty($predmetiJson)){
        $ids = array_column($predmetiJson,'id');
        $nextId = max($ids)+1;
    }

    $uvjet = isset($_POST['UvjetGod']) ? 'DA' : 'NE';


    $predmet =array(
        'id'=>$nextId,
        'ime'=>$_POST['ime'],
        'NazivPredmeta'=>$_POST['NazivPredmeta'],
        
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