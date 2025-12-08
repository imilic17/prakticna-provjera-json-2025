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
                 <th scope="col">Ime Profesora</th>
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


                            if($value['predmet-je-uvjet-za-iducu-godinu']){
                                $predmet_je_uvjet_za_iducu_godinu = "DA";
                            } else{ $predmet_je_uvjet_za_iducu_godinu = "NE"; }

                           

                            $opis_predmeta=$value['opis-predmeta'];


                           

                            
    
                            echo "<tr>
                                <td>$id</td>
                                <td>$naziv_predmeta</td>
                                <td>$ime_profesora</td>
                                 <td>$godisnji_fond_sati</td>
                                  <td>$predmet_je_uvjet_za_iducu_godinu</td>
                                   <td>$opis_predmeta</td>

                            </tr>";
                        }
                    }
                ?>
                
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novi Predmet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="unos_korisnika.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-12">
                            <label for="naziv-predmeta" class="form-label">Naziv Predmeta</label>
                            <input type="text" class="form-control" name="naziv-predmeta" id="naziv-predmeta" placeholder="Naziv Predmeta">
                        </div>
                        <div class="mb-12">
                            <label for="ime-profesora" class="form-label">Ime Profesora</label>
                            <input type="text" class="form-control" name="ime-profesora" id="ime-profesora" placeholder="Ime Profesora">
                        </div>

                        <div class="mb-12">
                            <label for="godisnji-fond-sati" class="form-label">Godišnji fond sati</label>
                            <input type="text" class="form-control" name="godisnji-fond-sati" id="godisnji-fond-sati" placeholder="Godisnji Fond Sati">
                        </div>

                        Uvjet za iduću godinu(DA/NE)

                                                                   <div class="form-check">
                      <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
                      <label class="form-check-label" for="radioDefault1">
                       Da
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                      <label class="form-check-label" for="radioDefault2">
                       Ne
                      </label>
                    </div>


                         <div class="mb-12">
                            <label for="opis-predmeta" class="form-label">opis Predmeta</label>
                            <input type="text" class="form-control" name="opis-predmeta" id="opis-predmeta" placeholder="Opis Predmeta">
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                        <button type="submit" class="btn btn-primary">Spremi promjene</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>









    
</body>
</html>