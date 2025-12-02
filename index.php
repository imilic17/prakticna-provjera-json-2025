<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Prakticna Provjera!</title>
  </head>
  <body>
    <div>
        <h1>Popis predmeta</h1>
        <div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target=#dodajPredmetModal>
                Dodaj
            </button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Ime predmeta</th>
                            <th>Profesor</th>
                            <th>sati</th>
                            <th>uvjet</th>
                            <th>opis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $jsonFile = 'predmeti.json';
                        $predmeti = [];
                        if(file_exists($jsonFile)){
                            $jsonData=file_get_contents($jsonFile);
                            $predmeti=json_decode($jsonData,true);
                        }
                        if (empty($predmeti)) {
                            echo '<tr><td colspan="6" class="text-center">Nema podataka o predmetima.</td></tr>';
                        } else {
                            foreach ($predmeti as $predmet) {
                                $klasa = ($predmet['uvjet'] === 'DA') ? 'zeleni-red' : '';
                                echo '<tr class="'. $klasa .'">';
                                echo '<td>' . htmlspecialchars($predmet['id']) . '</td>';
                                echo '<td>' . htmlspecialchars($predmet['ime']) . '</td>';
                                echo '<td>' . htmlspecialchars($predmet['profesor']) . '</td>';
                                echo '<td>' . htmlspecialchars($predmet['sati']) . '</td>';
                                echo '<td>' . htmlspecialchars($predmet['uvjet']) . '</td>';
                                echo '<td>' . htmlspecialchars($predmet['opis']) . '</td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <div id="#dodajPredmetModal" tabindex="-1" aria-labelledby="dodajPredmetModalLabel" aria-hidden="true">
            <div>
                <div>
                    <div>
                        <h5 id="#dodajPredmetModalLabel">Dodaj novi predmet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="unos_predmeta.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="ime" class="form-label">Ime predmeta</label>
                            <input type="text" class="form-control" id="ime" name="ime" required>
                        </div>
                        <div class="mb-3">
                            <label for="profesor" class="form-label">Profesor</label>
                            <input type="text" class="form-control" id="profesor" name="profesor" required>
                        </div>
                        <div class="mb-3">
                            <label for="sati" class="form-label">Godišnji sati</label>
                            <input type="number" class="form-control" id="fond_sati" name="fond_sati" required min="1">
                        </div>
                        <div class="mb-3">
                            <label for="uvjet" class="form-label">Je li uvjet za sljedeću godinu?</label>
                            <select class="form-select" id="uvjet" name="uvjet" required>
                                <option value="NE">NE</option>
                                <option value="DA">DA</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="opis" class="form-label">Opis predmeta</label>
                            <textarea class="form-control" id="opis" name="opis" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
                        <button type="submit" class="btn btn-success">Spremi predmet</button>
                    </div>
                </form>
                </div>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>