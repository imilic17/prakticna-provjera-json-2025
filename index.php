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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dodajModal">
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
                <td>Sigurnost informacijskih sustava</td>
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
                <td>Samo za najjaće</td>
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
                <td>Uči se komunicirati u poslovnom okruženju</td>
            </tr>
        </tbody>
    </table>
</div>


<div class="modal fade" id="dodajModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Dodaj novi predmet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="predmetForm">

                    <div class="mb-3">
                        <label class="form-label">Naziv predmeta</label>
                        <input id="naziv" type="text" class="form-control" placeholder="Unesi naziv predmeta">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ime profesora</label>
                        <input id="profesor" type="text" class="form-control" placeholder="Unesi ime profesora">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Godišnji fond sati</label>
                        <input id="fond" type="number" class="form-control" placeholder="Unesi broj sati">
                    </div>

                   
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="uvjet">
                        <label class="form-check-label" for="uvjet">Predmet je uvjet za iduću godinu</label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Opis predmeta</label>
                        <textarea id="opis" class="form-control" placeholder="Unesi opis predmeta"></textarea>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="addPredmet()">Spremi promjene</button>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>

function searchTable() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const rows = document.querySelectorAll("#predmetiTable tbody tr");

    rows.forEach(row => {
        const naziv = row.cells[1].innerText.toLowerCase();
        row.style.display = naziv.includes(input) ? "" : "none";
    });
}


document.getElementById("searchInput").addEventListener("keyup", searchTable);


function addPredmet() {
    let naziv = document.getElementById("naziv").value.trim();
    let profesor = document.getElementById("profesor").value.trim();
    let fond = document.getElementById("fond").value.trim();
    let opis = document.getElementById("opis").value.trim();
    let uvjet = document.getElementById("uvjet").checked ? "DA" : "NE";

    if (!naziv || !profesor || !fond || !opis) {
        alert("Molimo ispunite sva polja.");
        return;
    }

    let table = document
        .getElementById("predmetiTable")
        .getElementsByTagName("tbody")[0];

    let newRow = table.insertRow();

    if (uvjet === "DA") {
        newRow.classList.add("table-success");
    }

    let id = table.rows.length;

    newRow.innerHTML = `
        <td>${id}</td>
        <td>${naziv}</td>
        <td>${profesor}</td>
        <td>${fond}</td>
        <td>${uvjet}</td>
        <td>${opis}</td>
    `;

    document.getElementById("predmetForm").reset();

    let modal = bootstrap.Modal.getInstance(document.getElementById("dodajModal"));
    modal.hide();
}
</script>

</body>
</html>
