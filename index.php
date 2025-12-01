<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HTML5 Boilerplate</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
 
<?php 
$predmetiString = file_get_contents(__DIR__.'/predmeti.json');
 $data =  json_decode($predmetiString, true);

  $user = array('ime predmeta' => $_POST['ime_predmeta'], 'Naziv profesora' => $_POST['naziv_profesora'], 'Godisnji_fond_sati' => $_POST['godisnji_fond_sati'], 'je_li_predmet_uvijet_za_sljedecu_godinu' => $_POST['je_li_predmet_uvijet_za_sljedecu_godinu'], 'opis_predmeta' => $_POST['opis_predmeta']);
    if (isset($data))
    {
        $data[] = $user;
    }
    else
    {
        $data = array($user);
    }

    $newString = json_encode($data);
    file_put_contents(__DIR__.'/predmeti.json', $newString);

    foreach ($data as $key => $value)
                        {
                            $ime_predmeta = $value['ime_predmeta'];
                            $naziv_profesora = $value['naziv_profesora'];
                            $godisnji_fond_sati = $value['godisnji_fond_sati'] ?? '';
                            $je_li_predmet_uvijet_za_sljedecu_godinu = $value['je_li_predmet_uvijet_za_sljedecu_godinu'] ?? '';
                            $opis_predmeta = $value['opis_predmeta'] ??'';}



     
 






?>
 <form action="index.php" method="$_POST">
  <div class="form-group">
    <input class="form-control" type="text" placeholder="Ime predmeta">
  </div>
  <div class="form-group">
    <input class="form-control" type="text" placeholder="Naziv profesora">
  </div>
   <div class="form-group">
    <input class="form-control" type="text" placeholder="Godišnnji fond sati">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">je li predmet uvijet za sljedecu godinu</label>
  </div>
  <div class="form-group">
    <input class="form-control" type="text" placeholder="Opis predmeta">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>

</html>