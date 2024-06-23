<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = Auth::user();

    // Initialiser la requête pour récupérer les étudiants et les mentors
    $studentsQuery = User::where('user_type', 'student');
    $mentorsQuery = User::where('user_type', 'mentor');

    // Supprimer les guillemets doubles supplémentaires autour de la valeur "math"
    $expertise = json_decode($user->expertise, true);

    // Si l'utilisateur est un mentor
    if ($user->user_type === 'mentor' && is_array($expertise)) {
        $studentsQuery->where(function ($query) use ($expertise, $user) {
            foreach ($expertise as $exp) {
                $query->orWhereJsonContains('interests', $exp);
            }
        })->where('niveau', '<', $user->niveau);

        $mentorsQuery->where(function ($query) use ($expertise, $user) {
            foreach ($expertise as $exp) {
                $query->orWhereJsonContains('expertise', $exp);
            }
        })->where('niveau', '>', $user->niveau)->where('id', '!=', $user->id);
    }
    // Si l'utilisateur est un étudiant
    elseif ($user->user_type === 'student') {
        $mentorsQuery->where('niveau', '>', $user->niveau)
                    ->whereNotIn('id', function ($query) use ($user) {
                        $query->select('id')
                              ->from('users')
                              ->where('user_type', 'mentor')
                              ->where('niveau', '<=', $user->niveau)
                              ->whereIn('expertise', json_decode($user->interests));
                    });
    }

    $students = $studentsQuery->get();
    $mentors = $mentorsQuery->get();

    return view('listeUser', compact('students', 'mentors'));
}

public function show($id)
{
    $mentor = User::findOrFail($id);
    return view('mentor.profilMentor', compact('mentor'));
}

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
