<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Prakticna Provjera!</title>
  </head>
  <body>
    <div>
        <h1>Popis predmeta</h1>
        <div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ime predmeta</th>
                            <th>Profesor</th>
                            <th>sati</th>
                            <th>uvjet</th>
                            <th>opis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $jsonFile = 'predmeti.json';
                        $predmeti = [];
                        if(file_exists($jsonFile)){
                            $jsonData=file_get_contents($jsonFile);
                            $predmeti=json_decode($jsonData,true);
                        }
                        if (empty($predmeti)) {
                            echo '<tr><td colspan="6" class="text-center">Nema podataka o predmetima.</td></tr>';
                        } else {
                            foreach ($predmeti as $predmet) {
                                echo '<td>' . htmlspecialchars($predmet['id']) . '</td>';
                                echo '<td>' . htmlspecialchars($predmet['ime']) . '</td>';
                                echo '<td>' . htmlspecialchars($predmet['profesor']) . '</td>';
                                echo '<td>' . htmlspecialchars($predmet['sati']) . '</td>';
                                echo '<td>' . htmlspecialchars($predmet['uvjet']) . '</td>';
                                echo '<td>' . htmlspecialchars($predmet['opis']) . '</td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>