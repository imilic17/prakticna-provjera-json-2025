<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HTML5 Boilerplate</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
<?php 
$predmetiString = file_get_contents(__DIR__.'/predmeti.json');
 $data =  json_decode($predmetiString, true);

        if (count($data)) {
            
            echo "<table>";

            foreach ($data as $stand) {

                
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$imepredmeta</td>";
                echo "<td>$nazivprofesora</td>";
                echo "<td>$godisnjifondsati</td>";
                echo "<td>$preduvijet</td>";
                echo "<td>$opis</td>";
                echo "</tr>";
            }

          
            echo "</table>";
        }
 






?>

</body>

</html>