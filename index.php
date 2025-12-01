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
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubjectModal">
            Dodaj predmet
        </button>

        <div class="input-group w-50">
            <input type="text" id="searchInput" class="form-control" placeholder="Traži predmet...">
            <button class="btn btn-primary" onclick="searchTable()">Traži</button>
        </div>
    </div>

   
    <table class="table table-bordered table-hover" id="predmetiTable">
        <thead class="bg-primary text-white">
            <tr>
                <th>ID predmeta</th>
                <th>Naziv predmeta</th>
                <th>Ime profesora</th>
                <th>Godišnji fond sati</th>
                <th>Predmet je uvjet za iduću godinu</th>
                <th>Opis predmeta</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-success">
                <td>1</td>
                <td>Skriptni jezici i web programiranje</td>
                <td>Ivana Milić</td>
                <td>64</td>
                <td>DA</td>
                <td>HTML, CSS, PHP, MySQL, JS</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Operacijski sustavi</td>
                <td>Antonio</td>
                <td>70</td>
                <td>NE</td>
                <td>Vrste i uloge OS-a</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Sigurnost iformacijskih sustava</td>
                <td>Ivana</td>
                <td>64</td>
                <td>NE</td>
                <td>Sigurnost po slojevima</td>
            </tr>
            <tr class="table-success">
                <td>4</td>
                <td>Matematika</td>
                <td>Tomislav</td>
                <td>105</td>
                <td>DA</td>
                <td>Samo za najjaće.</td>
            </tr>
            <tr class="table-success">
                <td>5</td>
                <td>Poslužiteljski operacijski sustavi</td>
                <td>Kulhavi</td>
                <td>64</td>
                <td>DA</td>
                <td>Vrste i uloge poslužiteljskih OS-a</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Tehničko i poslovno komuniciranje</td>
                <td>Mik</td>
                <td>32</td>
                <td>NE</td>
                <td>Ući se komunicirati u poslovnom okruženju.</td>
            </tr>
        </tbody>
    </table>
</div>


<div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSubjectModalLabel">Dodaj predmet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zatvori"></button>
      </div>
      <div class="modal-body">
        <input type="text" id="newSubject" class="form-control" placeholder="Unesi naziv predmeta">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
        <button type="button" class="btn btn-primary" onclick="addSubject()">Spremi promjene</button>
      </div>
    </div>
  </div>
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
            rows[i].style.display = textValue.toLowerCase().indexOf(input) > -1 ? "" : "none";
        }
    }
}

document.getElementById("searchInput").addEventListener("keyup", searchTable);

function addSubject() {
    const name = document.getElementById("newSubject").value;
    if (!name) { alert("Unesite naziv predmeta!"); return; }

    const table = document.getElementById("predmetiTable").getElementsByTagName("tbody")[0];
    const newRow = table.insertRow();
    newRow.innerHTML = `
        <td>#</td>
        <td>${name}</td>
        <td>-</td>
        <td>-</td>
        <td>NE</td>
        <td>-</td>
    `;

    document.getElementById("newSubject").value = '';

    const modalEl = document.getElementById('addSubjectModal');
    const modal = bootstrap.Modal.getInstance(modalEl);
    modal.hide();
}
</script>

</body>
</html>
