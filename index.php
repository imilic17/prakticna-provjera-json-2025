<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popis Predmeta</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Popis predmeta</h1>

    
    <a href="" class="btn btn-primary mb-3">Dodaj predmet</a>

    <?php
    
    $json_file = 'predmeti.json';

  
    if (file_exists($json_file)) {
        
        $jsonData = file_get_contents($json_file);
        
        
        $predmeti = json_decode($jsonData, true);

        if ($predmeti !== null && is_array($predmeti)) {
           
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Predmeta</th>
                            <th>Ime Predmeta</th>
                            <th>Naziv Profesora</th>
                            <th>Fond Sati</th>
                            <th>Preduvjet?</th>
                            <th>Opis Predmeta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($predmeti as $predmet): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($predmet['id_predmeta']); ?></td>
                                <td><?php echo htmlspecialchars($predmet['ime_predmeta']); ?></td>
                                <td><?php echo htmlspecialchars($predmet['naziv_profesora']); ?></td>
                                <td><?php echo htmlspecialchars($predmet['godisnji_fond_sati']); ?></td>
                                <td>
                                    <?php 
                                    
                                    echo $predmet['je_preduvjet'] ? '<span class="badge bg-success">DA</span>' : '<span class="badge bg-danger">NE</span>'; 
                                    ?>
                                </td>
                                <td><?php echo htmlspecialchars($predmet['opis_predmeta']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo '<div class="alert alert-warning" role="alert">Greška prilikom dekodiranja JSON podataka. Provjerite format datoteke.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Datoteka <strong>' . htmlspecialchars($json_file) . '</strong> nije pronađena.</div>';
    }
    ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
