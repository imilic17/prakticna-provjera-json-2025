<?php

$predmetiString = file_get_contents(__DIR__ . "/predmeti.json");
$predmeti = json_decode($predmetiString, true);

$filter = $_GET['filter'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Predmeti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="p-4">

    <div class="container">
        <h2 class="mb-4">Popis predmeta</h2>

        <form class="row g-3 mb-4" method="GET" onsubmit="return clearFilter()">
            <div class="col-sm-4">
                <input type="text" name="filter" class="form-control" placeholder="Upiši naziv predmeta...">

            </div>
            <div class="col-sm-2">
                <button class="btn btn-primary">Traži</button>
            </div>
        </form>

        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#noviModal">
            Dodaj predmet
        </button>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Naziv predmeta</th>
                    <th>Ime profesora</th>
                    <th>Broj sati godišnje</th>
                    <th>Uvijet za iduću godinu</th>
                    <th>Opis predmeta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($predmeti)) {
                    foreach ($predmeti as $p) {
                        if ($filter !== "") {
                            $uNazivu = stripos($p['naziv'], $filter);
                            $uProfesoru = stripos($p['profesor'], $filter);

                            if ($uNazivu === false && $uProfesoru === false) {
                                continue;
                            }
                        }

                        $rowClass = (strtoupper($p['uvjet']) === 'DA') ? 'table-success' : 'table-danger';

                        echo "<tr class='$rowClass'>
                            <td>{$p['id']}</td>
                            <td>{$p['naziv']}</td>
                            <td>{$p['profesor']}</td>
                            <td>{$p['sati']}</td>
                            <td>{$p['uvjet']}</td>
                            <td>{$p['opis']}</td>
                            </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="noviModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST" action="unos_predmeta.php">

                    <div class="modal-header">
                        <h5 class="modal-title">Dodaj novi predmet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <label class="form-label">Naziv predmeta</label>
                        <input name="naziv" class="form-control" required>

                        <label class="form-label mt-2">Ime profesora</label>
                        <input name="profesor" class="form-control" required>

                        <label class="form-label mt-2">Broj sati godišnje</label>
                        <input type="number" name="sati" class="form-control" required>

                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="uvjet" id="uvjetCheckbox" value="DA">
                            <label class="form-check-label" for="uvjetCheckbox">
                                Uvjet za iduću godinu
                            </label>
                        </div>


                        <label class="form-label mt-2">Opis predmeta</label>
                        <textarea name="opis" class="form-control" required></textarea>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                        <button type="submit" class="btn btn-primary">Spremi</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

<script>
    function clearFilter() {
        const value = document.querySelector("input[name='filter']").value;


        window.location.href = "?filter=" + encodeURIComponent(value);

        return false;
    }
</script>

</html>