<!-- resources/views/admin/indexMentorRequests.blade.php -->

@extends('layouts.template')

@section('content')
<div class="col-md-10 offset-md-0 text-white">
    <h2>Liste des Demandes de Mentorat</h2>

    <table class="table">
        <thead>
            <tr>
                <th class="text-white" style="background-color:#081b29">Prénom</th>
                <th class="text-white" style="background-color:#081b29">Nom</th>
                <th class="text-white" style="background-color:#081b29">Email</th>
                <th class="text-white" style="background-color:#081b29" >Domaine</th>
                <th class="text-white" style="background-color:#081b29">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mentorRequests as $request)
            <tr>
                <td class="text-white" style="background-color:#081b29">{{ $request->prenom }}</td>
                <td class="text-white" style="background-color:#081b29">{{ $request->nom }}</td>
                <td class="text-white" style="background-color:#081b29">{{ $request->email }}</td>
                <td class="text-white" style="background-color:#081b29">{{ $request->domain }}</td>
                <td class="text-white" style="background-color:#081b29">
                    <a href="{{ route('mentor.request.show', $request->id) }}" class="btn btn-primary">Voir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
