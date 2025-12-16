<!doctype html>
<html lang="en">
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
$predmetString = file_get_contents(__DIR__.'/predmeti.json');
$predmetData = json_decode($predmetString, true);

if (!empty($predmetData)) {
    foreach ($predmetData as $predmet) {

     


        $rowClass = ($predmet['predmet_je_uvjet'] === 'DA') ? 'table-success' : '';

      echo "
        <tr class='$rowClass'>
            <td>{$predmet['id']}</td>
            <td>{$predmet['naziv_predmeta']}</td>
            <td>{$predmet['ime_profesora']}</td>
            <td>{$predmet['godisnji_fond_sati']}</td>
            <td>{$predmet['predmet_je_uvjet']}</td>
            <td>{$predmet['opis_predmeta']}</td>
        </tr>
        ";
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
                    <h5 class="modal-title" id="exampleModalLabel">Novi predmet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="unos_predmeta.php" method="POST">
                    <div class="modal-body">
                  
                        
                        <div class="mb-12">
                            <label for="naziv_predmeta" class="form-label">Naziv predmeta</label>
                            <input type="text" class="form-control" name="naziv_predmeta" id="naziv_predmeta" placeholder="naziv predmeta">
                        </div>
                        <div class="mb-12">
                            <label for="ime_profesora" class="form-label">Ime profesora</label>
                            <input type="text" class="form-control" name="ime_profesora" id="ime_profesora" placeholder="ime profesora">
                        </div>
                        <div class="mb-12">
                            <label for="godisnji_fond_sati" class="form-label">Godisnji fond sati</label>
                            <input type="text" class="form-control" name="godisnji_fond_sati" id="godisnji_fond_sati" placeholder="fond sati koji se mora godisnje odraditi">
                        </div>
                        <div class="mb-12">
 <div class="form-check">
    <input type="hidden" name="predmet_je_uvjet" value="NE">

    <input type="checkbox"
           class="form-check-input"
           name="predmet_je_uvjet"
           id="predmet_je_uvjet"
           value="DA">

    <label for="predmet_je_uvjet" class="form-check-label">
        Predmet je uvjet za iduću godinu
    </label>
</div>

</div>
                        <div class="mb-12">
                            <label for="opis_predmeta" class="form-label">Opis predmeta</label>
                            <input type="text" class="form-control" name="opis_predmeta" id="opis_predmeta" placeholder="Opis">
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
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 
  </body>
</html>