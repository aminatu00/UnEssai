@extends('layouts.template')
@section('content')

<div class="col-md-6 text-white">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row">
        <form method="POST" action="{{ route('register.mentor') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <label for="niveau">Niveau</label>
                <select class="form-control" id="niveau" name="niveau" required>
                 
                    <option value="licence 2">Licence 2</option>
                    <option value="licence 3">Licence 3</option>
                    <option value="master 1">Master 1</option>
                    <option value="master 2">Master 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="expertise">Domaines</label>
                <select class="form-control" id="expertise" name="expertise[]" multiple required>
                    @foreach($domains as $domain => $subExpertises)
                        <option value="{{ $domain }}">{{ ucfirst($domain) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="sub_expertises">Modules</label>
                <div id="sub_expertises-container"></div>
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('niveau').addEventListener('change', function() {
        updateModules();
    });

    document.getElementById('expertise').addEventListener('change', function() {
        updateModules();
    });

    function updateModules() {
        console.log("Update Modules Function Called"); // Vérifions si la fonction est appelée

        let selectedNiveau = document.getElementById('niveau').value;
        let selectedDomaines = Array.from(document.getElementById('expertise').selectedOptions).map(option => option.value);
        console.log("Selected Niveau:", selectedNiveau); // Vérifions le niveau sélectionné
        console.log("Selected Domaines:", selectedDomaines); // Vérifions les domaines sélectionnés

        let container = document.getElementById('sub_expertises-container');
        container.innerHTML = '';

        const modules = <?php echo json_encode($sub_expertises); ?>;
        console.log("Modules:", modules); // Vérifions les modules disponibles

        selectedDomaines.forEach(domaine => {
            console.log("Domaine:", domaine); // Vérifions chaque domaine sélectionné
            if (modules[selectedNiveau] && modules[selectedNiveau][domaine]) {
                console.log("Modules Found for Domaine", domaine); // Vérifions si des modules sont disponibles pour ce domaine
                let domainDiv = document.createElement('div');
                domainDiv.className = 'form-group';
                domainDiv.innerHTML = `<label>${domaine.charAt(0).toUpperCase() + domaine.slice(1)}</label>`;
                modules[selectedNiveau][domaine].forEach(module => {
    console.log("Module:", module); // Vérifions chaque module disponible
    domainDiv.innerHTML += `
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="sub_expertises[]" value="${module}" id="module_${module}">
            <label class="form-check-label" for="module_${module}">${module}</label>
        </div>`;
});

                container.appendChild(domainDiv);
            }
        });
    }

    // Appel initial pour afficher les modules basés sur les valeurs initiales
    updateModules();
</script>


@endsection
