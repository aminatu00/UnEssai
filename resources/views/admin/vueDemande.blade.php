<!-- resources/views/admin/vueDemande.blade.php -->

@extends('layouts.template')
@section('content')
<div class="col-md-10 offset-md-0 text-white">
    <h2>Demande de Mentorat</h2>

    <div class="form-group">
        <label for="first_name">Prénom :</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $mentorRequest->prenom }}" readonly>
    </div>

    <div class="form-group">
        <label for="last_name">Nom :</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $mentorRequest->nom }}" readonly>
    </div>

    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $mentorRequest->email }}" readonly>
    </div>

    <div class="form-group">
        <label for="phone">Numéro de téléphone :</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $mentorRequest->phone }}" readonly>
    </div>

    <div class="form-group">
        <label for="domain">Domaine de Mentorat :</label>
        <ul>
            @foreach($domains as $domain)
                <li>{{ ucfirst($domain) }}</li>
            @endforeach
        </ul>
    </div>

    <div class="form-group">
        <label for="current_level">Niveau d'Étude Actuel :</label>
        <input type="text" class="form-control" id="current_level" name="current_level" value="{{ $mentorRequest->current_level }}" readonly>
    </div>

    <div class="form-group">
        <label for="motivation">Lettre de Motivation :</label>
        <textarea class="form-control" id="motivation" name="motivation" rows="5" readonly>{{ $mentorRequest->motivation }}</textarea>
    </div>

    <div class="form-group text-white">
        <label for="documents">Documents Téléversés :</label>
        <div class="row">
            @if (!empty($documents))
                @foreach ($documents as $document)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body text-danger">
                                <!-- Utilisation d'une icône pour représenter le document -->
                                <i class="far fa-file-pdf fa-3x"></i>
                                <p class="card-text">Document PDF</p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ Storage::url($document) }}" class="btn btn-danger" target="_blank">Voir le document</a>
                            </div>
                        </div>

                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        Aucun document téléversé.
                    </div>
                </div>
            @endif
        </div>
    </div>

    <a href="{{ route('mentor.requests.index') }}" class="btn btn-secondary">Retour</a>

    <form action="{{ route('mentor.validate', $mentorRequest->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">Valider</button>
</form>

</div>
@endsection
