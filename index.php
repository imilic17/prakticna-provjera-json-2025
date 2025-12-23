<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tablica Borna</title>
  </head>
  <body>
  <table class="table">
  <thead>

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Unesi predmet ->
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unos predmeta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="unos_predmeta.php" method="POST">
  <div class="mb-3">
    <label for="predmet" class="form-label">Naziv predmeta</label>
    <input type="predmet" class="form-control" id="predmet" name ="predmet" aria-describedby="predmet">
    <div id="predmet" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="ime_prof" class="form-label">Ime profesora</label>
    <input type="text" class="form-control" id="ime_prof" name ="ime_prof" >
  </div>
  <div class="mb-3">
    <label for="fond_sati" class="form-label">Godišnji fond sati</label>
    <input type="number" class="form-control" id="fond_sati" name ="fond_sati" >
  </div>
  <div class="mb-3">
    <label for="pjuzig" class="form-label">Predmet je uvjet za iduću godinu - da/ne</label>
    <input type="text" class="form-control" id="pjuzig" name ="pjuzig" >
  </div>
  <div class="mb-3">
    <label for="opis_predmeta" class="form-label">Opis predmeta</label>
    <input type="text" class="form-control" id="opis_predmeta" name ="opis_predmeta" >
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Potvrdi svoj unos</label>
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Naziv Predmeta</th>
      <th scope="col">Ime Profesora</th>
      <th scope="col">Godišnji Fond Sati</th>
      <th scope="col">Predmet je uvjet za iduću godinu</th>
      <th scope="col">Opis predmeta</th>
    </tr>
  </thead>
  <tbody>
  <?php
                    $userString = file_get_contents(__DIR__."/predmeti.json");
                    $usersData = json_decode($userString, true);

                    if (isset($usersData))
                    {
                        foreach ($usersData as $key => $value)
                        {
                            $NazivPredmeta = $value['predmet']?? "";
                                   $ImeProfesora = $value['ime_prof']?? "";

                            $GodFondSat = $value['fond_sati']?? "";
                            $PJUZIG = $value['pjuzig'] ?? "";
                            $OpisPredmeta = $value['opis_predmeta']?? "";
                          
                           
                            echo "<tr>
                                <td>&nbsp</td>
                                <td>$NazivPredmeta</td>
                                <td>$ImeProfesora</td>
                                <td>$GodFondSat</td>
                                <td>$PJUZIG</td>
                                <td>$OpisPredmeta</td>
                            </tr>";
                        }
                    }
                ?>
   
  </tbody>
</table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>