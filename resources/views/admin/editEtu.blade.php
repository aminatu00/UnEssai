@extends('layouts.template')
@section('content')

<div class="container-fluid">
<<<<<<< HEAD
    <h1 class="h3 mb-4 text-white">Edit Student</h1>
=======
    <h1 class="h3 mb-4 text-gray-800">Modifier Etudiant</h1>
>>>>>>> origin/amina
    <div class="card">
        <div class="card-body" style="background-color:#081b29;" > 
            <form method="POST" action="{{ route('students.update', $student->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group text-white">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control text-white" style="background-color:#081b29;" value="{{ old('name', $student->name) }}" required>
                </div>
                <div class="form-group text-white">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control text-white"  style="background-color:#081b29;"value="{{ old('email', $student->email) }}" required>
                </div>
                <div class="form-group text-white"">
                    <label for="niveau">Niveau</label>
                    <input type="text" name="niveau" id="niveau" class="form-control text-white"  style="background-color:#081b29;"value="{{ old('niveau', $student->niveau) }}" required>
                </div>
                <div class="form-group text-white"">
                    <label for="interests">Centre d'intérêt</label>
                    <select name="interests[]" id="interests" class="form-control text-white" style="background-color:#081b29;" multiple required>
                        <option value="informatique" @if(in_array('informatique', json_decode($student->interests))) selected @endif>Informatique</option>
                        <option value="reseaux" @if(in_array('reseaux', json_decode($student->interests))) selected @endif>Réseaux</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
<<<<<<< HEAD
                <button type="submit" class="btn text-white" style="background-image:linear-gradient(180deg, #081b29, #0ef); width:50%; border-radius:40px">Update Student</button>
=======
                <button type="submit" class="btn btn-primary">Mettre a jour Etudiant</button>
>>>>>>> origin/amina
            </form>
        </div>
    </div>
</div>
@endsection
