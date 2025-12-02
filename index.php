<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class='container'>
        <div class="row">
            <form class="row g-3">
                
                

                <div class="col-sm-3">
                    <input placeholder="" type="text" name="predmet" class="form-control" id="predmet">
                </div>

                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Trazi predmet</button>
                </div>
            </form>
        </div>
<div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Novi predmet
        </button>
    </div>
<div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Ime predmeta</th>
                <th scope="col">Naziv profesora</th>
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
                            $idPredmeta = $value['idPredmeta'];
                            $imePredmeta = $value['imePredmeta'];
                            $nazivProfesora = $value['nazivProfesora'];
                            $godisnjiFondSati = $value['godisnjiFondSati'];
                            $obavezan = $value['obavezan'];
                            $opisPredmeta = $value['opisPredmeta'];
                           

                            
    
                            echo "<tr>
                                <td>$idPredmeta</td>
                                <td>$imePredmeta</td>
                                <td>$nazivProfesora</td>
                                <td>$godisnjiFondSati</td>
                                <td>$obavezan</td>
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
                <form action="unos_korisnika.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-12">
                            <label for="ime" class="form-label">Ime</label>
                            <input type="text" class="form-control" name="ime" id="ime" placeholder="Ime">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



</body>
</html>