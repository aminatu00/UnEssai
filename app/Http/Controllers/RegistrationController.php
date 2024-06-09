<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expertise;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function showStudentForm()
     {
         return view('admin.ajoutEtu');
     }

 



    public function showMentorForm()
    {
        $domains = [
            'informatique' => ['java', 'php', 'html', 'css', 'javascript'],
            'reseaux' => ['reseaux sans fil', 'reseaux avec fil'],
           
        ];

        $sub_expertises = [
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
        

        return view('admin.ajoutMentor', compact('domains','sub_expertises'));
    }

//     public function showMentorForm()
// {
//     $expertisesParNiveau = [
//         'licence 2' => [
//             'informatique' => ['java', 'php', 'html', 'css', 'javascript'],
//             'reseaux' => ['reseaux sans fil', 'reseaux avec fil']
//         ],
//         'licence 3' => [
//             'informatique' => ['python', 'ruby', 'mysql', 'mongodb', 'angular'],
//             'reseaux' => ['cisco', 'routing', 'switching']
//         ],
//         // Ajoutez d'autres niveaux et leurs relations avec les domaines et les sous-expertises
//     ];

//     return view('admin.ajoutMentor', compact('expertisesParNiveau'));
// }


   

    public function index()
    {
        //
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
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $registration)
    {
        //
    }
}
