<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Dodaj predmet
        </button>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Naziv predmeta</th>
                <th scope="col">Ime profesora</th>
                <th scope="col">Godisnji fond sati</th>
                <th scope="col">Predmet je uvjek za iducu godinu</th>
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
                            $ID = $value['ID'];
                            $imeProfesora = $value['imeProfesora'];
                            $nazivPredmeta = $value['nazivPredmeta'];
                            $godisnjiFondSati = $value['godisnjiFondSati'];
                            $predmetJeUvjetZaIducuGodinu = $value['predmetJeUvjetZaIducuGodinu'];
                            $opisPredmeta = $value['ospisPredmeta']?? '';

                            // $datumRodenja = (isset($value['datumRodenja'])) ? $value['datumRodenja'] : '';
                            
                            // $datumRodenja = '';
                            // if (isset($value['datumRodenja']) )
                            // {
                            //     $datumRodenja = $value['datumRodenja'];
                            // }
                            
    
                            echo "<tr>
                                <td>$ID</td>
                                <td>$imeProfesora</td>
                                <td>$nazivPredmeta</td>
                                <td>$godisnjiFondSati</td>
                                <td>$predmetJeUvjetZaIducuGodinu</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj predmet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="unos_predmeta.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-12">
                            <label for="ime" class="form-label">NazivPredmeta</label>
                            <input type="text" class="form-control" name="ime" id="ime" placeholder="Ime">
                        </div>
                        <div class="mb-12">
                            <label for="prezime" class="form-label">Ime profesora</label>
                            <input type="text" class="form-control" name="prezime" id="prezime" placeholder="Prezime">
                        </div>
                        <div class="mb-12">
                            <label for="datumRodenja" class="form-label">Novi korisnik</label>
                            <input type="text" class="form-control" name="datumRodenja" id="datumRodenja" placeholder="Datum rođenja">
                        </div>
                        <div class="mb-12">
                            <label for="datumRodenja" class="form-label">Predmet je uvjek za iducu godinu</label>
                            <input type="text" class="form-control" name="datumRodenja" id="datumRodenja" placeholder="Datum rođenja">
                        </div>
                        <div class="mb-12">
                            <label for="datumRodenja" class="form-label">Opis predmeta</label>
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