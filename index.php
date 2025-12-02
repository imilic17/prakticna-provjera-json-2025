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

            
            if (isset($predmetiJson))
                    {
                        foreach ($predmetiJson as $key => $value)
                        {
                            $id = $value['id'];
                            $NazivPredmeta = $value['NazivPredmeta'];
                            $ime = $value['ime'];
                            $GodisnjiFondSati = $value['GodisnjiFondSati'];
                            $UvjetGod = $value['UvjetGod'];
                            $OpisPredmeta = $value['OpisPredmeta'];

                            
                            echo "<tr>
                            <td>$id</td>
                            <td>$NazivPredmeta</td>
                                <td>$ime</td>
                                <td>$GodisnjiFondSati</td>
                                <td>$UvjetGod</td>
                                <td>$OpisPredmeta</td>
                            </tr>";
                        }
                    }
        ?>
    </tbody>
</table>

    
</body>
</html>