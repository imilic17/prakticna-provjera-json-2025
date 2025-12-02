<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
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
                            $ime = $value['ime'];
                            $prezime = $value['prezime'];

                            $datumRodenja = $value['datumRodenja'] ?? '';

                            // $datumRodenja = (isset($value['datumRodenja'])) ? $value['datumRodenja'] : '';
                            
                            // $datumRodenja = '';
                            // if (isset($value['datumRodenja']) )
                            // {
                            //     $datumRodenja = $value['datumRodenja'];
                            // }
                            
    
                            echo "<tr>
                                <td>$ime</td>
                                <td>$prezime</td>
                                <td>$datumRodenja</td>
                            </tr>";
                        }
                    }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>