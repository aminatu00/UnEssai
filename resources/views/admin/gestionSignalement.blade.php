@extends('layouts.template')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-white">Gérer les Questions Signalées</h1>
    <p class="mb-4 text-white">Liste des questions signalées pour examen.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4"  style="background-color:#081b29">
        <div class="card-body">
            <div class="table-responsive  " >
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
<<<<<<< HEAD
                            <th class="text-white" style="background-color:#081b29">ID</th>
                            <th class="text-white" style="background-color:#081b29">Titre</th>
                            <th class="text-white" style="background-color:#081b29">Contenu</th>
                            <th class="text-white" style="background-color:#081b29">Image</th>
                            <th class="text-white" style="background-color:#081b29">Signalements</th>
                            <th class="text-white" style="background-color:#081b29">Action</th>
=======
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>Media</th>
                            <th>Signalements</th>
                            <th>Action</th>
>>>>>>> origin/amina
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reportedQuestions as $question)
                        <tr>
<<<<<<< HEAD
                            <td class="text-white" style="background-color:#081b29">{{ $question->id }}</td>
                            <td class="text-white" style="background-color:#081b29">{{ $question->title }}</td>
                            <td class="text-white" style="background-color:#081b29">{{ $question->content }}</td>
                            <td class="text-white" style="background-color:#081b29">
                                @if($question->media_path)
                                <img src="{{ Storage::url(str_replace('public/', '', $question->media_path)) }}" alt="Image de la question" style="max-height: 100px;">
                                @else
                                N/A
                                @endif
                            </td>
                            <td class="text-white" style="background-color:#081b29">{{ $question->reports_count }}</td>
                            <td class="text-white" style="background-color:#081b29">
=======
                            <td>{{ $question->id }}</td>
                            <td>{{ $question->title }}</td>
                            <td>{{ $question->content }}</td>
                            <td>
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
            </div>
        @else
            <!-- Si le type de média n'est ni une image ni une vidéo ni un PDF -->
            <p>Le type de média n'est pas pris en charge.</p>
        @endif
    @else
        <!-- Si aucun média n'est présent -->
        <p>N/A</p>
    @endif
</td>

                            <td>{{ $question->reports_count }}</td>
                            <td>
>>>>>>> origin/amina
                                <form action="{{ route('reported.questions.delete', $question->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette question?');">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td  class="text-white" style="background-color:#081b29"colspan="6">Aucune question signalée.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
