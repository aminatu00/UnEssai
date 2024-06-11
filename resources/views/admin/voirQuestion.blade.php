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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div style="margin-right: 10px;">
                                        <a href="{{ route('questionAdmin.show', $question->id) }}">{{ $question->title }}</a>
                                        <div>{{ $question->content }}</div>
                                    </div>
                                    <div>
                                        @if ($question->media_path)
                                        @php
                                        $extension = pathinfo($question->media_path, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <!-- Afficher une image -->
                                        <img src="{{ Storage::url(str_replace('public/', '', $question->media_path)) }}" class="img-fluid mb-2 preview-image clickable-media" alt="Image de la question" style="max-height: 80px; cursor: pointer;" data-src="{{ Storage::url(str_replace('public/', '', $question->media_path)) }}">
                                        @elseif ($extension === 'mp4')
                                        <!-- Afficher une vidéo -->
                                        <video controls style="max-width: 100%; max-height: 300px;" class="clickable-media" data-src="{{ Storage::url(str_replace('public/', '', $question->media_path)) }}">
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
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('questionAdmin.destroy', $question->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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

<!-- Modal pour afficher les médias -->
<div class="modal fade" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="mediaContainer"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Récupérer tous les médias cliquables
        const clickableMedia = document.querySelectorAll('.clickable-media');

        // Ajouter un écouteur d'événement clic à chaque média
        clickableMedia.forEach(media => {
            media.addEventListener('click', function () {
                // Vérifier si le média est une vidéo
                if (media.tagName.toLowerCase() === 'video') {
                    // Ouvrir la modale et afficher la vidéo
                    const mediaModal = new bootstrap.Modal(document.getElementById('mediaModal'));
                    const modalBody = document.getElementById('mediaContainer');
                    modalBody.innerHTML = `<video controls style="width: 100%; height: auto;"><source src="${media.dataset.src}" type="video/mp4"></video>`;
                    mediaModal.show();
                } else {
                    // Ouvrir la modale et afficher l'image
                    const mediaModal = new bootstrap.Modal(document.getElementById('mediaModal'));
                    const modalBody = document.getElementById('mediaContainer');
                    modalBody.innerHTML = `<img src="${media.dataset.src}" class="img-fluid">`;
                    mediaModal.show();
                }
            });
        });
    });
</script>
@endpush
