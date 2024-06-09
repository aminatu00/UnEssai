<?php

namespace App\Http\Controllers;

use App\Mail\MentorRequestValidated;
use App\Models\DemandeMentorat;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\MentorRequestNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



class DemandeMentoratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showForm()
     {
         return view('mentorat.demande');
     }


     public function submit(Request $request)
     {
         $request->validate([
             'prenom' => 'required|string|max:255',
             'nom' => 'required|string|max:255',
             'email' => 'required|string|email|max:255',
             'phone' => 'required|string|max:20',
             'domain' => 'required|array', // Changer validation de 'string' à 'array'
             'domain.*' => 'string|max:255', // Validation pour chaque élément du tableau
             'current_level' => 'required|string|max:255',
             'motivation' => 'required|string',
             'documents.*' => 'file|mimes:pdf,doc,docx,jpg,png|max:2048',
         ]);
 
         $documents = [];
         if ($request->hasFile('documents')) {
             foreach ($request->file('documents') as $document) {
                $path = $document->store('public/documents');
                                 $documents[] = $path;
             }
         }
 
         $mentorRequest = DemandeMentorat::create([
             'user_id' => Auth::id(),
             'prenom' => $request->prenom,
             'nom' => $request->nom,
             'email' => $request->email,
             'phone' => $request->phone,
             'domain' => json_encode($request->domain), // Convertir le tableau en JSON pour le stockage     
             'current_level' => $request->current_level,
             'motivation' => $request->motivation,
             'documents' => $documents,
         ]);
 
         // Notify admin about the new mentor request
         $admin = User::where('user_type', 'admin')->first();
         if ($admin) {
             $admin->notify(new MentorRequestNotification($mentorRequest));
         }
 
         return redirect()->route('question.index')->with('success', 'Votre demande de mentorat a été soumise avec succès.');
     }

     



     public function show($id)
     {
         $mentorRequest = DemandeMentorat::findOrFail($id);

         $domains = json_decode($mentorRequest->domain, true);
         
         // Vérifiez si le champ documents est déjà un tableau ou non
         $documents = is_array($mentorRequest->documents) ? $mentorRequest->documents : json_decode($mentorRequest->documents, true);
         
         return view('admin.vueDemande', compact('mentorRequest', 'documents','domains'));
     }
     


     public function index()
     {
         $mentorRequests = DemandeMentorat::all();
         return view('admin.tousLesDemande', compact('mentorRequests'));
     }
     



     public function validateRequest($id)
     {
         $mentorRequest = DemandeMentorat::findOrFail($id);
     
         // Valider la demande ici
         $mentorRequest->valide = true;
         $mentorRequest->save();
     
         // Envoyer une notification par e-mail à l'étudiant
         $studentEmail = $mentorRequest->email;

         Mail::to($studentEmail)->send(new MentorRequestValidated($mentorRequest));
     
         return redirect()->route('admin.dashboardeu')->with('success', 'La demande a été validée avec succès.');
     }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DemandeMentorat $demandeMentorat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DemandeMentorat $demandeMentorat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DemandeMentorat $demandeMentorat)
    {
        //
    }
}
