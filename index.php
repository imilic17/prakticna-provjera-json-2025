<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HTML5 Boilerplate</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
 
<?php 
$predmetiString = file_get_contents(__DIR__.'/predmeti.json');
 $data =  json_decode($predmetiString, true);

  $predmetiString= file_get_contents(__DIR__.'/predmeti.json');
  if($predmetiString){
    $data = json_decode($predmetiString, true);
    if($data === null){
      $data = [];
    }
  }
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $novi_predmet = [
      'ime_predmeta' => $_POST['ime_predmeta'] ?? '',
      'naziv_profesora' => $_POST['naziv_profesora'] ?? '',
      'godisnji_fond_sati' => $_POST['godisnji_fond_sati'] ?? '',
      'je_li_predmet_uvijet_za_sljedecu_godinu' => isset($_POST['je_li_predmet_uvijet_za_sljedecu_godinu']) ? true : false,
      'opis_predmeta' => $_POST['opis_predmeta'] ?? ''
    ];
    $data[] = $novi_predmet;
    $newString = json_encode($data,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    if(file_put_contents($jsonFIle, $newString)!== false){
      echo '<div class="container mt-3"><div class="alert alert-success" role="alert"> Predmet je uspješno dodan i pohranjen!</div></div>';
    }
    else{
      echo '<div class="container mt-3"><div class="alert alert-danger" role="alert"> Greška pri pisanju u JSON datoteku. Provjerite dozvole.</div></div>';
    }
    } ?>
  
   
    

     
 






?>
 <form action="index.php" method="$_POST">
  <div class="form-group">
    <input class="form-control" type="text" placeholder="Ime predmeta">
  </div>
  <div class="form-group">
    <input class="form-control" type="text" placeholder="Naziv profesora">
  </div>
   <div class="form-group">
    <input class="form-control" type="text" placeholder="Godišnnji fond sati">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">je li predmet uvijet za sljedecu godinu</label>
  </div>
  <div class="form-group">
    <input class="form-control" type="text" placeholder="Opis predmeta">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>

</html>