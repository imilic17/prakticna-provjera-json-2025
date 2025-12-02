<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prakticna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Naziv Predmeta</th>
      <th scope="col">Ime profesora</th>
      <th scope="col">Godišnji fond sati</th>
      <th scope="col">Predmet je uvijet za iduću godinu</th>
      <th scope="col">Opis Predmeta</th>
    </tr>
  </thead>
  <tbody>
  <?php
           
            $predmetiString = file_get_contents(__DIR__ . '/predmeti.json');
            $predmetiJson = json_decode($predmetiString, true);

            
        

                    
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
                    
        ?>
                </tbody>
</table>

    
</body>
</html>