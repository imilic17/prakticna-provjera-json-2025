<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadatak 1</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Novi Predmet
                    </button> 
            </div>


            <div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Naziv predmeta</th>
                <th scope="col">Fond sati(godišnji)</th>
                <th scope="col">Uvjet za iduću godinu(DA/NE)</th>
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

                            $naziv_predmeta=$value['naziv-predmeta'];

                            $ime_profesora=$value['ime-profesora'];

                            $godisnji_fond_sati=$value['godisnji-fond-sati'];

                            $predmet_je_uvjet_za_iducu_godinu=$value['predmet-je-uvjet-za-iducu-godinu'];

                            $opis_predmeta=$value['opis-predmeta'];


                           

                            
    
                            echo "<tr>
                                <td>$id</td>
                                <td>$naziv_predmeta</td>
                                <td>$ime_profesora</td>
                                 <td>$godisnji_fond_sati</td>
                                  <td>$predmet_je_uvjet_za_iducu_godinua</td>
                                   <td>$opis_predmeta</td>

                            </tr>";
                        }
                    }
                ?>
                
            </tbody>
        </table>
    </div>









    
</body>
</html>