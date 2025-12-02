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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="p-4">

    <div class="container">
        <h2 class="mb-4">Popis predmeta</h2>

        <form class="row g-3 mb-4" method="GET">
            <div class="col-sm-4">
                <input type="text" name="filter" class="form-control" placeholder="Upiši naziv predmeta..."
                 value="<?php echo htmlspecialchars($filter) ?>">
            </div>
            <div class="col-sm-2">
                <button class="btn btn-primary">Traži</button>
            </div>
        </form>

        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#noviModal">
            Dodaj predmet
        </button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>