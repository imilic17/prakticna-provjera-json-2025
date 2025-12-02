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
                    $userString = file_get_contents(__DIR__."/predmeti.json");
                    $usersData = json_decode($userString, true);

                    if (isset($usersData))
                    {
                        foreach ($usersData as $key => $value)
                        {
                            $id = $value['id'];
                            $ime_profesora = $value['ime_profesora'];
                            $naziv_predmeta = $value['naziv_predmeta'];
                            $fond_sati = $value['fond_sati'];
                            $uvjet_za_sljedecu_godinu = $value['uvjet_za_sljedecu_godinu']
                            $opis_predmeta = $value['opis_predmeta'] ?? '';

                            // $datumRodenja = (isset($value['datumRodenja'])) ? $value['datumRodenja'] : '';
                            
                            // $datumRodenja = '';
                            // if (isset($value['datumRodenja']) )
                            // {
                            //     $datumRodenja = $value['datumRodenja'];
                            // }
                            
    
                            echo "<tr>
                                <td>$id</td>
                                <td>$ime_profesora</td>
                                <td>$naziv_predmeta</td>
                                <td>$fond_sati</td>
                                <td>$uvjet_za_sljedecu_godinu</td>
                                <td>$opis_predmeta</td>
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
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" name="ime" id="id" placeholder="id">
                        </div>
                        <div class="mb-12">
                            <label for="ime_profesora" class="form-label">Ime prof</label>
                            <input type="text" class="form-control" name="ime" id="ime_profesora" placeholder="ime_profesora">
                        </div>
                        <div class="mb-12">
                            <label for="naziv_predmeta" class="form-label">naziv predmeta</label>
                            <input type="text" class="form-control" name="naziv_predmeta" id="naziv_predmeta" placeholder="naziv_predmeta">
                        </div>
                        <div class="mb-12">
                            <label for="fond_sati" class="form-label">fond sati</label>
                            <input type="text" class="form-control" name="fond_sati" id="fond_sati" placeholder="fond_sati">
                        </div>
                        <div class="mb-12">
                            <label for="uvjet_za_sljedecu_godinu" class="form-label">uvjet za slj. god.</label>
                            <input type="text" class="form-control" name="uvjet_za_sljedecu_godinu" id="uvjet_za_sljedecu_godinu" placeholder="uvjet_za_sljedecu_godinu">
                        </div>
                        <div class="mb-12">
                            <label for="opis_predmeta" class="form-label">opis predmeta</label>
                            <input type="text" class="form-control" name="opis_predmeta" id="opis_predmeta" placeholder="opis_predmeta">
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