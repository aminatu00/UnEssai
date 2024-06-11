@extends('layouts.template')
@section('content')

<div class="container mt-5">
    <div class="col-md-10 offset-md-1 text-white" style="background-color: #081b29; border: 1px solid #0ef; padding: 20px; border-radius: 8px;">
        <h2 class="text-center mb-4">Demande pour être Tuteur</h2>

        <form action="{{ route('mentor.request.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Nom et Prénom -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="prenom" class="text-white">Prénom :</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="nom" class="text-white">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
            </div>
            <!-- Email -->
            <div class="form-group">
                <label for="email" class="text-white">Email :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <!-- Numéro de téléphone -->
            <div class="form-group">
                <label for="phone" class="text-white">Numéro de téléphone :</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <!-- Domaine de Mentorat -->
            <div class="form-group">
                <label for="domain" class="text-white">Domaine de Mentorat :</label>
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
                <label for="current_level" class="text-white">Niveau d'Étude Actuel :</label>
                <select class="form-control" id="current_level" name="current_level" required>
                    <option value="licence_2">Licence 2</option>
                    <option value="licence_3">Licence 3</option>
                    <option value="master_1">Master 1</option>
                    <option value="master_2">Master 2</option>
                </select>
            </div>
            <!-- Lettre de Motivation -->
            <div class="form-group">
                <label for="motivation" class="text-white">Lettre de Motivation :</label>
                <textarea class="form-control" id="motivation" name="motivation" rows="5" required></textarea>
            </div>
            <!-- Téléverser les Documents -->
            <div class="form-group">
                <label for="documents" class="text-white">Téléverser les Documents :</label>
                <input type="file" class="form-control-file" id="documents" name="documents[]" multiple>
                <small class="form-text text-muted">Veuillez téléverser tout document pertinent, tel que vos notes ou tout autre matériel relatif au domaine de mentorat choisi.</small>
            </div>

            <!-- Bouton de Soumission -->
            <div class="text-right">
                <button type="submit" class="btn btn-gradient">Soumettre</button>
            </div>
        </form>
    </div>
</div>
@endsection

<style>
    .card {
        background-color: #081b29;
        border: 1px solid #0ef;
    }

    .card-header {
        background: linear-gradient(180deg, #0ef, #081b29);
    }

    .card-title, .text-white {
        color: #fff;
    }

    label {
        font-weight: bold;
        color: #fff;
    }

    .form-control, .form-control-file {
        background-color: #495057;
        color: #fff;
        border: 1px solid #6c757d;
    }

    .form-control:focus {
        background-color: #495057;
        color: #fff;
    }

    .btn-gradient {
        background: linear-gradient(180deg, #0ef, #081b29);
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
    }

    .btn-gradient:hover {
        background: linear-gradient(180deg, #081b29, #0ef);
    }
</style>
