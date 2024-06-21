@extends('layouts.Accueil')

@section('content')
<section id="discussions" class="discussions section">
    <div class="col-md-8 offset-md-0">

        @if ($errors->any())
        <div class="alert alert-danger auto-dismiss">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div style="font-family: Arial, sans-serif; color: #ffffff; font-weight: bold;">
            <h1>Liste des questions</h1>
        </div>

        <form action="{{ route('questions.search') }}" method="GET" class="mb-3">
            <input type="hidden" name="category_id" value="{{ isset($category) ? $category->id : null }}">
            <div class="input-group">
                <input type="text" name="query" class="form-control custom-placeholder" placeholder="Rechercher une question">
                <button type="submit" class="btn btn-primary" style="background-image:linear-gradient(180deg, #081b29, #0ef);box-shadow: 0 0 1px #0ef;">Rechercher</button>
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
                                    <span class="badge badge-warning"><i class="fas fa-check-circle fa-lg"></i> Tuteur</span>
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
                        </div>

                        <div class="row">
                            <div class="col-md-8 offset-md-1 mt-n5">

                                <a href="{{ route('answers.show', $question) }}">
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
                                <img src="{{ Storage::url(str_replace('public/', '', $question->media_path)) }}" class="img-fluid mb-2 preview-image" alt="Image de la question" style="max-height: 80px; cursor: pointer;">
                                @elseif ($extension === 'mp4')
                                <video controls style="max-width: 100%; max-height: 300px;">
                                    <source src="{{ Storage::url(str_replace('public/', '', $question->media_path)) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>

                                @elseif ($extension === 'pdf')
                                <div class="card" style="max-width: 300px;">
                                    <div class="card border-danger mb-3">
                                        <div class="card-body text-danger">
                                            <i class="far fa-file-pdf fa-3x"></i>
                                            <p class="card-text">Document PDF</p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="{{ Storage::url(str_replace('public/', '', $question->media_path)) }}" class="btn btn-danger" target="_blank">Voir le document PDF</a>
                                        </div>
                                    </div>
                                    @else
                                    <p>Le type de média n'est pas pris en charge.</p>
                                    @endif
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection

@section('styles')
<style>
    .custom-placeholder::placeholder {
        color: white;
    }

    .card .img-profile.rounded-circle {
        width: 10px;
        height: 10px;
    }
</style>
@endsection
