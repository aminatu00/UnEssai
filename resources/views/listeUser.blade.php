@extends('layouts.template')
@section('content')

<div class="container-fluid">



<div class="col-md-8 offset-md-2 text-white">
        <div class="card">
            <!-- Afficher les messages d'erreur -->
            @if ($errors->any())
            <div class="alert alert-danger auto-dismiss text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
             <!-- Afficher les messages de succès -->
             @if (session('success'))
                <div class="alert alert-success auto-dismiss text-white">
                    {{ session('success') }}
                </div>
            @endif
            <!-- <div class="card-header text-white"style="background-color: #081b29; border: 1px solid #0ef;">{{ __('La liste des utilisateurs ') }}</div> -->
            <div class="card-body text-white" style="background-color: #081b29; border: 1px solid #0ef;">

                <!-- Display mentors for students -->
                @if(auth()->user()->user_type === 'student')
                @if (!$mentors->isEmpty())
                <div class="mb-4 custom-background">
                    <h3 class="mb-4">Les Tuteurs</h3>
                    <table class="custom-table" style="width: 100%; padding: 10px;" >
                        <thead>
                            <tr>
                                <th>NomPrenom</th>
                                <th>Email</th>
                                <th>Niveau</th>
                                <!-- <th>Expertise</th> -->
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mentors as $mentor)
                            <tr>
                            <td><a href="{{ route('mentors.show', $mentor->id) }}">{{ $mentor->name }}</a></td>
                                <td>{{ $mentor->email }}</td>
                                <td>{{ $mentor->niveau }}</td>
                               <!-- <td>
                                @php
                                $studentMentora = json_decode($mentor->expertise);
                                echo implode('<br>', $studentMentora);
                                @endphp
                               </td> -->
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p>Pas de tuteurs</p>
                @endif
                <!-- Display students for mentors -->
                @elseif(auth()->user()->user_type === 'mentor')
                @if (!$students->isEmpty())
                <div class="mb-4  custom-background">
                    <h3 class="mb-4">Mes Etudiants Tuteurés</h3>

                    <table class="custom-table mb-4"" style="width: 100%; padding: 10px;">
                        <thead >
                            <tr >
                                <th>NomPrenom</th>
                                <th>Email</th>
                                <th>Niveau</th>
                                <!-- <th>Centre d'intérêt</th> -->
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->niveau }}</td>
                                <!-- <td>
                                @php
                                $studentMentor = json_decode($student->interests);
                                echo implode(' ', $studentMentor);
                                @endphp
                                </td> -->
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p>Pas d'etudiants</p>
                @endif
                <!-- Display all users for admin -->
                @elseif(auth()->user()->user_type === 'admin')
                @if (!$students->isEmpty())
                <div class="mb-4  custom-background ">
                    <h3 >Etudiants</h3>
                    <table class="custom-table" style="width: 100%; padding: 10px;">
                        <thead>
                            <tr>
                                <th>NomPrenom</th>
                                <th>Email</th>
                                <th>Niveau</th>
                                <th>Centre d'intérêt</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td class="text-white"  style="background-color:#081b29">{{ $student->name }}</td>
                                <td class="text-white"  style="background-color:#081b29">{{ $student->email }}</td>
                                <td class="text-white"  style="background-color:#081b29">{{ $student->niveau }}</td>
                                <td class="text-white"  style="background-color:#081b29">
                                @php
                                        $studentInterest = json_decode($student->interests);
                                        if (is_array($studentInterest)) {
                                            echo implode('<br>', $studentInterest);
                                        } else {
                                            echo $studentInterest; // Handle case where $studentInterest is a string
                                        }
                                    @endphp
                                </td>

                                <td  class="text-white"  style="background-color:#081b29">
                                    <!-- Icones pour modifier et supprimer -->
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn" style="color:#0ef"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn " style="color:#ff0016" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p>No students found.</p>
                @endif

                @if (!$mentors->isEmpty())
                <div class="mb-4  custom-background">
                    <h3>Tuteurs</h3>
                    <table class="custom-table" style="width: 100%; padding: 10px;">
                        <thead>
                            <tr>
                                <th>NomPrenom</th>
                                <th>Email</th>
                                <th>Niveau</th>
                                <th> Domaine d'expertise</th>
                                <th>Expertise</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mentors as $mentor)
                            <tr>
                                <td class="text-white"  style="background-color:#081b29">{{ $mentor->name }}</td>
                                <td class="text-white"  style="background-color:#081b29">{{ $mentor->email }}</td>
                                <td class="text-white"  style="background-color:#081b29">{{ $mentor->niveau }}</td>
                              
                                <td class="text-white"  style="background-color:#081b29">
    @php
        $mentorExpertisesArray = json_decode($mentor->expertise);
        if(is_array($mentorExpertisesArray)) {
            echo implode('<br>', $mentorExpertisesArray);
        }
    @endphp
</td>

<td class="text-white"  style="background-color:#081b29">
    @php
        $subExpertisesArray = json_decode($mentor->sub_expertises, true);
        if(is_array($subExpertisesArray)) {
            echo implode('<br>', $subExpertisesArray);
        }
    @endphp
</td>



                                <td class="text-white"  style="background-color:#081b29">
                                    <!-- Icones pour modifier et supprimer -->
                                    <a href="{{ route('mentors.edit', $mentor->id) }}" class="btn " style="color:#0ef"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('mentors.destroy', $mentor->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn " style="color:#ff0016" onclick="return confirm('Est tu sure de vouloir supprimer cet utilisateur?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
            <div class="text-white"></div>    <p>No mentors found.</p>
                @endif
                @endif
            </div>

        </div>

        @endsection 

      
        @section('styles')
 

    <style>
.custom-table {
    background-color: #081b29 !important;
    color: white; /* Pour que le texte soit lisible sur un fond sombre */
}

.custom-table th,
.custom-table td {
    background-color: #081b29 !important;
    color: white;
    border: 1px solid #0ef; /* Pour une bordure visible */
}

     
    </style>
    @endsection