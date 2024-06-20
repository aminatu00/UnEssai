<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->user_type === 'mentor') {
                // Décoder les expertises du mentor connecté depuis la chaîne JSON
                $userInterests = json_decode(Auth::user()->expertise);
            } elseif (Auth::user()->user_type === 'student') {
                // Décoder les centres d'intérêt de l'étudiant connecté depuis la chaîne JSON
                $userInterests = json_decode(Auth::user()->interests);
            }
    
            // Filtrer les catégories en fonction des centres d'intérêt ou des expertises de l'utilisateur
            $categories = Category::whereIn('nom', $userInterests)->get();
    
            // Passer les catégories filtrées à la vue
            return view('categorie', compact('categories'));
        }
    }




    public function indexCat()
    {
        // Récupérer toutes les catégories
        $categories = Category::all();

        // Retourner la vue avec les catégories
        return view('nonConnecter.categorie', compact('categories'));
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
