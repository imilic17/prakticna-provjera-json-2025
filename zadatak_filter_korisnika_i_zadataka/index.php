<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Primjer 2!</title>
  </head>
  <body>

    <div class='container'>
        <div class="row">
            <form class="row g-3">
                
                <div class="col-sm-3">
                    <input placeholder="ime ososbe" type="text" name="osoba" class="form-control" id="osoba">
                </div>

                <div class="col-sm-3">
                    <input placeholder="zadatak" type="text" name="zadatak" class="form-control" id="zadatak">
                </div>

                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Trazi</button>
                </div>
            </form>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ime i prezime</th>
                        <th scope="col">Naziv zadatka</th>
                        <th scope="col">Zadatak izvrsen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $userString = file_get_contents(__DIR__.'/users.json');
                        $todoString = file_get_contents(__DIR__.'/todo.json');

                        $userJson = json_decode($userString, true);
                        $todoJson = json_decode($todoString, true);

                        foreach ($todoJson as $todoKey => $todoValue)
                        {
                            $imeOsobe = '';

                            if ($_GET != null && $_GET['zadatak'] != null && $_GET['zadatak'] != '')
                            {
                                if (strpos($todoValue['title'], $_GET['zadatak']) === false)
                                {
                                    continue;
                                }
                            }

                            foreach ($userJson as $userKey => $userValue)
                            {
                                if ($userValue['id'] === $todoValue['userId'])
                                {
                                    $imeOsobe = $userValue['name'];
                                    break;
                                }
                            }

                            if ($_GET != null && $_GET['osoba'] != null && $_GET['osoba'] != '')
                            {
                                if (stripos($imeOsobe, $_GET['osoba']) === false)
                                {
                                    continue;
                                }
                            }

                            $tableString = '
                            <tr>
                                <td></td>
                                <td>'.$imeOsobe.'</td>
                                <td>'.$todoValue['title'].'</td>
                            ';

                            if ($todoValue['completed'] === true)
                            {
                                $tableString .= '<td><input type="checkbox" id="scales" name="scales" checked /></td>';
                            }
                            else
                            {
                                $tableString .= '<td></td>';
                            }

                            $tableString .= '</tr>';

                            echo $tableString;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>