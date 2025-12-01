<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title></title>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- navbar -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Traži</button>
                </form>
            </div>
        </nav>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Dodaj predmet
        </button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Dodaj novi predmet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                    <form action="unos_predmeta.php" method="POST"> 
                        <div class="mb-3">
                            <label for="predmet1" class="form-label">Naziv predmeta</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="naziv_predmeta" aria-describedby="emailHelp" placeholder="naziv predmeta">
                            <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Ime profesora</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ime profesora">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Godišnji fond sati</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="fond sati koji se mora godišnje odraditi">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Opis predmeta</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="opis predmeta">
                            </div>
                        </form>
                        <!-- modal 2. part -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">zatvori</button>
                        <button type="submit" class="btn btn-primary">dodaj</button>
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
                            $naziv = $value['naziv predmeta'];
                            $ime = $value['ime profesora'];

                            $godisnjifond = $value['godisnji fond'] ?? '';

                            // $datumRodenja = (isset($value['datumRodenja'])) ? $value['datumRodenja'] : '';
                            
                            // $datumRodenja = '';
                            // if (isset($value['datumRodenja']) )
                            // {
                            //     $datumRodenja = $value['datumRodenja'];
                            // }
                            
    
                            echo "<tr>
                                <td>$naziv</td>
                                <td>$ime</td>
                                <td>$godisnjifond</td>
                            </tr>";
                        }
                    }
                ?>
                
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>