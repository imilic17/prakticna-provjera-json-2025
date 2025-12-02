<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
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
</body>
</html>