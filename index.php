<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista predmeta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <style>
    
   .uvijet-za-prolaz > td {
        background-color: #26ba77ff !important;}
</style>
</head>

<body>

<?php

$jsonFile = __DIR__.'/predmeti.json';
$data = [];
$nextId = 1;


if(!file_exists($jsonFile)){
   
    if(!is_writable(__DIR__)){
        echo '<div class="container mt-3"><div class="alert alert-danger" role="alert"> JSON datoteka ne postoji i direktorij nije upisiv. Provjerite dozvole.</div></div>';
        exit;
    }
    file_put_contents($jsonFile, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}


$predmetiString = file_get_contents($jsonFile);
if($predmetiString){
    $decodedData = json_decode($predmetiString, true);
    if($decodedData !== null && is_array($decodedData)){
        $data = $decodedData;
    }
}


if (!empty($data)) {
    $last = end($data);
    if (isset($last['id']) && is_numeric($last['id'])) {
        $nextId = $last['id'] + 1;
    } else {
        $nextId = count($data) + 1;
    }
}


if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
        echo '<div class="container mt-3"><div class="alert alert-success" role="alert"> Predmet je uspješno dodan i pohranjen!</div></div>';
    } elseif ($_GET['status'] === 'error') {
        echo '<div class="container mt-3"><div class="alert alert-danger" role="alert"> Greška pri pisanju u JSON datoteku ili neispravan zahtjev.</div></div>';
    }
}

$searchTerm = $_GET['search'] ?? '';
if(!empty($searchTerm)){
  $filteredData = [];
  $searchLower = strtolower($searchTerm);

  foreach($data as $predmet){
    $searchString= strtolower(
      $predmet['ime_predmeta'] . ' ' .
      $predmet['naziv_profesora'] . ' ' .
      $predmet['opis_predmeta']
    );
    if(strpos($searchString,$searchLower) !== false){
      $filteredData[] = $predmet;
    }
  }
  $dataToDisplay = $filteredData;}
  else{$dataToDisplay = $data;}

?>

<div class="container mt-5">
    <h1 class="mb-4">Lista predmeta</h1>

    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#dodajPredmetModal">
         Dodaj novi predmet
    </button>
    
    <hr>
    <form method="GET" action="" class="search-form">
    <label for="search">Pretraži predmete:</label>
    <input type="text" 
           id="search" 
           name="search" 
           placeholder="Unesite naziv, profesora ili opis..." 
           value="<?php echo htmlspecialchars($searchTerm); ?>"
           style="width: 300px; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    <button type="submit" 
            style="padding: 8px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
        Pretraži
    </button>
    <?php if (!empty($searchTerm)): ?>
        <a href="<?php echo htmlspecialchars(basename($_SERVER['PHP_SELF'])); ?>" 
           style="margin-left: 10px; text-decoration: none; color: #dc3545;">
            Poništi pretragu
        </a>
    <?php endif; ?>
</form>

<hr>
    <hr>
    
    <h2>Popis unesenih predmeta</h2>
    <?php
    if(!empty($dataToDisplay)){
        echo '
        <div class="table-responsive">
            <table class="table table-light table-striped table-hover">
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
        
        foreach($dataToDisplay as $predmet){
            $isUvijet = isset($predmet['je_li_predmet_uvijet_za_sljedecu_godinu']) && $predmet['je_li_predmet_uvijet_za_sljedecu_godinu'] === true;
            $rowClass = $isUvijet ? "uvijet-za-prolaz" :"";

            echo '
                <tr class="'.$rowClass.'">
                <td>'.htmlspecialchars($predmet['id']).'</td>
                <td>'.htmlspecialchars($predmet['ime_predmeta']).'</td>
                <td>'.htmlspecialchars($predmet['naziv_profesora']).'</td>
                <td>'.htmlspecialchars($predmet['godisnji_fond_sati']).'</td>
                <td>'.($isUvijet ? 'DA' : 'NE').'</td>
                <td>'.htmlspecialchars($predmet['opis_predmeta']).'</td>
            </tr>';
        }
        echo"</tbody></table></div>";}
    else
    {
        echo"<div class='alert alert-info'>Trenutno nema unesenih predmeta</div>";
    }
    ?>
</div>


<div class="modal fade" id="dodajPredmetModal" tabindex="-1" aria-labelledby="dodajPredmetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dodajPredmetModalLabel">Dodavanje novog predmeta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="unos_predmeta.php">
                <div class="modal-body">
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
                        <input type="checkbox" class="form-check-input" id="je_li_predmet_uvijet_za_sljedecu_godinu_modal" name="je_li_predmet_uvijet_za_sljedecu_godinu">
                        <label class="form-check-label" for="je_li_predmet_uvijet_za_sljedecu_godinu_modal">Je li predmet uvjet za sljedeću godinu</label>
                    </div>
                    <div class="mb-3">
                        <label for="opis_predmeta" class="form-label">Opis predmeta</label>
                        <textarea class="form-control" id="opis_predmeta" name="opis_predmeta" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                    <button type="submit" class="btn btn-primary">Dodaj predmet</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>