<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 
  </head>
  <body>
  <div class='container'>
        <div class="row">
            <form class="row g-3">
                
             

                <div class="col-sm-3">
                    <input  type="text" name="zadatak" class="form-control" id="zadatak">
                </div>

                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Trazi predmet</button>
                </div>
                <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Novi predmet
        </button> 
        </form>
        </div>
        <div class="row">
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
                    $predmetString = file_get_contents(__DIR__."/predmeti.json");
                    $predmetData = json_decode($predmetString, true);

                    if (isset($predmetData))
                    {
                        foreach ($predmetData as $key => $value)
                        {
                            $id = $value['id'];
                            $naziv_predmeta = $value['naziv_predmeta'];
                            $ime_profesora = $value['ime_profesora'];
                            $godisnji_fond_sati = $value['godisnji_fond_sati'];

                            $predmet_je_uvjet = $value['predmet_je_uvjet'];
                            $opis_predmeta = $value['opis_predmeta'];


                           

                            echo "<tr>
                                <td>$id</td>

                                <td>$naziv_predmeta</td>
                                <td>$ime_profesora</td>
                                <td>$godisnji_fond_sati</td>
                                <td>$predmet_je_uvjet</td>
                                <td>$opis_predmeta</td>


                            </tr>";
                        }
                    }
                ?>
               
                   
                </tbody>
            </table>
</body>
</html>