<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Liste des Bons</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        @font-face {
            font-family: 'DejaVu Sans';
            src: url('https://example.com/path/to/dejavu-sans.ttf') format('truetype');
        }


        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 1000px;
            margin: auto;
        }

        .info-table, .data-table, .summary-table, .status-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .info-table td, .data-table th, .data-table td, .summary-table th, .status-table th, .status-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .info-table {
            background-color: #f9f9f9;
        }

        .info-table td {
            text-align: center;
            font-weight: bold;
        }

        .data-table {
            border: 1px solid #ddd;
        }

        .data-table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .data-table td {
            text-align: left;
        }

        .summary-table {
            border: 1px solid #ddd;
            margin-top: 20px;
        }

        .summary-table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .status-table th, .status-table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .status-table th {
            background-color: #f2f2f2;
        }

        .bank-name {
            font-weight: bold;
            text-align: center;
        }

        .line-container {
            margin-bottom: 20px;
        }



        .table-wrapper {
            flex: 1;
            margin-right: 20px;
        }

        .table-wrapper:last-child {
            margin-right: 0;
        }

        .table-wrapper table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-wrapper th, .table-wrapper td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .table-wrapper th {
            background-color: #f2f2f2;
        }

        .left-align {
            text-align: left;
        }

        .right-align {
            text-align: right;
        }

        .align-center {
            text-align: center;
        }
        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container" id="content">
        <table class="info-table">
            <tbody>
                <tr>
                    <td colspan="3">{{ $selectedBank }}</td>
                </tr>
                <tr>
                    <td colspan="3">AGENCE : ESPACE GRANDES ENTREPRISES</td>
                </tr>
                <tr>
                    <td colspan="3">BORDEREAU DE REMISE DES LCN</td>
                </tr>
            </tbody>
        </table>

        <div class="line-container">
            <div style="font-weight: bold;">Casablanca le : {{ date('d/m/Y') }}</div>
        </div>

        <div class="" style="display:block !important; width: 100% !important; position: relative !important;">
            <div class="table-wrapper" style="width: 40% !important; float:left;">
                <table class="two-column-table" style="width: 120%">
                    <tr>
                        <th>COMPTE N°</th>
                    </tr>
                    <tr>
                        <td>{{ $selectedAccountNumber ?? 'Non spécifié' }}</td>
                    </tr>
                </table>

            </div>
            <div class="table-wrapper" style="width: 40%  !important; float: right;">
                <table class="single-column-table">
                    <tr>
                        <td class="bank-name">SOMASTEEL SARL</td>
                    </tr>
                </table>
            </div>
            <div style="clear: both;"></div>
        </div>
        {{-- position: absolute !important; top:0; right:0; --}}
        <div style="width: 100%; display: block; margin-top: 10px;">
            <table class="status-table" style="width: 40%;">
                <tr>
                    <th>Encaissement</th>
                    <td>@if($type == 'encaissement') &#10004; @endif</td>
                </tr>
                <tr>
                    <th>Escompte en intérêts</th>
                    <td>@if($type == 'escompte') &#10004; @endif</td>
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
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" style="text-align: right; font-weight: bold;">Total</td>
                    <td style="font-weight: bold;">{{ number_format($totalAmount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <table class="summary-table" style="width: 40%;">
            <thead>
                <tr>
                    <th>Nombre LCN</th>
                    <th>{{ $totalLCN }}</th>
                </tr>
            </thead>
        </table>
    </div>
</body>
</html>
