<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Bon</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;

        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-group label {
            font-weight: bold;
        }
        .dynamic-title {
            font-size: 18px;
            font-weight: bold;]

            color: #555;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-title">Ajouter un Bon</div>
        <div class="dynamic-title" id="dynamicTitle">Banque Centrale Populaire et Compte N° : 190 780 21211 7163212 000 1 58</div>
        <form action="/store" method="POST">
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
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function updateAccountNumber() {
            const bankSelect = document.getElementById('bank');
            const accountNumber = bankSelect.options[bankSelect.selectedIndex].getAttribute('data-account');
            document.getElementById('account_number').value = accountNumber;

            const dynamicTitle = document.getElementById('dynamicTitle');
            dynamicTitle.textContent = `Banque : ${bankSelect.options[bankSelect.selectedIndex].text} et Compte N° : ${accountNumber}`;
        }
        // Appel initial pour définir la banque par défaut
        updateAccountNumber();
    </script>
</body>
</html>
