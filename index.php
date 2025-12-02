<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prakticna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Novi korisnik
        </button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novi predmet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="unos_korisnika.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-12">
                            <label for="NazivPredmeta" class="form-label">Naziv Predmeta</label>
                            <input type="text" class="form-control" name="NazivPredmeta" id="NazivPredmeta" placeholder="NazivPredmeta">
                        </div>
                        <div class="mb-12">
                            <label for="ime" class="form-label">Ime</label>
                            <input type="text" class="form-control" name="ime" id="ime" placeholder="ime">
                        </div>
                        <div class="mb-12">
                            <label for="GodisnjiFondSati" class="form-label">Godisnji Fond Sati</label>
                            <input type="text" class="form-control" name="GodisnjiFondSati" id="GodisnjiFondSati" placeholder="GodisnjiFondSati">
                        </div>
                        <div class="mb-12">
                            <label for="UvjetGod" class="form-label">Predmet je uvijet za iduću godinu</label>
                            <input type="text" class="form-control" name="UvjetGod" id="UvjetGod" placeholder="UvjetGod">
                        </div>
                        <div class="mb-12">
                            <label for="OpisPredmeta" class="form-label">Opis predmeta</label>
                            <input type="text" class="form-control" name="OpisPredmeta" id="OpisPredmeta" placeholder="OpisPredmeta">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                        <button type="submit" class="btn btn-primary">Spremi promjene</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Naziv Predmeta</th>
      <th scope="col">Ime profesora</th>
      <th scope="col">Godišnji fond sati</th>
      <th scope="col">Predmet je uvijet za iduću godinu</th>
      <th scope="col">Opis Predmeta</th>
    </tr>
  </thead>
  <tbody>
  <?php
            
            $predmetiString = file_get_contents(__DIR__ . '/predmeti.json');
            $predmetiJson = json_decode($predmetiString, true);

            
            if (isset($predmetiJson))
                    {
                        foreach ($predmetiJson as $key => $value)
                        {
                            $id = $value['id'];
                            $NazivPredmeta = $value['NazivPredmeta'];
                            $ime = $value['ime'];
                            $GodisnjiFondSati = $value['GodisnjiFondSati'];
                            $UvjetGod = $value['UvjetGod'];
                            $OpisPredmeta = $value['OpisPredmeta'];

                            
                            echo "<tr>
                            <td>$id</td>
                            <td>$NazivPredmeta</td>
                                <td>$ime</td>
                                <td>$GodisnjiFondSati</td>
                                <td>$UvjetGod</td>
                                <td>$OpisPredmeta</td>
                            </tr>";
                        }
                    }
        ?>
    </tbody>
</table>

    
</body>
</html>