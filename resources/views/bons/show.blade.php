<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Liste des Bons</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .info-table, .single-column-table, .two-column-table, .status-table, .data-table, .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .summary-table {
            width: 100%;
            display: flex;
            justify-content: start;
        }

        .info-table td, .single-column-table td, .two-column-table th, .two-column-table td, .status-table th, .status-table td, .data-table th, .data-table td, .summary-table th, .summary-table td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .info-table td {
            text-align: center;
        }

        .two-column-table {
            width: 40%;
            border-collapse: collapse;
            padding-right: 50px;
            background-color: #f4f4f4;
            float: inline-start;
            margin-right: 10px;
        }

        .status-table th {
            background-color: #f4f4f4;
        }

        .data-table th {
            background-color: rgb(255, 193, 7);
            color: white;
        }

        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .data-table tr:hover {
            background-color: #f1f1f1;
        }

        .button-container {
            margin-top: 20px;
        }

        .add-button, .download-button, .print-button, .delet-button, .return-button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin: 5px;
            cursor: pointer;
            color: white;
            font-size: 16px;
        }

        .add-button {
            background-color: #28a745;
        }

        .download-button {
            background-color: #007bff;
        }

        .print-button {
            background-color: #dc3545;
        }
        .delet-button {
            background-color: #a728a1;
        }

        .return-button {
            background-color: #00ffea;
        }

        .line-container {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin-bottom: 10px;
            align-items: center;
        }

        .line-container div {
            flex: 1;
        }
        .single-column-table td {
            text-align: center;
            background-color: #fff;
        }

        .single-column-table {
            margin: 0;
            width: 20%;
            height: 20%;
        }

        .bank-name {
            font-weight: bold;
        }

        @media print {
            body {
                background-color: white;
            }
            .container {
                box-shadow: none;
                width: 100%;
                border-radius: 0;
                padding: 0;
                margin: 0;
            }
            .info-table, .single-column-table, .two-column-table, .status-table, .data-table, .summary-table {
                border: 1px solid #ddd;
                margin: 0;
                width: 100%;
            }
            .info-table td, .single-column-table td, .two-column-table td, .status-table td, .data-table td, .summary-table td {
                padding: 5px;
                text-align: left;
            }
        }
        .container {
            width: 80%;
            max-height: 90vh;
            overflow: auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: start;
            justify-items: start;
        }
        .delete-button {
    background-color: #dc3545;
    border: none;
    color: white;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 2px 1px;
    cursor: pointer;
    border-radius: 5px;
}

.delete-button:hover {
    background-color: #c82333;
}
.reset-button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    margin: 5px;
    cursor: pointer;
    color: white;
    font-size: 16px;
    background-color: #ffc107;
}

.reset-button:hover {
    background-color: #e0a800;
}


    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    <div class="container" id="content">
        <table class="info-table" style="font-weight: bold;">
            <tbody>
                <tr>
                    <td colspan="3" class="title">{{ $selectedBank }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="subtitle">AGENCE : ESPACE GRANDES ENTREPRISES</td>
                </tr>
                <tr>
                    <td colspan="3" class="subtitle">BORDEREAU DE REMISE DES LCN</td>
                </tr>
            </tbody>
        </table>

        <div class="line-container">
            <div style="font-weight: bold;">Casablanca le : {{ date('d/m/Y') }}</div>
            <table class="single-column-table">
                <tr></tr>
            </table>
        </div>

        <div class="" style="width: 100% !important; display:flex; justify-content: space-between;">
            <table class="two-column-table">
                <tr>
                    <th>COMPTE N°</th>
                </tr>
                <tr>
                    <td>{{ $selectedAccountNumber ?? 'Non spécifié' }}</td>
                </tr>
            </table>

            <table class="single-column-table">
                <tr>
                    <td class="bank-name">SOMASTEEL SARL</td>
                </tr>
            </table>
        </div>

        <div class="status-table" style="width: 100% !important; display:flex;justify-content:start;">
            <table class="status-table" style="width: 40% !important;">
                <tr>
                    <th>Encaissement</th>
                    <td>@if($type == 'encaissement') ✔ @endif</td>
                </tr>
                <tr>
                    <th>Escompte en intérêts</th>
                    <td>@if($type == 'escompte') ✔ @endif</td>
                </tr>
            </table>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Établissement Payeur</th>
                    <th>Nom du Titre</th>
                    <th>N° LCN</th>
                    <th>Date d'Échéance</th>
                    <th>Montant</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bons as $bon)
                    <tr>
                        <td>{{ $bon->establishment }}</td>
                        <td>{{ $bon->payer_name }}</td>
                        <td>{{ $bon->lcn_number }}</td>
                        <td>{{ $bon->due_date }}</td>
                        <td>{{ number_format($bon->amount, 2) }}</td>
                        <td>
                            <form  id="delete-form" action="{{ route('bons.destroy', $bon->id) }}" method="POST" style="display:inline;">

                                @csrf
                                @method('DELETE')
                                <button type="button" class="delete-button" onclick="confirmDelete()">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" style="text-align: right; font-weight: bold;">Total</td>
                    <td style="font-weight: bold;">{{ number_format($totalAmount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <table class="summary-table">
            <thead>
                <tr>
                    <th>Nombre LCN</th>
                    <td id="nombre-lcn">{{ $totalLCN }}</td>
                </tr>
            </thead>
        </table>

        <div class="button-container">
            <!-- Ajouter un bouton avec une icône -->
            <button class="add-button" onclick="openModal()">
                <i class="fas fa-plus"></i>
            </button>

            <!-- Télécharger PDF avec une icône -->
            <button onclick="window.location.href='{{ route('bons.downloadPDF', ['bankName' => $selectedBank, 'type' => ($type ?? '1')]) }}'" class="download-button">
                <i class="fas fa-file-pdf"></i>
            </button>

            <!-- Imprimer avec une icône -->
            <button onclick="printContent()" class="print-button">
                <i class="fas fa-print"></i>
            </button>

            <!-- Vider avec une icône -->
            <a type="button" href="javascript:void(0);" onclick="confirmVider('{{ $selectedBank }}')" class="delet-button">
                <i class="fas fa-trash-alt"></i>
            </a>

            <!-- Retour avec une icône -->
            <button onclick="window.location.href='{{ url('/bank') }}'" class="return-button">
                <i class="fas fa-arrow-left"></i>
            </button>
        </div>
        <style>
            .button-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

button, a {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
}

button i, a i {
    margin-right: 8px; /* Espace entre l'icône et le texte */
}

        </style>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

function confirmDelete() {
    Swal.fire({
        title: 'Êtes-vous sûr ?',
        text: "Vous ne pourrez pas revenir en arrière après cette action !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Oui, supprimer !',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the form or trigger the deletion
            document.getElementById('delete-form').submit(); // Adjust to your form's ID
        }
    });
}
function confirmVider(bankName) {
            Swal.fire({
                title: 'Êtes-vous sûr de vouloir vider les données de la banque?',
                text: "Cette action est irréversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, vider!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/bank/${bankName}/vider`; // Ajustez la route ici
                }
            });
        }
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
     function printContent() {
    // Sélectionner tous les éléments nécessaires
    const titleElement = document.querySelector('.title');
    const subtitleElements = document.querySelectorAll('.subtitle');
    const infoTableRows = document.querySelectorAll('.info-table tr');
    const lineContainer = document.querySelector('.line-container');
    const twoColumnTable = document.querySelector('.two-column-table');
    const singleColumnTable = document.querySelector('.single-column-table');
    const statusTable = document.querySelector('.status-table');
    const dataTable = document.querySelector('.data-table');
    const summaryTable = document.querySelector('.summary-table');

    if (!titleElement || subtitleElements.length === 0 || infoTableRows.length === 0 || !dataTable || !summaryTable) {
        console.error('Un ou plusieurs éléments nécessaires sont introuvables.');
        return;
    }

    // Créer une copie de la table des données pour la version imprimée
    const printDataTable = dataTable.cloneNode(true);

    // Retirer la colonne "Action" de la table pour l'impression
    const headers = printDataTable.querySelectorAll('thead th');
    const actionHeaderIndex = Array.from(headers).findIndex(th => th.textContent.trim() === 'Action');

    if (actionHeaderIndex > -1) {
        // Supprimer la colonne d'en-tête
        headers[actionHeaderIndex].remove();

        // Supprimer les cellules de la colonne "Action" dans chaque ligne du tableau
        const rows = printDataTable.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const cellToRemove = row.children[actionHeaderIndex];
            if (cellToRemove) {
                cellToRemove.remove();
            }
        });
    }

    // Ouvrir la fenêtre d'impression
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
        <head>
            <title> Impression Bons</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: white;
                    color: #333;
                    margin: 0;
                    padding: 0;
                    min-height: 100vh;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 10px;
                }
                th, td {
                    border: 1px solid #ddd;
                    padding: 5px;
                    font-size: 10px;
                }
                .info-table td, .single-column-table td, .two-column-table th, .two-column-table td, .status-table th, .status-table td, .data-table th, .data-table td, .summary-table th, .summary-table td {
                    border: 1px solid #ddd;
                    padding: 5px;
                    font-size: 10px;
                }
                .info-table td {
                    text-align: center;
                }
                .two-column-table {
                    width: 40%;
                    border-collapse: collapse;
                    padding-right: 10px;
                }
                .status-table th {
                    background-color: white;
                }
                .data-table th {
                    background-color: rgb(255, 193, 7);
                    color: white;
                }
                .data-table tr:nth-child(even) {
                    background-color: #f9f9f9;
                }
                .data-table tr:hover {
                    background-color: #f1f1f1;
                }
                .summary-table {
                    width: 100%;
                    display: flex;
                    justify-content: start;
                }
                .line-container {
                    display: flex;
                    justify-content: space-between;
                    width: 100%;
                    margin-bottom: 5px;
                    align-items: center;
                }
                .line-container div {
                    flex: 1;
                    font-size: 10px;
                }
                .single-column-table {
                    margin: 0;
                    width: 25%; /* Ajustez cette valeur selon vos besoins */
                    font-size: 10px;
                }
                .bank-name {
                    font-weight: bold;
                    font-size: 10px;
                }
                .status-table {
                    display: flex;
                    justify-content: flex-start;
                    width: 100%;
                    margin-top: 5px;
                }
                .status-content {
                    width: 50%; /* Ajustez cette valeur selon vos besoins */
                }
                @media print {
                    body {
                        font-family: Arial, sans-serif;
                        background-color: white;
                        color: #333;
                        margin: 0;
                        padding: 0;
                        min-height: 100vh;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        font-size: 10px;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 10px;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 5px;
                        font-size: 10px;
                    }
                    .info-table td, .single-column-table td, .two-column-table th, .two-column-table td, .status-table th, .status-table td, .data-table th, .data-table td, .summary-table th, .summary-table td {
                        border: 1px solid #ddd;
                        padding: 5px;
                        font-size: 10px;
                    }
                    .info-table td {
                        text-align: center;
                    }
                    .two-column-table {
                        width: 40%;
                        border-collapse: collapse;
                        padding-right: 10px;
                    }
                    .status-table {
                        display: flex;
                        justify-content: flex-start;
                        width: 100%;
                        margin-top: 5px;
                    }
                    .status-content {
                        width: 50%; /* Ajustez cette valeur selon vos besoins */
                    }
                    .status-table th {
                        background-color: white;
                    }
                    .data-table th {
                        background-color: rgb(255, 193, 7);
                        color: white;
                    }
                    .data-table tr:nth-child(even) {
                        background-color: #f9f9f9;
                    }
                    .data-table tr:hover {
                        background-color: #f1f1f1;
                    }
                    .summary-table {
                        width: 100%;
                        display: flex;
                        justify-content: start;
                    }
                    .line-container {
                        display: flex;
                        justify-content: space-between;
                        width: 100%;
                        margin-bottom: 5px;
                        align-items: center;
                    }
                    .line-container div {
                        flex: 1;
                        font-size: 10px;
                    }
                    .single-column-table {
                        margin: 0;
                        width: 25%; /* Ajustez cette valeur selon vos besoins */
                        font-size: 10px;
                    }
                    .bank-name {
                        font-weight: bold;
                        font-size: 10px;
                    }
                }
            </style>
        </head>
        <body>
    `);

    // Ajout des éléments dans l'ordre souhaité
    printWindow.document.write('<table class="info-table">');
    infoTableRows.forEach(infoTableRow => {
        printWindow.document.write(infoTableRow.outerHTML);
    });
    printWindow.document.write('</table>');

    // Ajouter la partie supplémentaire
    const selectedStatus = document.querySelector('.status-table td') ? document.querySelector('.status-table td:nth-child(2)').innerText : '';
    printWindow.document.write(`
        <div class="line-container">
            <div style="font-weight: bold;">Casablanca le : ${new Date().toLocaleDateString()}</div>
            <table class="single-column-table">
                <tr></tr>
            </table>
        </div>

        <div style="width: 100% !important; display: flex; justify-content: space-between;">
            <table class="two-column-table">
                <tr>
                    <th>COMPTE N°</th>
                </tr>
                <tr>
                    <td>${document.querySelector('.two-column-table td') ? document.querySelector('.two-column-table td').innerText : 'Non spécifié'}</td>
                </tr>
            </table>
            <table class="single-column-table">
                <tr>
                    <td class="bank-name">SOMASTEEL SARL</td>
                </tr>
            </table>
  </div>
        <div id="content" style="width: 100%; display: flex; justify-content: flex-start;">
            <div class="status-content">
                ${statusTable.outerHTML}
            </div>
        </div>
    `);

    printWindow.document.write(printDataTable.outerHTML);
    printWindow.document.write(summaryTable.outerHTML);

    printWindow.document.write(`
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
}


</script>
<!-- Modal Form -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Ajouter un Bon</h2>
        <form id="addForm" action="{{ route('bons.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="bank">Banque :</label>
                <select name="bank" id="bank" class="form-control" onchange="updateAccountNumber()">
                    <option value="BCP" data-account="190 780 21211 7163212 000 1 58">BCP</option>
                    <option value="BMCE" data-account="190 780 21211 7163212 000 1 59">BMCE</option>
                    <option value="CIH" data-account="190 780 21211 7163212 000 1 60">CIH</option>
                    <option value="Attijariwafa Bank" data-account="190 780 21211 7163212 000 1 61">Attijariwafa Bank</option>
                    <option value="BMCI" data-account="190 780 21211 7163212 000 1 62">BMCI</option>
                    <option value="SGMA" data-account="190 780 21211 7163212 000 1 63">SGMA</option>
                    <option value="Crédit Agricole" data-account="190 780 21211 7163212 000 1 64">Crédit Agricole</option>
                </select>
            </div>
            <div class="form-group">
                <label for="account_number">Compte N° :</label>
                <input type="text" name="account_number" id="account_number" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="date">Date :</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ date('Y-m-d') }}" readonly>
            </div>
            <div class="form-group">
                <label>Type :</label>
                <div class="form-check">
                    <input type="radio" name="type" value="encaissement" class="form-check-input" id="encaissement" checked>
                    <label class="form-check-label" for="encaissement">Encaissement</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="type" value="escompte" class="form-check-input" id="escompte">
                    <label class="form-check-label" for="escompte">Escompte en Intérêts</label>
                </div>
            </div>
            <div class="form-group">
                <label for="establishment">Établissement Payeur :</label>
                <input type="text" name="establishment" id="establishment" class="form-control">
            </div>
            <div class="form-group">
                <label for="payer_name">Nom du Titre :</label>
                <input type="text" name="payer_name" id="payer_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="lcn_number">N° LCN :</label>
                <input type="text" name="lcn_number" id="lcn_number" class="form-control">
            </div>
            <div class="form-group">
                <label for="due_date">Date d'Échéance :</label>
                <input type="date" name="due_date" id="due_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="amount">Montant :</label>
                <input type="number" name="amount" id="amount" class="form-control" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('addModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('addModal').style.display = 'none';
    }

    function updateAccountNumber() {
        const bankSelect = document.getElementById('bank');
        const selectedOption = bankSelect.options[bankSelect.selectedIndex];
        const accountNumber = selectedOption.getAttribute('data-account');
        document.getElementById('account_number').value = accountNumber;
    }

    document.getElementById('addForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let formData = new FormData(this);

    fetch('{{ route('bons.store') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirect to the specific bank's page
            window.location.href = '/bank/' + data.bank;
        } else {
            alert('Une erreur est survenue: ' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});

</script>

<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
    }

    .modal-content {
        background-color: #f9f9f9;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 60%;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    
</style>
</body>
</html>
