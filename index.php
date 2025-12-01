<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Predmeti</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<div class="container">
    <h2 class="mb-4">Popis Predmeta</h2>

    
    <div class="d-flex justify-content-between mb-3">
        <button type="button" class="btn btn-primary">Dodaj predmet</button>
        <div class="input-group w-50">
            <input type="text" id="searchInput" class="form-control" placeholder="Traži predmet...">
            <button class="btn btn-primary" onclick="searchTable()">Traži</button>
        </div>
    </div>

    <table class="table table-bordered table-hover" id="predmetiTable">
        <thead class="bg-primary text-white">
            <tr>
                <th>ID predmeta</th>
                <th>Ime predmeta</th>
                <th>Naziv profesora</th>
                <th>Godišnji fond sati</th>
                <th>Uvjet za sljedeću godinu</th>
                <th>Opis predmeta</th>
            </tr>
        </thead>

        <tbody>
            <tr class="table-success">
                <td>1</td>
                <td>Matematika</td>
                <td>prof. Tatjana Sekereš</td>
                <td>140</td>
                <td>DA</td>
                <td>Osnovni matematički koncepti i priprema za daljnje školovanje.</td>
            </tr>

            <tr>
                <td>2</td>
                <td>Skriptni jezici i web programiranje</td>
                <td>prof. Ivana Milić</td>
                <td>70</td>
                <td>NE</td>
                <td>Ažuriranja stranice i učenje novih jezika.</td>
            </tr>

            <tr class="table-success">
                <td>3</td>
                <td>Fizika</td>
                <td>prof. Ivan-Marko Dežić</td>
                <td>120</td>
                <td>DA</td>
                <td>Osnove fizikalije, gravitacije + leće.</td>
            </tr>

            <tr>
                <td>4</td>
                <td>Politika i Gospodarstvo</td>
                <td>prof. Sanja Busić</td>
                <td>90</td>
                <td>NE</td>
                <td>Uvod u politiku i susret s povijesnim događajima.</td>
            </tr>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
function searchTable() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const table = document.getElementById("predmetiTable");
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) { 
        let td = rows[i].getElementsByTagName("td")[1]; 
        if (td) {
            let textValue = td.textContent || td.innerText;
            if (textValue.toLowerCase().indexOf(input) > -1) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
}


document.getElementById("searchInput").addEventListener("keyup", searchTable);
</script>

</body>
</html>
