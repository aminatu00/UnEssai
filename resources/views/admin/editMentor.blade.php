@extends('layouts.template')
@section('content')


<<div class="container-fluid">

    <h1 class="h3 mb-4 text-white">Modifier Tuteur</h1><div class="card" >
        <div class="card-body" style="background-color:#081b29">

            <form method="POST" action="{{ route('mentors.update', $mentor->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group text-white">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control text-white"" style="background-color:#081b29" value="{{ old('name', $mentor->name) }}" required>
                </div>
                <div class="form-group text-white">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control text-white"" style="background-color:#081b29" value="{{ old('email', $mentor->email) }}" required>
                </div>
                <div class="form-group text-white">
                    <label for="niveau">Niveau</label>
                    <input type="text" name="niveau" id="niveau" class="form-control text-white"" style="background-color:#081b29" value="{{ old('niveau', $mentor->niveau) }}" required>
                </div>
                <div class="form-group text-white">
                    <label for="expertise">Expertise</label>
                    <select name="expertise[]" id="expertise" class="form-control text-white" style="background-color:#081b29" multiple required>
                        <option value="informatique" @if(in_array('informatique', json_decode($mentor->expertise))) selected @endif>Informatique</option>
                        <option value="reseaux" @if(in_array('reseaux', json_decode($mentor->expertise))) selected @endif>Réseaux</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="form-group text-white"">
                    <label for="sub_expertises">Sous-expertise</label>
                    <select name="sub_expertises[]" id="sub_expertises" class="form-control text-white" style="background-color:#081b29;background-image:#081b29" multiple required>
                        <option value="java" @if(in_array('java', json_decode($mentor->sub_expertises))) selected @endif>Java</option>
                        <option value="php" @if(in_array('php', json_decode($mentor->sub_expertises))) selected @endif>PHP</option>
                        <option value="reseaux sans fil" @if(in_array('reseaux sans fil', json_decode($mentor->sub_expertises))) selected @endif>Réseaux sans fil</option>
                        <option value="reseaux avec fil" @if(in_array('reseaux avec fil', json_decode($mentor->sub_expertises))) selected @endif>Réseaux avec fil</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <button type="submit" class="btn  text-white" style="background-image:linear-gradient(180deg,#081b29,#0ef);width:50%;border-radius:40px">Mettre à jour  Mentor</button>
            </form>
        </div>
    </div>
</div>
@endsection
