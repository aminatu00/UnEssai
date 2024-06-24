<!-- resources/views/admin/questions/show.blade.php -->

@extends('layouts.template')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-white"style="background-color:#081b29">{{ $question->title }}</div>
            <div class="card-body text-white"style="background-color:#081b29">
            @if ($question->media_path)
                            @php
                            $extension = pathinfo($question->media_path, PATHINFO_EXTENSION);
                            @endphp

                            @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <!-- Afficher une image -->
                            <img src="{{ Storage::url(str_replace('public/', '', $question->media_path)) }}" class="img-fluid mb-2 preview-image" alt="Image de la question" style="max-height: 300px; cursor: pointer;">
                            @elseif ($extension === 'mp4')
                            <!-- Afficher une vidéo -->
                            <video controls style="max-width: 100%; max-height: 100px;">
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
                <p>{{ $question->content }}</p>
                <hr>
                <h5>Réponses :</h5>
                <ul class="list-group">
                    @foreach($question->answers as $answer)
                        <li class="list-group-item d-flex justify-content-between align-items-center text-white"style="background-color:#081b29">
                            <div>
                                <p>{{ $answer->content }}</p>
                                <small>Répondu par : {{ $answer->user->name }}</small>
                            </div>
                            <form action="{{ route('answerAdmin.destroy', $answer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn " style="color:red"><i class="fas fa-trash"></i> </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
