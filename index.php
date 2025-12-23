<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Dodaj predmet
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dodaj novi predmet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="unos_predmeta.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-12">
                            <label for="naziv_predmeta" class="form-label">Naziv predmeta</label>
                            <input type="text" class="form-control" name="naziv_predmeta" id="naziv_predmeta" placeholder="naziv predmeta">
                        </div>
                        <div class="mb-12">
                            <label for="ime_profesora" class="form-label">Ime profesora</label>
                            <input type="text" class="form-control" name="ime_profesora" id="ime_profesora" placeholder="ime profesora">
                        </div>
                        <div class="mb-12">
                            <label for="god_fond_Sati" class="form-label">Godisnji fond sati</label>
                            <input type="text" class="form-control" name="god_fond_Sati" id="god_fond_Sati" placeholder="fond sati koji se mora godišnje odraditi">
                        </div>
                        <div class="mb-12">
                            <label for="predmet_uvjet" class="form-label">Predmet je uvjet za iducu godinu</label>
                            <input type="checkbox" id="predmet_uvjet" name="predmet_uvjet" value="predmet_uvjet">
                        </div>
                        <div class="mb-12">
                            <label for="opis_predmeta" class="form-label">Opis predmeta</label>
                            <input type="text" class="form-control" name="opis_predmeta" id="opis_predmeta" placeholder="Opis predmeta">
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
  </div>
</div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Naziv predmeta</th>
      <th scope="col">Ime profesora</th>
      <th scope="col">Godisnji fond sati</th>
      <th scope="col">Predmet je uvjet za iducu godinu</th>
      <th scope="col">Opis predmeta</th>
    </tr>
  </thead>
  <tbody>
    <?php
     $predmetString = file_get_contents(__DIR__."/predmeti.json");
     $predmetData = json_decode($predmetString, true);

     if (isset($predmetData))
     {
         foreach ($predmetData as $key => $value)
         {
             $ID = $value['id'] ?? " ";
             $naziv = $value['naziv_predmeta'];
             $prof = $value['ime_profesora'] ?? '';
             $godFondSati  = $value['god_fond_Sati'] ?? '';
             $predmetUvjet  = $value['predmet_uvjet'] ?? '';
             $opis  = $value['opis_predmeta'] ?? '';
         }
        }

            echo "<tr>
                                <td>$ID</td>
                                <td>$naziv</td>
                                <td>$prof</td>
                                 <td>$godFondSati</td>
                                <td>$predmetUvjet</td>
                                <td>$opis</td>
                            </tr>";
    ?>
  </tbody>
</table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>