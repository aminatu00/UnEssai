@extends('layouts.template')
@section('content')

<div class="container mt-5">
<div class="col-md-8 offset-md-2 text-white"
style="background-color: #081b29; border: 1px solid #0ef; padding: 20px; border-radius: 8px;">
        <h2 class="text-center mb-4">Demande pour être Tuteur</h2>

        <form action="{{ route('mentor.request.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Nom et Prénom -->
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-control  text-white"  style="background-color:#081b29"  id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control  text-white"  style="background-color:#081b29"  id="nom" name="nom" required>
            </div>
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control  text-white"  style="background-color:#081b29"  id="email" name="email" required>
            </div>
            <!-- Numéro de téléphone -->
            <div class="form-group">
                <label for="phone">Numéro de téléphone :</label>
                <input type="text" class="form-control  text-white"  style="background-color:#081b29"  id="phone" name="phone" required>
            </div>
            <!-- Domaine de Mentorat -->
            <div class="form-group">
        <label for="domain">Domaine de Mentorat :</label>
        <div>
            <div class="form-check">
                <input class="form-check-input  text-white"  style="background-color:#081b29"  type="checkbox" id="domain_informatique" name="domain[]" value="informatique">
                <label class="form-check-label  text-white"  style="background-color:#081b29"  for="domain_informatique">Informatique</label>
            </div>
            <div class="form-check">
                <input class="form-check-input  text-white"  style="background-color:#081b29"  type="checkbox" id="domain_reseaux" name="domain[]" value="reseaux">
                <label class="form-check-label  text-white"  style="background-color:#081b29"  for="domain_reseaux">Réseaux</label>
            </div>
           
            <!-- Ajouter d'autres cases à cocher ici -->
        </div>
    </div>
    

            <!-- Niveau d'Étude -->
            <div class="form-group">
                <label for="current_level">Niveau d'Étude Actuel :</label>
                <select class="form-control text-white"  style="background-color:#081b29" id="current_level" name="current_level" required>
                    <option value="licence_2">Licence 2</option>
                    <option value="licence_3">Licence 3</option>
                    <option value="master_1">Master 1</option>
                    <option value="master_2">Master 2</option>
                </select>
            </div>
            <!-- Lettre de Motivation -->
            <div class="form-group  text-white"  style="background-color:#081b29" >
                <label for="motivation">Lettre de Motivation :</label>
                <textarea class="form-control  text-white"  style="background-color:#081b29"  id="motivation" name="motivation" rows="5" required></textarea>
            </div>
            <!-- Téléverser les Documents -->
            <div class="form-group  text-white"  style="background-color:#081b29" >
                <label for="documents">Téléverser les Documents :</label>
                <input type="file" class="form-control text-white"  style="background-color:#081b29"  id="documents" name="documents[]" multiple>
                <small class="form-text text-white">Veuillez téléverser tout document pertinent, tel que vos notes ou tout autre matériel relatif au domaine de mentorat choisi.</small>
            </div>

            <!-- Bouton de Soumission -->
            <button type="submit" class="btn " style="background-image:linear-gradient(180deg,#081b29,#0ef);width:50%;border-radius:40px;">Soumettre</button>
        </form>
    </div>
</div>
@endsection

<style>
      .custom-checkbox .form-check-input {
    width: 20px;
    height: 20px;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-color: #fff; /* Couleur de fond de base */
    border: 1px solid #ccc; /* Bordure */
    border-radius: 3px; /* Coins arrondis */
    outline: none; /* Supprimer la bordure bleue lors du focus */
    cursor: pointer; /* Curseur de la souris */
    margin-left: 8px;
}

.custom-checkbox .form-check-input:checked {
    background-color: #0ef; /* Couleur de fond quand la case est cochée */
    
    
}

.custom-checkbox .form-check-label {
    color: #ffff; /* Couleur du texte du label */
    margin-left: 68px; /* Espace entre la case à cocher et le label */
}

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

    /* .btn-gradient {
        background: linear-gradient(180deg, #0ef, #081b29);
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
    }

    .btn-gradient:hover {
        background: linear-gradient(180deg, #081b29, #0ef);
    } */
</style>
