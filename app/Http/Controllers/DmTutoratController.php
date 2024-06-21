<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DmTutorat;
use App\Models\User;
use App\Notifications\DmTutoratNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DmTutoratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Définition des domaines et des sous-expertises
        $allDomains = [
            'informatique' => ['java', 'php', 'html', 'css', 'javascript'],
            'reseaux' => ['reseaux sans fil', 'reseaux avec fil'],
        ];
    
        $sub_expertises = [
            'licence 1' => [
                'informatique' => ['modulee1', 'modulee2', 'modulee3'],
                'reseaux' => ['modulee4', 'modulee5']
            ],
            'licence 2' => [
                'informatique' => ['module1', 'module2', 'module3'],
                'reseaux' => ['module4', 'module5']
            ],
            'licence 3' => [
                'informatique' => ['module6', 'module7', 'module8'],
                'reseaux' => ['module9', 'module10']
            ],
            'master 1' => [
                'informatique' => ['module11', 'module12', 'module13'],
                'reseaux' => ['module14', 'module15']
            ],
            'master 2' => [
                'informatique' => ['module16', 'module17', 'module18'],
                'reseaux' => ['module19', 'module20']
            ],
            // Ajoutez d'autres niveaux et leurs relations avec les domaines et les modules
        ];
    
        // Vérification de l'authentification de l'utilisateur
        if (Auth::check() && Auth::user()->user_type === 'student') {
            // Récupération des centres d'intérêt de l'étudiant
            $userInterests = json_decode(Auth::user()->interests);
    
            // Sélection des domaines en fonction des centres d'intérêt de l'étudiant
          // Sélection des domaines en fonction des centres d'intérêt de l'étudiant
// Sélection des domaines en fonction des centres d'intérêt de l'étudiant
$domains = [];
foreach ($allDomains as $domain => $subInterests) {
    if (in_array('informatique', $userInterests) && in_array('reseaux', $userInterests)) {
        // Si l'étudiant est intéressé par les deux domaines, prenez les deux
        $domains[] = 'informatique';
        $domains[] = 'reseaux';
        break; // Sortez de la boucle une fois les deux domaines trouvés
    } elseif (in_array($domain, $userInterests)) {
        // Si l'étudiant est intéressé par ce domaine spécifique
        $domains[] = $domain;
    }
}

    
            // Récupération du niveau de l'étudiant
            $niveau = Auth::user()->niveau;
        }
    
      
        // Affichage des informations pour le débogage
        // dd($domains, $niveau);
    
        // Retourner la vue avec les données nécessaires
        return view('student.DemandeTutorat', compact( 'sub_expertises', 'niveau', 'domains'));
    }

    




    
    /**
     * Store a newly created resource in storage.
     */
   
  /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'message' => 'required|string',
            'niveau' => 'required|string',
            'expertise' => 'required|array', // Assurez-vous que expertise est un tableau
        ]);
    
        // Création d'une nouvelle demande de tutorat
        $dmTutorat = new DmTutorat();
        $dmTutorat->message = $request->message;
        $dmTutorat->niveau = $request->niveau;
        $dmTutorat->expertise = implode(',', $request->expertise);
        $dmTutorat->save();
    
        // Trouver les mentors dont l'expertise correspond à celle choisie
        $mentors = User::where(function ($query) use ($request) {
            foreach ($request->expertise as $expertise) {
                $query->orWhere('expertise', 'LIKE', "%{$expertise}%");
            }
        })->get();
    
        Log::info('Nombre de mentors trouvés : ' . $mentors->count());
    
        // Envoyer la notification à chaque mentor
        foreach ($mentors as $mentor) {
            Log::info('Préparation à l\'envoi de la notification à ' . $mentor->email);
            $mentor->notify(new DmTutoratNotification($dmTutorat));
            Log::info('Notification envoyée à ' . $mentor->email);
        }
    
        // Charger les détails de la demande de tutorat
        $mentorRequest = DmTutorat::findOrFail($dmTutorat->id);
    
        // Charger les détails de la demande de tutorat et afficher une vue avec ces détails
        return redirect()->route('question.index')->with('success', 'Votre demande a bien été envoyée avec succès');
    }
    

  
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {  
        // Récupérer la demande de tutorat par son ID
        // $mentorRequest = DmTutorat::where('id', $id)->get();
        $mentorRequest = DmTutorat::all();    
        // Passer la demande de tutorat à la vue
        return view('mentor.DmTutorat', compact('mentorRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DmTutorat $dmTutorat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DmTutorat $dmTutorat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function index()
    {
        $mentorRequest = DmTutorat::all();
        return view('mentor.DmTutorat', compact('mentorRequest'));
    }

    public function destroy(DmTutorat $dmTutorat)
    {
        // $student = DmTutorat::findOrFail($dmTutorat);
        $dmTutorat->delete();
                return redirect()->route('mentor.DmTutorat')->with('success', 'Demande de tutorat supprimée avec succès.');
    }

   

}
