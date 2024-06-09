<!-- resources/views/admin/questions/index.blade.php -->

@extends('layouts.template')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Toutes les questions</div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sujet</th>
                                <th scope="col">Contenu</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td>
                                 <a href="{{ route('questionAdmin.show', $question->id) }}">{{ $question->title }}
                                </a>
                                    </td>
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
                                @else
                                <!-- Si le type de média n'est ni une image ni une vidéo ni un PDF -->
                                <p>Le type de média n'est pas pris en charge.</p>
                                @endif
                                @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('questionAdmin.destroy', $question->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
