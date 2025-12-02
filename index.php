<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Prakticna </title>
</head>
<body>
    <div>
    <button type ="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Novi predmet
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
                            $naziv = $value['naziv'];
                            $profesor = $value['profesor'];
                            $fondsati = $value['fondsati'] ?? '';
                            $uvjet = $value['uvjet'] ?? '';
                            $Opis = $value['Opis'] ?? '';

                            echo "<tr>
                                <td>$naziv</td>
                                <td>$profesor</td>
                                <td>$fondsati</td>
                                <td>$uvjet</td>
                                <td>$Opis</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Novi predmet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="unos_predmeta.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-12">
                            <label for="naziv" class="form-label">Naziv predmeta</label>
                            <input type="text" class="form-control" name="naziv" id="maziv" placeholder="naziv">
                        </div>
                        <div class="mb-12">
                            <label for="profesor" class="form-label">Ime profesora</label>
                            <input type="text" class="form-control" name="profesor" id="profesor" placeholder="profesor">
                        </div>
                        <div class="mb-12">
                            <label for="fondsati" class="form-label">Godišnji fond sati</label>
                            <input type="text" class="form-control" name="fondsati" id="fondsati" placeholder="fondsati">
                        </div>
                        <div class="mb-12">
                            <label for="uvjet" class="form-label">Predmet je uvjet za iduću godinu</label>
                            <input type="text" class="form-control" name="uvjet" id="uvjet" placeholder="uvjet">
                        </div>
                        <div class="mb-12">
                            <label for="opis" class="form-label">Opis predmeta</label>
                            <input type="text" class="form-control" name="opis" id="opis" placeholder="opis">
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