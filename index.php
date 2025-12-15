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
 $jsonFile = __DIR__.'/predmeti.json';
 $data=[];
 $predmetiString = '';
 $data =  json_decode($predmetiString, true);
 $nextId=1;

 if(!file_exists($jsonFile)){
    if(!is_writable(__DIR__)){
      echo '<div class="container mt-3"><div class="alert alert-danger" role="alert"> JSON datoteka ne postoji i direktorij nije upisiv. Provjerite dozvole.</div></div>';
      exit;
    }
    file_put_contents($jsonFile, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  }

  $predmetiString= file_get_contents($jsonFile);
  if($predmetiString){
    $data = json_decode($predmetiString, true);
    if($data === null || !is_array($data)){
      $data = [];
    }
  }
  if(!empty($data)){
    $lastElement = end($data);
    if(isset($lastElement["id"]) && is_numeric($lastElement["id"])){
      $nextId = $lastElement["id"] + 1;
    } else {
      $nextId = count($data) + 1;
    }
  }
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $novi_predmet = [
      "id" => $nextId,
      'ime_predmeta' => $_POST['ime_predmeta'] ?? '',
      'naziv_profesora' => $_POST['naziv_profesora'] ?? '',
      'godisnji_fond_sati' => $_POST['godisnji_fond_sati'] ?? '',
      'je_li_predmet_uvijet_za_sljedecu_godinu' => isset($_POST['je_li_predmet_uvijet_za_sljedecu_godinu']) ? true : false,
      'opis_predmeta' => $_POST['opis_predmeta'] ?? ''
    ];
    $data[] = $novi_predmet;
    $newString = json_encode($data,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    if(file_put_contents($jsonFile, $newString)!== false){
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

 <hr class="my-5">

  <h2>Lista unesenih predmeta</h2>
  <?php 
  if(!empty($data)){
    echo '
    <table class="table table-light table-striped">
        <thead>
            <tr>
             <th>ID</th>
                <th>Ime predmeta</th>
                <th>Naziv profesora</th>
                <th>Godišnji fond sati</th>
                <th>Uvjet za sljedeću godinu</th>
                <th>Opis predmeta</th>
            </tr>
        </thead>
        <tbody>';
  $count = 1;
  foreach($data as $predmet){
    $isUvijet = isset($predmet['je_li_predmet_uvijet_za_sljedecu_godinu']) && $predmet['je_li_predmet_uvijet_za_sljedecu_godinu'] === true;
  
    $rowClass = $isUvijet ? "uvijet-za-prolaz" :"";

    echo '
      <tr class="'.$rowClass.'">
        <td>'.htmlspecialchars($predmet['id']).'</td>
        <td>'.htmlspecialchars($predmet['ime_predmeta']).'</td>
        <td>'.htmlspecialchars($predmet['naziv_profesora']).'</td>
        <td>'.htmlspecialchars($predmet['godisnji_fond_sati']).'</td>
        <td>'.($isUvijet ? 'true' : 'false').'</td>
        <td>'.htmlspecialchars($predmet['opis_predmeta']).'</td>
      </tr>';
  } 
  echo"</tbody></table>";}
  else
  {
    echo"<div class='alert alert-info'>Trenutno nema unesenih predmeta</div>";
  }
  ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>