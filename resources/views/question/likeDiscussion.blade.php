@extends('layouts.template')

@section('content')

<div class="col-md-8" >
    <div class="text-white"><h1>Votre questions question</h1></div>  

    <div class="card mb-3 " style="background-color: #081b29; border: 1px solid #0ef;">
        <div class="card-body">
            @if ($question->media_path)
                @php
                    $extension = pathinfo($question->media_path, PATHINFO_EXTENSION);
                @endphp

                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                    <!-- Afficher une image -->
                    <img src="{{ Storage::url(str_replace('public/', '', $question->media_path)) }}" class="img-fluid mb-2 preview-image" alt="Image de la question" style="max-height: 200px; cursor: pointer;">
                @elseif ($extension === 'mp4')
                    <!-- Afficher une vidéo -->
                    <video controls style="max-width: 100%; max-height: 500px;">
                        <source src="{{ Storage::url(str_replace('public/', '', $question->media_path)) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @elseif ($extension === 'pdf')
                    <div class="card" style="max-width: 300px;">
                        <div class="card border-danger mb-3" >
                            <div class="card-body text-danger">
                                <!-- Utilisation d'une icône pour représenter le document PDF -->
                                <i class="far fa-file-pdf fa-3x"></i>
                                <p class="card-text">Document PDF</p>
                            </div>
                            <div class="card-footer text-center">
                                <!-- Lien pour voir le document PDF -->
                                <a href="{{ Storage::url(str_replace('public/', '', $question->media_path)) }}" class="btn btn-danger" target="_blank">Voir le document PDF</a>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Si le type de média n'est ni une image ni une vidéo ni un PDF -->
                    <p>Le type de média n'est pas pris en charge.</p>
                @endif
            @endif

            <div class="text-white text-sm mb-2">{{ $question->created_at->format('d/m/Y H:i') }}</div>
            <h2 class="card-title h5 text-white">{{ $question->title }}</h2>
            <p class="card-text text-white">{{ $question->content }}</p>
           
        </div>
    </div>
</div>

<style>
    .sidebar-container {
        padding-right: 0;
    }

    .search-input {
        margin-right: 0;
    }

    .search-button {
        margin-left: -1px; /* Supprimer l'espace entre le champ de recherche et le bouton */
    }
</style>

@endsection
