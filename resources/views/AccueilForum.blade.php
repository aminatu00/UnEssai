@extends('layouts.Accueil')
@section('content')
<section id="discussions" class="discussions section">


<div class="col-md-8 offset-md-2"> <!-- Utilisez toute la largeur disponible -->

<!--    
    <div style="font-family: Arial, sans-serif; color: #ffffff; font-weight: bold;">
        <h1>Liste des questions</h1>
    </div> -->

    <form action="{{ route('questions.search') }}" method="GET" class="mb-3">
        <input type="hidden" name="category_id" value="{{ isset($category) ? $category->id : null }}">
        <div class="input-group">
            <input type="text" name="query" class="form-control custom-placeholder" placeholder="Rechercher une question">
            <button type="submit" class="btn " style="background-image:linear-gradient(180deg, #081b29, #0ef);box-shadow: 0 0 1px #0ef;">Rechercher</button>
        </div>
    </form>

    @if (isset($questions) && $questions->isEmpty())
    <div class="text-white">
        <p>Aucune question n'a été trouvée.</p>
    </div>
    @else
    <div class="row" style="background-image:linear-gradient(180deg, #081b29, #081b29);">
        <div class="col-md-12">
            @foreach ($questions as $question)
            <div class="card mb-3 question-card" style="background-image:linear-gradient(180deg, #081b29, #081b29);">
                <div class="card-body" style="border: 1px solid #0ef; border-radius:10px">
                    <div class="d-flex justify-content-between">
                        <div>
                        <div class="text-white text-sm mb-2 ">
                                    Publié par {{ $question->user->name }} il y a {{ $question->created_at->diffForHumans() }}
                                    @if ($question->user->user_type === 'mentor')
    <span class="badge badge-warning"><i class="fas fa-check-circle fa-lg "></i> Tuteur</span>
@endif

                                </div>
                                <div class="d-flex align-items-center">
                                    @if ($question->user->profile_image)
                                    <img class="img-profile rounded-circle profile-image" src="{{ asset('storage/' . $question->user->profile_image) }}" style="width: 50px; height: 50px;">
                                    @else
                                    <div class="circle rounded-circle mr-3" style="width: 55px; height: 55px; display: flex; justify-content: center; align-items: center;background-image:linear-gradient(180deg, #0ef, #081b29)">
                                        <span class="text-white font-weight-bold" style="line-height: 1;">{{ strtoupper(substr($question->user->name, 0, 1)) }}</span>
                                    </div>
                                    @endif
                                </div>
                           
                        </div>
                        <div class="d-flex align-items-center">
                            <form action="{{ route('questions.report', $question->id) }}" method="POST" onsubmit="return confirmReport()">
                                @csrf
                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                <!-- Bouton de signalement -->
                                <button type="submit" class="btn btn-sm btn-report">
                                    <i class="fas fa-exclamation-triangle text-warning"></i>
                                </button>
                            </form>

                            <!-- Bouton de réponse -->
                            <button class="btn btn-sm btn-reply toggle-response" data-target="#response-form-{{ $question->id }}">
                                <i class="fas fa-reply " style="color:#fff"></i>
                            </button>
                            <!-- Bouton de discussion -->
                            <a href="{{ route('answers.showa', $question) }}" class="btn btn-sm">
                                <i class="fas fa-comments " style="color:#0ef"></i>
                            </a>
                            <!-- Bouton de like -->
                            <form action="{{ route('questions.like', $question) }}" method="post" class="mr-2">
                                @csrf
                                <button type="submit" class="btn like-button btn-sm">
                                    <i class="fas fa-thumbs-up " style="color:#fff"></i>
                                    <span class="badge like-badge">{{ $question->likes }}</span>
                                </button>
                            </form>
                            <!-- Bouton de suppression -->
                            
                        </div>
                    </div>

                    <div class="row"> <!-- Utiliser une rangée pour aligner le titre, le contenu et l'image -->
                        <div class="col-md-8 offset-md-1 mt-n5"> <!-- Partie texte -->

                            <a href="{{ route('answers.showa', $question) }}">
                                <div class="text-white text-decoration-underline">
                                    <h2 class="card-title h5">{{ $question->title }}</h2>
                                </div>
                            </a>
                            <p class="card-text  text-white">{{ $question->content }}</p>

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




                            </div>
                        </div>

                        <form action="{{ route('answers.store', $question) }}" method="post" class="response-form" id="response-form-{{ $question->id }}" style="display: none;">
                            @csrf
                            <div class="form-group ">
                                <textarea name="content" class="form-control text-white " style="background-color:#081b29" rows="3" placeholder="Votre réponse"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" style="background-image:linear-gradient(180deg, #081b29, #0ef);box-shadow: 0 0 1px #0ef;border-radius:10px; width:20%">Envoyer</button>
                        </form>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    <!-- <div class="col-md-4 ml-auto">
    <img src="{{ asset('assets/img/integra.png') }}" alt="Description de ton image" width="400" height="1000">
</div> -->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
      window.location.hash = '#discussions';
    });
  </script>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Vérifie si l'URL contient le chemin de la route vers les réponses
            if (window.location.pathname.includes('{{ route("answers.showa", $question) }}')) {
                // Redirection vers la section discussions
                window.location.hash = '#discussions';

                // Faire défiler jusqu'à la section des réponses
                var discussionsSection = document.getElementById('discussions');
                if (discussionsSection) {
                    discussionsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    </script>

    <!-- Ajouter le code JavaScript pour masquer automatiquement les messages d'erreur -->
    <script>
        
        // Attendre 3 secondes avant de masquer les messages d'erreur automatiquement
        setTimeout(function() {
            document.querySelectorAll('.auto-dismiss').forEach(function(element) {
                element.style.display = 'none';
            });
        }, 3000);

        // JavaScript pour afficher le champ de réponse lorsqu'on clique sur l'icône "réponse"
        document.querySelectorAll('.toggle-response').forEach(function(button) {
            button.addEventListener('click', function() {
                var target = document.querySelector(button.getAttribute('data-target'));
                if (target.style.display === 'none') {
                    target.style.display = 'block';
                } else {
                    target.style.display = 'none';
                }
            });
        });

        // JavaScript pour agrandir l'image lorsqu'on clique dessus
        document.querySelectorAll('.preview-image').forEach(function(image) {
            image.addEventListener('click', function() {
                var img = new Image();
                img.src = image.src;
                var w = window.open("");
                w.document.write(img.outerHTML);
            });
        });

        // JavaScript pour afficher une confirmation avant de signaler
        function confirmReport() {
            return confirm('trouvez vous le contenue innaproprie ? \n Êtes-vous sûr de vouloir signaler cette question?');
        }

        function confirmDelete() {
            return confirm('voulez vous vraiment   supprimer cette  discussion?');
        }


        // JavaScript pour éclaircir légèrement la couleur du div contenant chaque question lorsque le curseur survole
        document.querySelectorAll('.question-card').forEach(function(card) {
            card.addEventListener('mouseenter', function() {
                card.style.backgroundColor = '#0a2545'; // Couleur de fond légèrement plus foncée
                card.style.transition = 'background-color 0.3s ease'; // Animation de transition
            });


            card.addEventListener('mouseleave', function() {
                card.style.backgroundColor = '#081b29'; // Retour à la couleur de fond d'origine
                card.style.transition = 'background-color 0.3s ease'; // Animation de transition
            });
        });
    </script>

    @endsection

    @section('styles')
<!-- Lien vers les icônes Font Awesome -->


<style>


    .card .img-profile.rounded-circle {
        width: 10px;
        /* Modifier cette valeur selon vos besoins */
        height: 10px;
        /* Modifier cette valeur selon vos besoins */
    }

    .like-button {
        background-color: white;
        color: white;
        border: 1px solid #ccc;
    }

    .like-button .fas {
        color: white;
    }

    .like-badge {
        background-color: white;
        color: black;
    }

    .btn-reply i {
        color: blue;
    }

    .btn-report i {
        color: yellow;
    }

    .btn-reply,
    .btn-report {
        background-color: transparent;
        border: none;
    }

    .custom-placeholder::placeholder {
        color: white;
        /* Couleur du texte du placeholder */
    }

    /* Style pour la classe text-yellow */
    .badge-warning{
    color: yellow !important; /* Assurez-vous d'utiliser !important pour s'assurer que le style est appliqué */
}

</style>
@endsection