<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Naziv Predmeta</th>
      <th scope="col">Ime Profesora</th>
      <th scope="col">Godišnji Fond Sati</th>
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
                            $NazivPredmeta = $value['NazivPredmeta'];
                            $ImeProfesora = $value['ImeProfedora'];

                            $GodFondSat = $value['GodFondSat'];
                            $PJUZIG = $value['PJUZIG'];
                            $OpisPredmeta = $value['OpisPredmeta'];

                           
                            echo "<tr>

                                <td>$NazivPredmeta</td>
                                <td>$ImeProfesora</td>
                                <td>$GodFondSat</td>
                                <td>$PJUZIG</td>
                                <td>$OpisPredmeta</td>
                            </tr>";
                        }
                    }
                ?>
   
  </tbody>
</table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>