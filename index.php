<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> </title>
  </head>
  <body>
    <div>
        <br>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Dodaj predmet
        </button>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                
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
                            $nazivPredmeta = $value['nazivPredmeta'];
                            
                            $imeProfesora = $value['imeProfesora'];
                            

                            $godisnjiFondSati = $value['godisnjiFondSati'];
                            $opisPredmeta = $value['opisPredmeta'] ?? '';

                            // $datumRodenja = (isset($value['datumRodenja'])) ? $value['datumRodenja'] : '';
                            
                            // $datumRodenja = '';
                            // if (isset($value['datumRodenja']) )
                            // {
                            //     $datumRodenja = $value['datumRodenja'];
                            // }
                            
    
                            echo "<tr>
                            
                                <td>$nazivPredmeta</td>
                                <td>$imeProfesora</td>
                                <td>$godisnjiFondSati</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj novi predmet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="unos_korisnika.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-12">
                            <label for="nazivPredmeta" class="form-label">Naziv predmeta</label>
                            <input type="text" class="form-control" name="nazivPredmeta" id="nazivPredmeta" placeholder="naziv predmeta">
                        </div>
                        <div class="mb-12">
                            <label for="imeProfesora" class="form-label">Ime profesora</label>
                            <input type="text" class="form-control" name="imeProfesora" id="imeProfesora" placeholder="ime profesora">
                        </div>
                        <div class="mb-12">
                            <label for="godisnjiFondSati" class="form-label">Godišnji fond sati</label>
                            <input type="text" class="form-control" name="godisnjiFondSati" id="godisnjiFondSati" placeholder="fond sati koji se mora godišnje odraditi">
                        </div>
                        
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                        predmet je uvjet za iduću godinu
                         </label>
                        <div class="mb-12">
                            <label for="opisPredmeta" class="form-label">Opis predmeta</label>
                            <input type="text" class="form-control" name="opisPredmeta" id="opisPredmeta" placeholder="Opis predmeta">
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