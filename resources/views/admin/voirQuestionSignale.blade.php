@extends('layouts.template')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-white">Détails de la Question Signalée</h1>
        <p class="mb-4 text-white">Examinez les détails de la question signalée.</p>
        
        @if($question)
            <div class="card shadow mb-4">
                <div class="card-body text-white" style="background-color:#081b29">
                    <h5>ID: {{ $question->id }}</h5>
                    <h5>Titre: {{ $question->title }}</h5>
                    <p>Contenu: {{ $question->content }}</p>
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
                                <div class="card border-danger mb-3">
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
                    @else
                        <p>Aucune image disponible</p>
                    @endif
                    <p>Nombre de signalements: {{ $question->reports_count }}</p>

                    <form action="{{ route('reported.questions.delete', $question->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn " style="color:red" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette question?');">  <i class="fas fa-trash"></i> </button>
                     </form>
                </div>
            </div>

            @if($answer)
                <div class="card shadow mb-4">
                    <div class="card-body card-body text-white" style="background-color:#081b29">
                        <h5>Réponse Signalée</h5>
                        <h5>ID: {{ $answer->id }}</h5>
                        <h5>Titre: {{ $answer->title }}</h5>
                        <p>{{ $answer->content }}</p>
                        <p>Nombre de signalements: {{ $answer->reports_count }}</p>

                        <form action="{{ route('reported.answers.delete', $answer->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn " style="color:red" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réponse?');"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endif
        @endif
    </div>
@endsection

@section('scripts')
<!-- Incluez les scripts JavaScript pour DataTables si nécessaire -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endsection
