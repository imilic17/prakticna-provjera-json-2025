<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadatak 1</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class='container mt-4'>
    <div class="row">
        <form class="row g-3" method="GET">

            <div class="col-sm-3">
                <input placeholder="Naziv predmeta" type="text" name="naziv" class="form-control" id="naziv"
                       value="<?php echo isset($_GET['naziv']) ? $_GET['naziv'] : '' ?>">
            </div>

            

            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Traži</button>
            </div>

        </form>
    </div>
</div>




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
                                        $naziv = $value['naziv-predmeta'];
                                        $profesor = $value['ime-profesora'];
                                        $fond = $value['godisnji-fond-sati'];
                                    
                                        $uvjetBool = $value['predmet-je-uvjet-za-iducu-godinu'];
                                        $uvjetString = $uvjetBool ? "DA" : "NE";
                                    
                                        $opis = $value['opis-predmeta'];
                                    
                                       
                                        if (!empty($_GET['naziv'])) {
                                            if (stripos($naziv, $_GET['naziv']) === false) {
                                                continue;
                                            }
                                        }
                                    
                                        
                                    
                                       
                                        $rowClass = $uvjetBool ? "table-success" : "";
                                    
                                        echo "
                                        <tr class='$rowClass'>
                                            <td>$id</td>
                                            <td>$naziv</td>
                                            <td>$profesor</td>
                                            <td>$fond</td>
                                            <td>$uvjetString</td>
                                            <td>$opis</td>
                                        </tr>";
                                    }  }
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
                                   <form action="unos_predmeta.php" method="POST">
                       <div class="modal-body">

                           <div class="mb-12">
                               <label for="naziv-predmeta" class="form-label">Naziv Predmeta</label>
                               <input type="text" class="form-control" name="naziv-predmeta" id="naziv-predmeta" required>
                           </div>

                           <div class="mb-12">
                               <label for="ime-profesora" class="form-label">Ime Profesora</label>
                               <input type="text" class="form-control" name="ime-profesora" id="ime-profesora" required>
                           </div>

                           <div class="mb-12">
                               <label for="godisnji-fond-sati" class="form-label">Godišnji fond sati</label>
                               <input type="number" class="form-control" name="godisnji-fond-sati" id="godisnji-fond-sati" required>
                           </div>

                           <label class="form-label mt-3">Uvjet za iduću godinu</label>

                           <div class="form-check">
                               <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1" value="Da" required>
                               <label class="form-check-label" for="radioDefault1">
                                   Da
                               </label>
                           </div>

                           <div class="form-check">
                               <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" value="Ne" checked>
                               <label class="form-check-label" for="radioDefault2">
                                   Ne
                               </label>
                           </div>

                           <div class="mb-12 mt-3">
                               <label for="opis-predmeta" class="form-label">Opis Predmeta</label>
                               <input type="text" class="form-control" name="opis-predmeta" id="opis-predmeta" required>
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