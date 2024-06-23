@extends('layouts.template')
@section('content')


    <div class="col-md-8 offset-md-2 text-white">
    <div class="card" style="background-color: #081b29; border: 1px solid #0ef; color:#fff">
                <div class="card-header text-center">Profil Utilisateur</div>

                <div class="card-body" style="background-color:#081b29">
                    <!-- Afficher les messages d'erreur -->
                    @if ($errors->any())
                        <div class="alert alert-danger auto-dismiss">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Afficher les messages de succès -->
                    @if (session('success'))
                        <div class="alert alert-success auto-dismiss">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Cercle avec le commencement du nom de l'utilisateur ou photo de profil -->
                    <div class="text-center mb-4">
                        @if (Auth::user()->profile_image)
                            <!-- Afficher la photo de profil -->
                            <img class="img-profile rounded-circle" src="{{ asset('storage/' . Auth::user()->profile_image) }}" width="150" height="150">
                        @else
                            <!-- Afficher le cercle avec le commencement du nom de l'utilisateur -->
                            <div class="circle mx-auto" style="background-image:linear-gradient(180deg , #081b29, #0ef)">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        @endif
                    </div>

                    <div class="text-center text-white" >
                        <h3>{{ Auth::user()->name }}</h3>
                        <p>{{ Auth::user()->email }}</p>
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group text-white">
                            <label for="name">Nom :</label>
                            <input type="text" name="name" class="form-control text-white" style="background-color:#081b29;" value="{{ Auth::user()->name }}">
                        </div>

                        <div class="form-group text-white">
                            <label for="password">Mot de passe :</label>
                            <input type="password" name="password" class="form-control text-white" style="background-color:#081b29;">
                        </div>

                        <div class="form-group text-white">
                            <label for="profile_image">Photo de profil :</label>
                            <input type="file" name="profile_image" class="form-control-file text-white"style="background-color:#081b29;">
                        </div>

                        @if(Auth::user()->user_type == 'student')
                        <div class="form-group text-white">
                            <label for="niveau">Niveau :</label>
                            <select name="niveau" class="form-control text-white"style="background-color:#081b29;">
                                <option value="licence1" {{ Auth::user()->niveau == 'licence1' ? 'selected' : '' }}>Licence 1</option>
                                <option value="licence2" {{ Auth::user()->niveau == 'licence2' ? 'selected' : '' }}>Licence 2</option>
                                <option value="licence3" {{ Auth::user()->niveau == 'licence3' ? 'selected' : '' }}>Licence 3</option>
                                <option value="master1" {{ Auth::user()->niveau == 'master1' ? 'selected' : '' }}>Master 1</option>
                                <option value="master2" {{ Auth::user()->niveau == 'master2' ? 'selected' : '' }}>Master 2</option>
                            </select>
                        </div>

                        <div class="form-group text-white">
                            <label for="interests">Centres d'intérêt :</label><br>
                            @foreach (['informatique', 'reseaux'] as $interest)
                                <div class="form-check form-check-inline custom-checkbox text-white">
                                    <input class="form-check-input text-white" type="checkbox" name="interests[]" value="{{ $interest }}" {{ in_array($interest, json_decode(Auth::user()->interests)) ? 'checked' : '' }} >
                                    <label class="form-check-label " style="color: #fff;">{{ $interest }}</label>
                                </div>
                            @endforeach
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary btn-block" style="background-color:#081b29; background-image:linear-gradient(180deg, #081b29, #0ef); border-radius:10px">Enregistrer les modifications</button>
                    </form>
                </div>
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
}

.custom-checkbox .form-check-input:checked {
    background-color: #0ef; /* Couleur de fond quand la case est cochée */
}

.custom-checkbox .form-check-label {
    color: #000; /* Couleur du texte du label */
    margin-left: 8px; /* Espace entre la case à cocher et le label */
}


    .circle {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: #007bff; /* Couleur de fond du cercle */
        color: #fff; /* Couleur du texte à l'intérieur du cercle */
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 48px; /* Taille du texte */
        margin: 0 auto; /* Centrer le cercle */
    }
    .img-profile {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }
    .auto-dismiss {
        transition: opacity 0.5s ease-out;
        opacity: 1;
    }
</style>

<script>
    // Script pour faire disparaître automatiquement les messages d'alerte après 5 secondes
    setTimeout(function() {
        document.querySelectorAll('.auto-dismiss').forEach(function(element) {
            element.style.opacity = '0';
            setTimeout(function() {
                element.remove();
            }, 500);
        });
    }, 5000);
</script>
