<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Http\Request;

class VerificationCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:6', // Validation du code à 6 chiffres
        ]);

        // Recherche du code de vérification dans la base de données
        $verificationCode = VerificationCode::where('code', $request->code)->first();

        if ($verificationCode) {
            // Marquer l'e-mail comme vérifié dans la table des utilisateurs
            User::where('email', $verificationCode->email)->update(['email_verified' => true]);

            // Supprimer le code de vérification de la base de données
            $verificationCode->delete();

            // Redirection vers une page de succès ou une autre page
            return redirect()->route('login')->with('success', 'Votre adresse e-mail a été vérifiée avec succès.');
        } else {
            // Le code de vérification est invalide
            return redirect()->back()->with('error', 'Le code de vérification est incorrect.');
        }
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
    public function show()
    {
        return view('emails.activation');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VerificationCode $verificationCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VerificationCode $verificationCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VerificationCode $verificationCode)
    {
        //
    }
}
