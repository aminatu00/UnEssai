@extends('layouts.Accueil')

@section('content')
<section id="discussions" class="discussions section" >

    <div class="container">
    <div class="col-auto"> <!-- Utilisez une colonne de taille automatique pour contenir le bouton -->
        <a href="javascript:history.back()" class="btn btn-outline-primary d-none d-md-inline-flex align-items-center">
            <i class="bi bi-arrow-left me-2"></i> <!-- Utilisation de l'icône Bootstrap Icons -->
            <!-- Pour Font Awesome, utilisez : <i class="fas fa-arrow-left me-2"></i> -->
        </a>
    </div>
    
        <div class="col-md-8 offset-md-2 " > 
   
        

                <div class="card mb-4 " style="background-color:#081b29; border: 1px solid #0ef;">
                    <div class="card-body">
                        <h2 class="card-title font-weight-bold text-white" style="font-size: 1.5rem;">{{ $question->title }}</h2>
                        <p class="card-text text-white" style="font-size: 1.2rem;">{{ $question->content }}</p>

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
                                <!-- Afficher un document PDF -->
                                <div class="card border-danger mb-3" style="max-width: 300px;">
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
                    </div>
                </div>

                <div class="card" style="background-color:#081b29">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold text-white">Réponses</h3>
                    </div>
                    <div class="card-body">
                        <!-- Dans votre section 'content' -->

                        @if($question->answers->isNotEmpty())
                            @foreach($question->answers as $answer)
                                <div class="card mb-3" style="background-color: #081b29; border: 1px solid #0ef; border-radius: 10px;">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3 text-white">
                                            <div class="avatar rounded-circle mr-3" style="width: 50px; height: 50px; display: flex; justify-content: center; align-items: center; background-image: linear-gradient(180deg, #081b29, #0ef);">
                                                <span class="text-white font-weight-bold" style="line-height: 1;">{{ strtoupper(substr($answer->user->name, 0, 1)) }}</span>
                                            </div>

                                            <div class="answer-content" id="answerContent_{{ $answer->id }}">
                                                <p class="card-text text-white offset-md-1 mt-n3">{{ $answer->content }}</p>
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <form action="{{ route('answers.like', $answer) }}" method="POST" class="mr-3">
                                                        @csrf
                                                        <button type="submit" class="btn btn-like">
                                                            <i class="fas fa-thumbs-up text-white"></i>
                                                            <span class="ml-1 text-white">{{ $answer->likes }}</span>
                                                        </button>
                                                    </form>

                                                    @if(auth()->user() && $answer->user_id === auth()->user()->id)
                                                        <div class="btn-actions d-flex align-items-center">
                                                            <button class="btn btn-link btn-edit" onclick="editAnswer('{{ $answer->id }}')">
                                                                <i class="fas fa-edit " style="color:#0ef"></i>
                                                            </button>
                                                            <form action="{{ route('answers.destroy', $answer) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-link btn-delete">
                                                                    <i class="fas fa-trash-alt text-danger"></i>
                                                                </button>
                                                            </form>
                                                            <!-- Affichage de l'icône de signalement -->
                                                            <form action="{{ route('answers.report', $question->id) }}" method="POST" onsubmit="return confirmReport()">
                                                                @csrf
                                                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                                                <!-- Bouton de signalement -->
                                                                <button type="submit" class="btn btn-link btn-report">
                                                                    <i class="fas fa-exclamation-triangle text-warning"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-white">
                                <p>Aucune réponse disponible pour cette question.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Ajoutez ici votre contenu pour la colonne latérale -->
            </div>
        </div>
    </div>

    <script>
        function editAnswer(answerId) {
            // Masquer le contenu de la réponse
            document.getElementById('answerContent_' + answerId).style.display = 'none';
            // Afficher le formulaire de modification correspondant
            document.getElementById('editForm_' + answerId).style.display = 'block';
        }

        function confirmDelete() {
            return confirm('Êtes-vous sûr de vouloir supprimer cette réponse?');
        }

        // JavaScript pour afficher une confirmation avant de signaler
        function confirmReport() {
            return confirm('Trouvez-vous le contenu inapproprié ? Êtes-vous sûr de vouloir signaler cette réponse?');
        }

        // Attendre 3 secondes avant de masquer les messages automatiquement
        setTimeout(function() {
            document.querySelectorAll('.auto-dismiss').forEach(function(element) {
                element.style.display = 'none';
            });
        }, 3000);
    </script>
@endsection

@section('styles')
    <!-- Lien vers les icônes Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .btn-link {
            background: none;
            border: none;
            padding: 0;
        }

        .btn-link:hover {
            text-decoration: none;
        }

        .ml-1 {
            margin-left: 0.25rem;
        }
        .btn-accept {
            color: #0ef;
        }
        .text-yellow {
        color: gold;
    }
    </style>
@endsection
