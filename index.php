<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Prakticna</title>
  </head>
  <body>

  
  <div class='container'>
        <div class="row">
            <form class="row g-3">
                
                <div class="col-sm-3">
                    <input placeholder="" type="text" name="osoba" class="form-control" id="osoba">
                </div>

                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Trazi</button>
                </div>

                
            </form>
            
        </div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
Dodaj novi predmet</button>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Dodaj novi predmet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                        <div class="mb-12">
                            <label for="naziv predmeta" class="form-label">Naziv predmeta</label>
                            <input type="text" class="form-control" name="naziv predmeta" id="naziv" placeholder="naziv predmeta">
                        </div>
                        <div class="mb-12">
                            <label for="ime profesora" class="form-label">Ime profesora</label>
                            <input type="text" class="form-control" name="ime profesora" id="ime profesora" placeholder="ime profesora">
                        </div>
                        <div class="mb-12">
                            <label for="fond sati koji se mora godišnje odraditi" class="form-label">Godišnji fond sati</label>
                            <input type="text" class="form-control" name="fond sati koji se mora godišnje odraditi" id="fond sati koji se mora godišnje odraditi" placeholder="fond sati koji se mora godišnje odraditi">
                            <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
  <label class="form-check-label" for="flexCheckIndeterminate">
    Predmet je uvjet za iduću godinu
  </label>
</div>
                        </div>
                        
                        <div class="mb-12">
                            <label for="opis predmeta" class="form-label">Opis predmeta</label>
                            <input type="text" class="form-control" name="opis predmeta" id="opis predmeta" placeholder="opis predmeta">
                        </div>
                        
                    </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                        <button type="submit" class="btn btn-primary">Spremi promjene</button>
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
      <th scope="col">Godišnji fond sati</th>
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
                            $id = $value['id'];
                            $naziv = $value['naziv'];
                            $profesor = $value['profesor'];
                            $fond_sati = $value['fond_sati'];
                            $uvjet = $value['uvjet'];
                            $opis = $value['opis'];

                            echo "<tr>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>


</body>
</html>