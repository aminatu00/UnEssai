@extends('layouts.template')
@section('content')


<div class="col-md-6 text-white">
    <div class="row">
        <form method="POST" action="{{ route('register.student') }}">
            @csrf
            <div class="form-group text-white">
                <label for="name">Nom</label>
                <input type="text" class="form-control text-white" style="background-color:#081b29;" id="name" name="name" required>
            </div>
            <div class="form-group text-white">
                <label for="email">Email</label>
                <input type="email" class="form-control text-white" style="background-color:#081b29;" id="email" name="email" required>
            </div>
            <div class="form-group text-white">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control text-white" style="background-color:#081b29;" id="password" name="password" required>
            </div>
            <div class="form-group text-white">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" class="form-control text-white" style="background-color:#081b29;" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-group text-white">
                <label for="niveau">Niveau</label>
                <select class="form-control text-white" style="background-color:#081b29;" id="niveau" name="niveau" required>
                    <option value="licence 1">Licence 1</option>
                    <option value="licence 2">Licence 2</option>
                    <option value="licence 3">Licence 3</option>
                    <option value="master 1">Master 1</option>
                    <option value="master 2">Master 2</option>
                </select>
            </div>
            <div class="form-group">
    <label for="interests">Centre d'Intérêts</label>
    <div>
        <div class="form-check">
            <input class="form-check-input text-white" style="background-color:#081b29;" type="checkbox" value="informatique" id="interests_informatique" name="interests[]">
            <label class="form-check-label text-white" style="background-color:#081b29;" for="interests_informatique">Informatique</label>
        </div>
        <div class="form-check">
            <input class="form-check-input text-white" style="background-color:#081b29;" type="checkbox" value="reseaux" id="interests_reseaux" name="interests[]">
            <label class="form-check-label text-white" style="background-color:#081b29;" for="interests_reseaux">Réseaux</label>
        </div>
        <!-- Ajoutez d'autres cases à cocher si nécessaire -->
    </div>
</div>

            <button type="submit" class="btn  text-white"  style="background-image:linear-gradient(180deg, #081b29, #0ef) ;border-radius:40px;width:50%">S'inscrire</button>
        </form>
    </div>
</div>
@endsection
