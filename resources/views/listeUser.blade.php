@extends('layouts.template')
@section('content')

<div class="container-fluid">


    <h1 class="h3 mb-4 text-white">Tableau de Bord </h1>


    <div class="col-md-14">
        <div class="card" style="background-color: #081b29;">
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

            <div class="card-header text-white"style="background-color: #081b29; border: 1px solid #0ef;">{{ __('La liste des utilisateurs ') }}</div>
            <div class="card-body text-white" style="background-color: #081b29; border: 1px solid #0ef;">


                <!-- Display mentors for students -->
                @if(auth()->user()->user_type === 'student')
                @if (!$mentors->isEmpty())
                <div class="mb-4 text-white" >
                  <div class="text-white"><h3>Les Tuteurs</h3></div>  
                    <table class="table">
                        <thead>
                            <tr>
                               <th class="text-white"  style="background-color:#081b29">Name</th>
                                <th class="text-white"  style="background-color:#081b29">Email</th>
                                <th class="text-white"  style="background-color:#081b29">Niveau</th>
                               
                
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mentors as $mentor)
                            <tr>
                            <td  class="text-white"  style="background-color:#081b29; color:#0ef"><a href="{{ route('mentors.show', $mentor->id) }}" style="color: #0ef; text-decoration: none;">{{ $mentor->name }}</a></td>
                                <td  class="text-white"  style="background-color:#081b29">{{ $mentor->email }}</td>
                                <td  class="text-white"  style="background-color:#081b29">{{ $mentor->niveau }}</td>
                               
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else

               
               <div class="text-white" style="background-color:#081b29;padding:30px;" width="100%">  <p>Pas de tuteurs</p></div> 
           @endif
                <!-- Display students for mentors -->
                @elseif(auth()->user()->user_type === 'mentor')
                @if (!$students->isEmpty())

                <div class="mb-4">
                <div class="text-white " style="padding:10px;"><h3>Mes Etudiants Tuteurés</h3></div>  
                    <table class="table">
                        <thead>
                            <tr>
                                <th  class="text-white"  style="background-color:#081b29">Name</th>
                                <th  class="text-white"  style="background-color:#081b29">Email</th>
                                <th  class="text-white"  style="background-color:#081b29">Niveau</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td  class="text-white"  style="background-color:#081b29">{{ $student->name }}</td>
                                <td  class="text-white"  style="background-color:#081b29">{{ $student->email }}</td>
                                <td  class="text-white"  style="background-color:#081b29">{{ $student->niveau }}</td>
                                
             <!-- </td> -->

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

                <div class="mb-4">
               <div class="text-white"> <h3>Etudiants:</h3></div>     
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-white"  style="background-color:#081b29">Name</th>
                                <th class="text-white"  style="background-color:#081b29">Email</th>
                                <th class="text-white"  style="background-color:#081b29">Niveau</th>
                                <th class="text-white"  style="background-color:#081b29">Centre d'intérêt</th>
                                <th class="text-white"  style="background-color:#081b29">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td class="text-white"  style="background-color:#081b29">{{ $student->name }}</td>
                                <td class="text-white"  style="background-color:#081b29">{{ $student->email }}</td>
                                <td class="text-white"  style="background-color:#081b29">{{ $student->niveau }}</td>
                                <td class="text-white" style="background-color:#081b29">
                                @php
        $studentInterest = json_decode($student->interests);
        if ($studentInterest && is_array($studentInterest)) {
            echo implode('<br>', $studentInterest);
        }
    @endphp
</td>

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

                <div class="mb-4">
                 <div class="text-white">  <h3>Tuteurs:</h3></div>  
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-white"  style="background-color:#081b29">Name</th>
                                <th class="text-white"  style="background-color:#081b29">Email</th>
                                <th class="text-white"  style="background-color:#081b29">Niveau</th>
                                <th class="text-white"  style="background-color:#081b29"> Domaine</th>
                                <th class="text-white"  style="background-color:#081b29">Expertise</th>
                                <th class="text-white"  style="background-color:#081b29">Action</th>
  
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