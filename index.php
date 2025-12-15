<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popis Predmeta</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Popis predmeta</h1>

    
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#dodajPredmetModal"> Dodaj predmet</button>
<!-- Modal -->
<div class="modal fade" id="dodajPredmetModal" tabindex="-1" aria-labelledby="dodajPredmetLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="dodajPredmetLabel">Dodaj novi predmet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST">
        <div class="modal-body">

          <div class="mb-3">
            <label class="form-label">ID Predmeta</label>
            <input type="text" name="id_predmeta" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Ime Predmeta</label>
            <input type="text" name="ime_predmeta" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Naziv Profesora</label>
            <input type="text" name="naziv_profesora" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Godišnji fond sati</label>
            <input type="number" name="godisnji_fond_sati" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Je li preduvjet?</label>
            <select name="je_preduvjet" class="form-select">
              <option value="1">DA</option>
              <option value="0">NE</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Opis predmeta</label>
            <textarea name="opis_predmeta" class="form-control" rows="3"></textarea>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
          <button type="submit" name="spremi_predmet" class="btn btn-primary">Spremi</button>
        </div>
      </form>

    </div>
  </div>
</div>


    <?php
    if (isset($_POST['spremi_predmet'])) {

        $json_file = 'predmeti.json';
    
        // Učitaj postojeće podatke
        $predmeti = [];
        if (file_exists($json_file)) {
            $predmeti = json_decode(file_get_contents($json_file), true);
            if (!is_array($predmeti)) $predmeti = [];
        }
    
        // Novi predmet
        $novi_predmet = [
            'id_predmeta' => $_POST['id_predmeta'],
            'ime_predmeta' => $_POST['ime_predmeta'],
            'naziv_profesora' => $_POST['naziv_profesora'],
            'godisnji_fond_sati' => $_POST['godisnji_fond_sati'],
            'je_preduvjet' => $_POST['je_preduvjet'] == "1",
            'opis_predmeta' => $_POST['opis_predmeta']
        ];
    
        // Dodaj u listu
        $predmeti[] = $novi_predmet;
    
        // Spremi natrag u JSON
        file_put_contents($json_file, json_encode($predmeti, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    
        // Refresh da se modal zatvori i tablica osvježi
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    
    
    $json_file = 'predmeti.json';

  
    if (file_exists($json_file)) {
        
        $jsonData = file_get_contents($json_file);
        
        
        $predmeti = json_decode($jsonData, true);

        if ($predmeti !== null && is_array($predmeti)) {
           
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Predmeta</th>
                            <th>Ime Predmeta</th>
                            <th>Naziv Profesora</th>
                            <th>Fond Sati</th>
                            <th>Preduvjet?</th>
                            <th>Opis Predmeta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($predmeti as $predmet): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($predmet['id_predmeta']); ?></td>
                                <td><?php echo htmlspecialchars($predmet['ime_predmeta']); ?></td>
                                <td><?php echo htmlspecialchars($predmet['naziv_profesora']); ?></td>
                                <td><?php echo htmlspecialchars($predmet['godisnji_fond_sati']); ?></td>
                                <td>
                                    <?php 
                                    
                                    echo $predmet['je_preduvjet'] ? '<span class="badge bg-success">DA</span>' : '<span class="badge bg-danger">NE</span>'; 
                                    ?>
                                </td>
                                <td><?php echo htmlspecialchars($predmet['opis_predmeta']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo '<div class="alert alert-warning" role="alert">Greška prilikom dekodiranja JSON podataka. Provjerite format datoteke.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Datoteka <strong>' . htmlspecialchars($json_file) . '</strong> nije pronađena.</div>';
    }
    ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
