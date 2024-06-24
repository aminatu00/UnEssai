<!-- resources/views/admin/indexMentorRequests.blade.php -->

@extends('layouts.template')

@section('content')
<div class="col-md-10 offset-md-0 text-white">
    <h2>Liste des Demandes pour etre Tuteur</h2>

    <table class="table ">
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
                <td class="text-white" style="background-color:#081b29">
    @php
    $domain = json_decode($request->domain);
    if (json_last_error() === JSON_ERROR_NONE && is_array($domain)) {
        echo implode('<br>', $domain);
    } else {
        echo $request->domain; // Afficher la valeur brute si ce n'est pas un tableau JSON
    }
    @endphp
</td>
                <td class="text-white" style="background-color:#081b29">

                    <a href="{{ route('mentor.request.show', $request->id) }}" class="btn " style="color:#0ef"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
