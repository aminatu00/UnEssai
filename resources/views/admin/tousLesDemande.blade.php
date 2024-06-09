<!-- resources/views/admin/indexMentorRequests.blade.php -->

@extends('layouts.template')

@section('content')
<div class="col-md-10 offset-md-0 text-white">
    <h2>Liste des Demandes de Mentorat</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Domaine</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mentorRequests as $request)
            <tr>
                <td>{{ $request->prenom }}</td>
                <td>{{ $request->nom }}</td>
                <td>{{ $request->email }}</td>
                <td>{{ $request->domain }}</td>
                <td>
                    <a href="{{ route('mentor.request.show', $request->id) }}" class="btn btn-primary">Voir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
