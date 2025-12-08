<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prakticna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class='container'>
    <div class="row">
        <form class="row g-3" method="GET">
            <div class="col-sm-8">
                <input placeholder="Naziv predmeta" type="text" name="pretrazivanje" class="form-control" id="pretrazivanje" value="<?php echo isset($_GET['pretrazivanje']) ? htmlspecialchars($_GET['pretrazivanje']) : ''; ?>">
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Traži</button>
            </div>
        </form>
    </div>

    <div class="row mt-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Dodaj novi predmet
        </button>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Dodaj novi predmet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="unos_predmeta.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-12">
                            <label for="naziv_predmeta" class="form-label">Naziv predmeta</label>
                            <input type="text" class="form-control" name="naziv" id="naziv_predmeta" placeholder="naziv predmeta" required>
                        </div>
                        <div class="mb-12">
                            <label for="ime_profesora" class="form-label">Ime profesora</label>
                            <input type="text" class="form-control" name="profesor" id="ime_profesora" placeholder="ime profesora" required>
                        </div>
                        <div class="mb-12">
                            <label for="fond_sati" class="form-label">Godišnji fond sati</label>
                            <input type="number" class="form-control" name="fond_sati" id="fond_sati" placeholder="fond sati" required>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="uvjet" id="flexCheckIndeterminate" value="DA">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Predmet je uvjet za iduću godinu
                                </label>
                            </div>
                        </div>
                        <div class="mb-12">
                            <label for="opis_predmeta" class="form-label">Opis predmeta</label>
                            <textarea class="form-control" name="opis" id="opis_predmeta" placeholder="opis predmeta"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                        <button type="submit" class="btn btn-primary">Spremi predmet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Naziv predmeta</th>
                <th scope="col">Ime profesora</th>
                <th scope="col">Godišnji fond sati</th>
                <th scope="col">Predmet je uvjet za iduću godinu</th>
                <th scope="col">Opis predmeta</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $userString = file_get_contents(__DIR__."/predmeti.json");
                $usersData = json_decode($userString, true);

                $pretrazivanje = isset($_GET['pretrazivanje']) ? strtolower($_GET['pretrazivanje']) : '';

                if (isset($usersData)) {
                    foreach ($usersData as $key => $value) {

                        if ($pretrazivanje != '' && strpos(strtolower($value['naziv']), $pretrazivanje) === false) {
                            continue;
                        }
                        
                        $id = $value['id']; 
                        $naziv = $value['naziv'];
                        $profesor = $value['profesor'];
                        $fond_sati = $value['fond_sati'];
                        $uvjet = $value['uvjet'];
                        $opis = $value['opis'];

                        $tr_class = ($uvjet == 'DA') ? 'class="table-success"' : '';
                        
                        echo "<tr $tr_class>
                                <td>$id</td>
                                <td>$naziv</td>
                                <td>$profesor</td>
                                <td>$fond_sati</td>
                                <td>$uvjet</td>
                                <td>$opis</td>
                            </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

