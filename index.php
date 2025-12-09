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
    }  ?>

  <div class="container mt-5">
    <h1 class="mb-4">Dodaj novi predmet</h1>
    <form method="POST" action="index.php">
      <div class="mb-3">
        <label for="ime_predmeta" class="form-label">Ime predmeta</label>
        <input type="text" class="form-control" id="ime_predmeta" name="ime_predmeta" required>
      </div>
      <div class="mb-3">
        <label for="naziv_profesora" class="form-label">Naziv profesora</label>
        <input type="text" class="form-control" id="naziv_profesora" name="naziv_profesora" required>
      </div>
      <div class="mb-3">
        <label for="godisnji_fond_sati" class="form-label">Godišnji fond sati</label>
        <input type="number" class="form-control" id="godisnji_fond_sati" name="godisnji_fond_sati" required>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="je_li_predmet_uvijet_za_sljedecu_godinu" name="je_li_predmet_uvijet_za_sljedecu_godinu">
        <label class="form-check-label" for="je_li_predmet_uvijet_za_sljedecu_godinu">Je li predmet uvjet za sljedeću godinu</label>
      </div>
      <div class="mb-3">
        <label for="opis_predmeta" class="form-label">Opis predmeta</label>
        <textarea class="form-control" id="opis_predmeta" name="opis_predmeta" rows="3" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Dodaj predmet</button>
    </form>
  </div>
 
</body>

</html>