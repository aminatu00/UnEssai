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
                            <th class="text-white" style="background-color:#081b29">ID</th>
                            <th class="text-white" style="background-color:#081b29">Titre</th>
                            <th class="text-white" style="background-color:#081b29">Contenu</th>
                            <th class="text-white" style="background-color:#081b29">Image</th>
                            <th class="text-white" style="background-color:#081b29">Signalements</th>
                            <th class="text-white" style="background-color:#081b29">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reportedQuestions as $question)
                        <tr>
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
