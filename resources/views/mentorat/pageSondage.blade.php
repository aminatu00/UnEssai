@extends('layouts.template')
@section('content')
<div class="col-md-8 offset-md-2 text-white">
    @if (session('success'))
    <div class="alert alert-success auto-dismiss">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger auto-dismiss">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card" style="background-color: #081b29;">
        <!-- <div class="card-header text-white">{{ __('Mes Sondages recents') }}</div> -->
        <div class="card-body text-white">
            @foreach($surveys->sortByDesc('created_at') as $survey)
            <div id="sondage_{{ $survey->id }}" class="survey-container">
                @if(auth()->user()->user_type === 'student')
                @if(auth()->user()->niveau >= $survey->niveau && in_array($survey->subject, json_decode(auth()->user()->interests)))
                <div class="card" style="background-color: #081b29; border: 1px solid #0ef; margin-bottom: 15px; color:#fff">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p>{{ $survey->question }}</p>
                                <p><strong>Domaine :</strong> {{ $survey->subject }}</p>
                                <p><strong>Date d'expiration :</strong> {{ $survey->expiry_date }}</p>
                            </div>
                            <div class="text-right d-flex flex-column align-items-center">
                                @if ($survey->creator->profile_image)
                                <img class="img-profile rounded-circle profile-image" src="{{ asset('storage/' . $survey->creator->profile_image) }}" style="width: 50px; height: 50px;">
                                @else
                                <div class="circle rounded-circle" style="width: 55px; height: 55px; display: flex; justify-content: center; align-items: center; background-image: linear-gradient(180deg, #0ef, #081b29);">
                                    <span class="text-white font-weight-bold" style="line-height: 1;">{{ strtoupper(substr($survey->creator->name, 0, 1)) }}</span>
                                </div>
                                @endif

                                @if ($survey->creator->user_type === 'mentor')
                                <span class="badge badge-warning mt-2"><i class="fas fa-check-circle fa-lg"></i> Tuteur</span>
                                @endif

                                <p class="mt-2 text-white creator-name">{{ $survey->creator->id === auth()->user()->id ? 'Moi' : $survey->creator->name }}</p>
                            </div>
                        </div>
                        <p><strong>Options :</strong></p>
                        <ul>
                            @php
                            $options = json_decode($survey->options, true);
                            $totalVotes = is_array($totalVotesForSondage) ? array_sum($totalVotesForSondage) : $totalVotesForSondage;
                            @endphp
                            @foreach($options as $option)
                            <li class="d-flex align-items-center justify-content-between">
                                <div>{{ is_array($option) ? $option['name'] : $option }}</div>
                                <div class="progress" style="width: 50%; background-color:#081b29; border:1px solid #fff">
                                    @php
                                    $percentage = 0;
                                    $optionName = is_array($option) ? $option['name'] : $option;
                                    if ($totalVotes > 0 && isset($voteCounts[$optionName])) {
                                    $percentage = ($voteCounts[$optionName] / $totalVotes) * 100;
                                    }
                                    @endphp
                                    <div class="progress-bar" role="progressbar" style="width:10%; background-color: #0ef;" aria-valuenow="{{ isset($voteCounts[$optionName]) ? $voteCounts[$optionName] : 0 }}" aria-valuemin="0" aria-valuemax="100">
                                        {{ isset($voteCounts[$optionName]) ? $voteCounts[$optionName] : 0 }}
                                    </div>
                                </div>
                                @if(auth()->user()->user_type !== 'mentor' || auth()->user()->user_type === 'mentor')
                                <div>
                                    <form id="vote-form-{{ $loop->index }}" class="vote-form" action="{{ route('vote.submit', [$survey->id, $optionName]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-link vote-button" name="survey_id" value="{{ $survey->id }}" style="background-color: transparent; border: none;">
                                            <span style="color: #0ef;">
                                                <i class="fas fa-vote-yea"></i>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('surveys.meetings', $survey->id) }}" class="btn btn-link" style="background-color: transparent; color: #0ef;">
                            <i class="fas fa-calendar-check"></i> Voir Tutorat Disponible
                        </a>
                    </div>
                </div>
                @endif
                @else
                <div class="card text-white" style="background-color: #081b29; border: 1px solid #0ef; margin-bottom: 15px; ">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p>{{ $survey->question }}</p>
                                <p><strong>Domaine :</strong> {{ $survey->subject }}</p>
                                <p><strong>Date d'expiration :</strong> {{ $survey->expiry_date }}</p>
                            </div>
                            <div class="text-right d-flex flex-column align-items-center">
                                @if ($survey->creator->profile_image)
                                <img class="img-profile rounded-circle profile-image" src="{{ asset('storage/' . $survey->creator->profile_image) }}" style="width: 50px; height: 50px;">
                                @else
                                <div class="circle rounded-circle" style="width: 55px; height: 55px; display: flex; justify-content: center; align-items: center; background-image: linear-gradient(180deg, #0ef, #081b29);">
                                    <span class="text-white font-weight-bold" style="line-height: 1;">{{ strtoupper(substr($survey->creator->name, 0, 1)) }}</span>
                                </div>
                                @endif

                                @if ($survey->creator->user_type === 'mentor')
                                <span class="badge badge-warning mt-2"><i class="fas fa-check-circle fa-lg"></i> Tuteur</span>
                                @endif

                                <p class="mt-2 text-white creator-name">{{ $survey->creator->id === auth()->user()->id ? 'Moi' : $survey->creator->name }}</p>
                            </div>
                        </div>
                        <p><strong>Options :</strong></p>
                        <ul>
                            @php
                            $options = json_decode($survey->options, true);
                            $totalVotes = is_array($totalVotesForSondage) ? array_sum($totalVotesForSondage) : $totalVotesForSondage;
                            @endphp
                            @foreach($options as $option)
                            <li class="d-flex align-items-center justify-content-between">
                                <div>{{ is_array($option) ? $option['name'] : $option }}</div>
                                <div class="progress" style="width: 50%; background-color:#081b29; border:1px solid #fff">
                                    @php
                                    $percentage = 0;
                                    $optionName = is_array($option) ? $option['name'] : $option;
                                    if ($totalVotes > 0 && isset($voteCounts[$optionName])) {
                                    $percentage = ($voteCounts[$optionName] / $totalVotes) * 100;
                                    }
                                    @endphp
                                    <div class="progress-bar" role="progressbar" style="width:10%; background-color: #0ef;" aria-valuenow="{{ isset($voteCounts[$optionName]) ? $voteCounts[$optionName] : 0 }}" aria-valuemin="0" aria-valuemax="100">
                                        {{ isset($voteCounts[$optionName]) ? $voteCounts[$optionName] : 0 }}
                                    </div>
                                </div>
                            @if(auth()->user()->user_type !== 'mentor')
                            <div>
                                <form id="vote-form-{{ $loop->index }}" class="vote-form" action="{{ route('vote.submit', [$survey->id, $optionName]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link vote-button" name="survey_id" value="{{ $survey->id }}" style="background-color: transparent; border: none;">
                                        <span style="color: #0ef;">
                                            <i class="fas fa-vote-yea"></i>
                                        </span>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </li>
                        @endforeach
                        </ul>
                            @if(auth()->user()->user_type === 'mentor' && auth()->user()->id === $survey->mentor_id)
                            <div class="d-flex align-items-center">
                                <a href="{{ route('sondages.destroy', $survey->id) }}" class="btn btn-link">
                                    <i class="fas fa-trash-alt" style="color: red;"></i>
                                </a>
                                <a href="{{ route('sondages.edit', $survey->id) }}" class="btn btn-link" style="color: #0ef;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('meetings.create') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="survey" id="survey" value="{{ json_encode($survey) }}">
                                    <input type="hidden" name="survey_id" value="{{ $survey->id }}">
                                    <button type="submit" class="btn btn-link" style="color: green;">
                                        <i class="fas fa-calendar-plus" style="color: green;"></i> Créer Réunion
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .bg-custom {
        background-color: #0ef !important;
    }

    .survey {
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 1px solid #ccc;
    }

    .survey h4 {
        color: #0ef;
    }

    .survey p {
        margin-bottom: 10px;
        color: #fff;
    }

    .img-profile {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .circle {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background-image: linear-gradient(180deg, #0ef, #081b29);
        margin-left: 10px;
    }

    .badge-warning {
        background-color: #ffc107;
        color: #000;
        margin-top: 10px;
        display: inline-flex;
        align-items: center;
        padding: 5px 10px;
        border-radius: 12px;
    }

    /* Nouveau style pour le nom du créateur */
    .creator-name {
        font-size: 0.875rem;
        font-weight: bold;
        text-align: center;
        margin-top: 5px;
    }
    .survey-container {
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 1px solid #ccc;
    }

</style>
@endsection


@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const voteForms = document.querySelectorAll('.vote-form');

        voteForms.forEach(form => {
            form.addEventListener('submit', (event) => {
                event.preventDefault();
                const formData = new FormData(form);
                const action = form.action;
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const progressBar = document.getElementById('progress-bar-' + data.option.replace(/\s+/g, '-'));
                            progressBar.style.width = data.percentage + '%';
                            progressBar.setAttribute('aria-valuenow', data.percentage);
                            // Mettre à jour le nombre de votes affiché
                            progressBar.innerHTML = data.percentage + '%';
                        } else {
                            console.error('Error:', data);
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                    });
            });
        });

        // Ajouter un écouteur d'événements pour la barre de progression
        document.addEventListener('DOMContentLoaded', () => {
            const voteForms = document.querySelectorAll('.vote-form');

            voteForms.forEach(form => {
                form.addEventListener('submit', (event) => {
                    event.preventDefault();
                    const formData = new FormData(form);
                    const action = form.action;
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch(action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const sondageId = formData.get('sondageId'); // Utilisation de l'identifiant unique du sondage
                                const progressBar = document.getElementById('progress-bar-' + sondageId + '-' + data.option.replace(/\s+/g, '-'));
                                progressBar.style.width = data.percentage + '%';
                                progressBar.setAttribute('aria-valuenow', data.percentage);
                                progressBar.innerHTML = data.percentage + '%';
                            } else {
                                console.error('Error:', data);
                            }
                        })
                        .catch(error => {
                            console.error('Fetch error:', error);
                        });
                });
            });
        });


    });
</script>
@endsection