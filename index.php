<?php

    $predmetString = file_get_contents(__DIR__.'/predmeti.json');
    $predmeti = json_decode($predmetString, true);

    
    


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadatak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    

        <div class='container'>
        <div class="row">
            <form class="row g-3">
                
                <div class="col-sm-3">
                    <input placeholder="Tražilica" type="text" name="osoba" class="form-control" id="osoba">
                </div>

                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Traži</button>
                </div>
            </form>
        </div>


    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Dodaj predmet
        </button>
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
    
  </tbody>
</table>
    
    
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj novi predmet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="unos_korisnika.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-12">
                            <label for="ime" class="form-label">Naziv predmeta</label>
                            <input type="text" class="form-control" name="naziv" id="naziv" placeholder="Naziv predmeta">
                        </div>
                        <div class="mb-12">
                            <label for="prezime" class="form-label">Ime profesora</label>
                            <input type="text" class="form-control" name="ime" id="ime" placeholder="Ime profesora">
                        </div>
                        <div class="mb-12">
                            <label for="datumRodenja" class="form-label">Godišnji fond sati</label>
                            <input type="text" class="form-control" name="fond" id="fond" placeholder="Godišnji fond sati">
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="uvjet" id="uvjet">
                        <label class="form-check-label" for="gridCheck">
                        Predmet je uvjet za iduću godinu
                        </label>
                        </div>
                        <div class="mb-12">
                            <label for="datumRodenja" class="form-label">Opis predmeta</label>
                            <input type="text" class="form-control" name="opis" id="opis" placeholder="Opis predmeta">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                        <button type="submit" class="btn btn-primary">Spremi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>