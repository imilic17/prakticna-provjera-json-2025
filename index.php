<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>praktična provjera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <!--pretraživanje-->
    <div class="container">
        <div class="row">
            <form class="row g-3">
                
                <div class="col-sm-3">
                    <input type="text" name="predmet" class="form-control" id="preedmet">
                </div>

                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Trazi</button>
                </div>
            </form>
        </div>
        <!-- Dugme za unos predmeta -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Dodaj predmet
</button>
<!--Tablica-->
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Ime predmeta</th>
      <th scope="col">Naziv profesora</th>
      <th scope="col">Godišnji fond sati</th>
      <th scope="col">Je li predmet uvjet za sljedeću godinu</th>
      <th scope="col">Opis predemta</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $predmetiString =file_get_contents(__DIR__.'/predmeti.json');
    $predemti = json_decode ($predmetiString,true);
    if($jsonuser == null){
        echo 'JSON nije validan';
    }
    if (isset($usersData))
                    {
                        foreach ($predemti as $key => $value)
                        {
                            $nazivPredmeta = $value['predmet'];
                            $imeProfesora = $value['profesor'];
                            $godisnjiFondSati = $value['fond'];
                            $uvjetZaSljedecuGodinu = $value['uvjet'];
                            $opis = $value['opis'];
                            echo "<tr>
                                <td> </td>
                                <td>$nazivPredmeta</td>
                                <td>$imeProfesora</td>
                                <td>$godisnjiFondSati</td>
                                <td>$uvjetZaSljedecuGodinu</td>
                                <td>$opis</td>
                                </tr>";
                        }
                    }
    ?>
  </tbody>
</table>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novi Predmet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="unos_predmeta.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-12">
                            <label for="ime" class="form-label">Ime predmeta</label>
                            <input type="text" class="form-control" name="ime" id="ime" placeholder="Ime predmeta">
                        </div>
                        <div class="mb-12">
                            <label for="prezime" class="form-label">Prezime</label>
                            <input type="text" class="form-control" name="prezime" id="prezime" placeholder="Prezime">
                        </div>
                        <div class="mb-12">
                            <label for="datumRodenja" class="form-label">Datum rođenja</label>
                            <input type="text" class="form-control" name="datumRodenja" id="datumRodenja" placeholder="Datum rođenja">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>