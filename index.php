<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Primjer 1!</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">  
        <form class="form-inline">  
            <input class="form-control mr-sm-2" type="search" name="filter" placeholder="Search" aria-label="Search"
            value="<?php if (isset($_GET['filter'])) { echo $_GET['filter']; } ?>"
        >
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Traži</button>
        </form>
    </nav>

    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Novi korisnik
        </button>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Ime</th>
                <th scope="col">Predmet</th>
                <th scope="col">fond sati</th>
                <th scope="col">uvjet za sljedecu god.</th>
                <th scope="col">opis predmeta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                     $predmetiString = file_get_contents(__DIR__."/predmeti.json");
                    $predmetiJson = json_decode($predmetiString, true);

                    if (isset($predmetiJson))
                    {
                        foreach ($predmetiJson as $key => $value)
                        {
                            $id = $value['id'];
                            $ime = $value['ime'];
                            $NazivPredmeta = $value['NazivPredmeta'];
                            $GodinsjiFondSati = $value['GodisnjiFondSati'];
                            $UvjetGod= $value['UvjetGod'] ?? "";
                            $opisPredmeta = $value['OpisPredmeta'] ?? '';

                            // $datumRodenja = (isset($value['datumRodenja'])) ? $value['datumRodenja'] : '';
                            
                            // $datumRodenja = '';
                            // if (isset($value['datumRodenja']) )
                            // {
                            //     $datumRodenja = $value['datumRodenja'];
                            // }
                            $tr_class = ($UvjetGod == 'DA') ? 'table-success' : '';
                            
    
                            echo "<tr>
                                <td>$id</td>
                                <td>$ime</td>
                                <td>$NazivPredmeta</td>
                                <td>$GodinsjiFondSati</td>
                                <td>$UvjetGod</td>
                                <td>$opisPredmeta</td>
                            </tr>";
                        }
                    }
                ?>
                
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novi korisnik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                </div>
                <form action="unos_predmeta.php" method="POST">
                    <div class="modal-body">
                        
                        <div class="mb-12">
                            <label for="ime" class="form-label">Ime prof</label>
                            <input type="text" class="form-control" name="ime" id="ime" placeholder="ime">
                        </div>
                        <div class="mb-12">
                            <label for="NazivPredmeta" class="form-label">naziv predmeta</label>
                            <input type="text" class="form-control" name="NazivPredmeta" id="NazivPredmeta" placeholder="NazivPredmeta">
                        </div>
                        <div class="mb-12">
                            <label for="GodisnjiFondSati" class="form-label">fond sati</label>
                            <input type="text" class="form-control" name="GodisnjiFondSati" id="GodisnjiFondSati" placeholder="GodisnjiFondSati">
                        </div>
                        <div class="mb-12">
                            <label for="UvjetGod" class="form-label">uvjet za slj. god.</label>
                            <input type="checkbox"  name="UvjetGod" value="DA" id="UvjetGod" >
                        </div>
                        <div class="mb-12">
                            <label for="OpisPredmeta" class="form-label">opis predmeta</label>
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
  </body>
</html>