@extends('layouts.template')
@section('content')



        <div class="col-md-8">
          <div class="text-white"><h1>Liste des questions</h1></div>  
            <form action="{{ route('questions.search') }}" method="GET" class="mb-3">
                <div class="input-group" style="background-color:#081b29">
                    <input type="text" name="query" class="form-control search-input text-white" placeholder="Rechercher une question">
                    <button type="submit" class="btn btn-primary search-button text-white" style="background-color:#081b29;background-image:linear-gradient(180deg, #081b29, #0ef);">Rechercher</button>
                </div>
            </form>
            @if (!isset($question))
              <div class="text-white"><p>Aucune question n'a été trouvée.</p></div>  
            @else
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($questions->reverse() as $question)
                            <div class="card mb-3">
                                <div class="card-body">
                                @if ($question->media_path)
                            @php
                            $extension = pathinfo($question->media_path, PATHINFO_EXTENSION);
                            @endphp

                            @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <!-- Afficher une image -->
                            <img src="{{ Storage::url(str_replace('public/', '', $question->media_path)) }}" class="img-fluid mb-2 preview-image" alt="Image de la question" style="max-height: 80px; cursor: pointer;">
                            @elseif ($extension === 'mp4')
                            <!-- Afficher une vidéo -->
                            <video controls style="max-width: 100%; max-height: 300px;">
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
                                @else
                                <!-- Si le type de média n'est ni une image ni une vidéo ni un PDF -->
                                <p>Le type de média n'est pas pris en charge.</p>
                                @endif
                                @endif
                                    <div class="text-white text-sm mb-2">{{ $question->created_at->format('d/m/Y H:i') }}</div>
                                    <a href="{{ route('answers.show', $question) }}">
    <h2 class="card-title h5 text-white">{{ $question->title }}</h2>
</a>

                                    <p class="card-text text-white">{{ $question->content }}</p>
                                    <form action="{{ route('answers.store', $question) }}" method="post" data-url="{{ route('answers.store', $question) }}">
                                        @csrf
                                        <div class="form-group">
                                            <textarea name="content" class="form-control text-white" rows="3" placeholder="Votre réponse"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Répondre</button>
                                        <a href="{{ route('answers.show', $question) }}" class="btn btn-secondary">Voir Réponse</a>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
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
