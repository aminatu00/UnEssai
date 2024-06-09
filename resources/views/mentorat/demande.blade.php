@extends('layouts.template')
@section('content')

    <div class="col-md-10 offset-md-0 text-white">
        <h2>Demande de Mentorat</h2>

        <form action="{{ route('mentor.request.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Nom et Prénom -->
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <!-- Numéro de téléphone -->
            <div class="form-group">
                <label for="phone">Numéro de téléphone :</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <!-- Domaine de Mentorat -->
            <div class="form-group">
        <label for="domain">Domaine de Mentorat :</label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="domain_informatique" name="domain[]" value="informatique">
                <label class="form-check-label" for="domain_informatique">Informatique</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="domain_reseaux" name="domain[]" value="reseaux">
                <label class="form-check-label" for="domain_reseaux">Réseaux</label>
            </div>
           
            <!-- Ajouter d'autres cases à cocher ici -->
        </div>
    </div>
    

            <!-- Niveau d'Étude -->
            <div class="form-group">
                <label for="current_level">Niveau d'Étude Actuel :</label>
                <select class="form-control" id="current_level" name="current_level" required>
                    <option value="licence_2">Licence 2</option>
                    <option value="licence_3">Licence 3</option>
                    <option value="master_1">Master 1</option>
                    <option value="master_2">Master 2</option>
                </select>
            </div>
            <!-- Lettre de Motivation -->
            <div class="form-group">
                <label for="motivation">Lettre de Motivation :</label>
                <textarea class="form-control" id="motivation" name="motivation" rows="5" required></textarea>
            </div>
            <!-- Téléverser les Documents -->
            <div class="form-group">
                <label for="documents">Téléverser les Documents :</label>
                <input type="file" class="form-control" id="documents" name="documents[]" multiple>
                <small class="form-text text-muted">Veuillez téléverser tout document pertinent, tel que vos notes ou tout autre matériel relatif au domaine de mentorat choisi.</small>
            </div>

            <!-- Bouton de Soumission -->
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
@endsection
