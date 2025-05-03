<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bon;
use App\Models\BCP;
use App\Models\BMCE;
use App\Models\CIH;
use App\Models\CreditAgricole;
use App\Models\SGMA;
use App\Models\AttijariwafaBank;
use App\Models\BMCI;
use Barryvdh\DomPDF\Facade;
use PDF;
class BonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    // public function index()
    // {
    //     // Liste des banques avec leurs informations
    //     $banks = [
    //         'BCP' => 'App\Models\BCP',
    //         'BMCE' => 'App\Models\BMCE',
    //         'CIH' => 'App\Models\CIH',
    //         'Attijariwafa Bank' => 'App\Models\AttijariwafaBank',
    //         'BMCI' => 'App\Models\BMCI',
    //         'SGMA' => 'App\Models\SGMA',
    //         'Crédit Agricole' => 'App\Models\CreditAgricole',
    //     ];

    //     // Récupérer les valeurs de la session ou utiliser des valeurs par défaut
    //     $selectedBank = session('selectedBank', 'Banque Centrale Populaire');
    //     $selectedAccountNumber = session('selectedAccountNumber', '190 780 21211 7163212 000 1 58');
    //     $type = session('selectedType', 'escompte'); // Exemple de valeur par défaut

    //     $bons = Bon::all(); // Récupérer les bons (ou toute autre donnée nécessaire)

    //     return view('bons.index', [
    //         'bons' => $bons,
    //         'selectedBank' => $selectedBank,
    //         'selectedAccountNumber' => $selectedAccountNumber,
    //         'type' => $type,
    //         'banks' => $banks,
    //     ]);
    // }
    public function showBankSelection()
{

    $banks = [
        'BCP' => route('bons.show', ['bankName' => 'BCP']),
        'BMCE' => route('bons.show', ['bankName' => 'BMCE']),
        'CIH' => route('bons.show', ['bankName' => 'CIH']),
        'Attijariwafa Bank' => route('bons.show', ['bankName' => 'Attijariwafa Bank']),
        'BMCI' => route('bons.show', ['bankName' => 'BMCI']),
        'SGMA' => route('bons.show', ['bankName' => 'SGMA']),
        'Crédit Agricole' => route('bons.show', ['bankName' => 'Crédit Agricole']),
    ];

    return view('bons.index', ['banks' => $banks]);
}

protected function getModelForBank($bankName)
{
    $models = [
        'BCP' => 'App\Models\BCP',
        'BMCE' => 'App\Models\BMCE',
        'CIH' => 'App\Models\CIH',
        'Attijariwafa Bank' => 'App\Models\AttijariwafaBank',
        'BMCI' => 'App\Models\BMCI',
        'SGMA' => 'App\Models\SGMA',
        'Crédit Agricole' => 'App\Models\CreditAgricole',
    ];
    return $models[$bankName] ?? null;
}
    public function create()
    {
        return view('bons.create');
    }
    public function store(Request $request)
{
    try {
        // Validation des données
        $request->validate([
            'bank' => 'required|string',
            'account_number' => 'required|string',
            'date' => 'required|date',
            'type' => 'required|string',
            'establishment' => 'required|string',
            'payer_name' => 'required|string',
            'lcn_number' => 'required|string',
            'due_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);
        // Mappage des noms de banque aux modèles
        $bankModels = [
            'BCP' => 'App\Models\BCP',
            'BMCE' => 'App\Models\BMCE',
            'CIH' => 'App\Models\CIH',
            'Attijariwafa Bank' => 'App\Models\AttijariwafaBank',
            'BMCI' => 'App\Models\BMCI',
            'SGMA' => 'App\Models\SGMA',
            'Crédit Agricole' => 'App\Models\CreditAgricole',
        ];
        // Obtenir le modèle correspondant à la banque sélectionnée
        $bankModel = $bankModels[$request->bank] ?? null;
        if (!$bankModel) {
            return response()->json(['success' => false, 'message' => 'La banque sélectionnée est invalide.'], 400);
        }

        // Création du bon dans la table appropriée
        $bon = new $bankModel();
        $bon->date = $request->date;
        $bon->type = $request->type;
        $bon->establishment = $request->establishment;
        $bon->payer_name = $request->payer_name;
        $bon->lcn_number = $request->lcn_number;
        $bon->due_date = $request->due_date;
        $bon->amount = $request->amount;
        $bon->account_number = $request->account_number;
        $bon->save();
        return response()->json(['success' => true, 'message' => 'Bon ajouté avec succès.', 'bank' => $request->bank]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Une erreur est survenue: ' . $e->getMessage()], 500);
    }
}
    public function showBank($bankName)
{
    // Mappage des noms de banque aux modèles
    $bankModels = [
        'BCP' => 'App\Models\BCP',
        'BMCE' => 'App\Models\BMCE',
        'CIH' => 'App\Models\CIH',
        'Attijariwafa Bank' => 'App\Models\AttijariwafaBank',
        'BMCI' => 'App\Models\BMCI',
        'SGMA' => 'App\Models\SGMA',
        'Crédit Agricole' => 'App\Models\CreditAgricole',
    ];

    $bankModel = $bankModels[$bankName] ?? null;

    if (!$bankModel) {
        return redirect()->back()->with('error', 'La banque spécifiée est invalide.');
    }

    // Obtenir les bons pour le modèle de banque spécifié
    $bons = $bankModel::all();

    // Calculer le montant total, le nombre de LCN et le nombre de lignes
    $totalAmount = $bons->sum('amount');
    $totalLCN = $bons->count(); // Nombre total de LCN
    $totalRows = $bons->count(); // Nombre total de lignes

    // Définir le numéro de compte
    $selectedAccountNumber = $bons->isEmpty() ? 'Non spécifié' : $bons->first()->account_number;

    // Définir le type si nécessaire
    $type = $bons->isEmpty() ? null : $bons->first()->type;

    return view('bons.show', [
        'bons' => $bons,
        'selectedBank' => $bankName,
        'selectedAccountNumber' => $selectedAccountNumber,
        'type' => $type,
        'totalAmount' => $totalAmount,
        'totalLCN' => $totalLCN,
        'totalRows' => $totalRows
    ]);
}

public function downloadPDF($bankName, $type)
{
    // Mappage des noms de banque aux modèles
    $bankModels = [
        'BCP' => 'App\Models\BCP',
        'BMCE' => 'App\Models\BMCE',
        'CIH' => 'App\Models\CIH',
        'Attijariwafa Bank' => 'App\Models\AttijariwafaBank',
        'BMCI' => 'App\Models\BMCI',
        'SGMA' => 'App\Models\SGMA',
        'Crédit Agricole' => 'App\Models\CreditAgricole',
    ];

    // Vérifiez si le nom de la banque est valide
    if (!array_key_exists($bankName, $bankModels)) {
        return redirect()->back()->with('error', 'La banque spécifiée est invalide.');
    }

    $bankModel = $bankModels[$bankName];

    // Obtenir les bons pour le modèle de banque spécifié
    $bons = $bankModel::where('type', $type)->get();

    if ($bons->isEmpty()) {
        return redirect()->back()->with('error', 'Aucun bon trouvé pour cette banque et ce type.');
    }

    // Calculer le montant total et le nombre de LCN
    $totalAmount = $bons->sum('amount');
    $totalLCN = $bons->count();
    $selectedAccountNumber = $bons->isEmpty() ? 'Non spécifié' : $bons->first()->account_number;
    $type = $bons->isEmpty() ? null : $bons->first()->type;

    // Générer le PDF
    $pdf = PDF::loadView('bons.pdf', [
        'bons' => $bons,
        'bankName' => $bankName,
        'selectedAccountNumber' => $selectedAccountNumber,
        'totalAmount' => $totalAmount,
        'totalLCN' => $totalLCN,
        'type' => $type ?? '1',  // Gardez cette définition ici
        'selectedBank' => $bankName,
    ]);

    return $pdf->download('bons_' . $bankName . '_' . $type . '.pdf');
}

public function destroy($id)
{
    // Try to find the bon in all bank-specific tables
    $bon = Bon::find($id) ?? BCP::find($id) ?? BMCE::find($id) ?? BMCI::find($id) ?? CIH::find($id) ?? SGMA::find($id) ?? AttijariwafaBank::find($id) ?? CreditAgricole::find($id);

    if (!$bon) {
        return redirect()->back()->with('error', 'Le bon spécifié n\'existe pas.');
    }

    // Get the bank name
    $bankName = $this->getBankName($bon);

    if (!$bankName) {
        return redirect()->back()->with('error', 'Impossible de déterminer la banque du bon.');
    }

    // Delete the bon
    $bon->delete();

    // Redirect to the bank's show page with the bank name
    return redirect()->route('bons.show', ['bankName' => $bankName])->with('success', 'Le bon a été supprimé avec succès.');
}

protected function getBankName($bon)
{
    if ($bon instanceof Bon) {
        return 'bon'; // Nom de la table ou identifiant de la banque
    } elseif ($bon instanceof BCP) {
        return 'BCP';
    } elseif ($bon instanceof BMCE) {
        return 'BMCE';
    } elseif ($bon instanceof BMCI) {
        return 'BMCI';
    } elseif ($bon instanceof CIH) {
        return 'CIH';
    } elseif ($bon instanceof SGMA) {
        return 'SGMA';
    } elseif ($bon instanceof AttijariwafaBank) {
        return 'AttijariwafaBank';
    } elseif ($bon instanceof CreditAgricole) {
        return 'CreditAgricole';
    } else {
        return null;
    }
}
public function vider($bankName)
{
    // Define an array of all the bank-specific table models
    $bankModels = [
        'Bon' => Bon::class,
        'BCP' => BCP::class,
        'BMCE' => BMCE::class,
        'BMCI' => BMCI::class,
        'CIH' => CIH::class,
        'SGMA' => SGMA::class,
        'Attijariwafa Bank' => AttijariwafaBank::class,
        'Crédit Agricole' => CreditAgricole::class,
    ];

    // Check if the specified bank name is valid
    if (!array_key_exists($bankName, $bankModels)) {
        return redirect()->back()->with('error', 'Nom de banque invalide.');
    }

    // Get the model class for the specified bank
    $bankModel = $bankModels[$bankName];
    // Truncate the records in the specific bank table
    $bankModel::truncate();
    return redirect()->back()->with('success', 'Les données ont été supprimées pour la banque: ' . $bankName);
}
// Helper function to get the bank name from the model class

protected function getBankNameFromModel($model)
{
    switch ($model) {
        case Bon::class:
            return 'Bon';
        case BCP::class:
            return 'BCP';
        case BMCE::class:
            return 'BMCE';
        case BMCI::class:
            return 'BMCI';
        case CIH::class:
            return 'CIH';
        case SGMA::class:
            return 'SGMA';
        case AttijariwafaBank::class:
            return 'Attijariwafa Bank';
        case CreditAgricole::class:
            return 'Crédit Agricole';
        default:
            return 'Inconnu';
    }
}

}
