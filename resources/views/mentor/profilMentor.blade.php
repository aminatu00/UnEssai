@extends('layouts.template')

@section('content')
<div class="col-md-8 offset-md-2 text-white">
    <div class="card" style="background-color: #081b29; border: 1px solid #0ef; color:#fff">
        <div class="card-header text-center">Profil du Tuteur</div>

        <div class="card-body" style="background-color:#081b29">
            <!-- Cercle avec le commencement du nom du mentor ou photo de profil -->
            <div class="text-center mb-4">
                @if ($mentor->profile_image)
                    <!-- Afficher la photo de profil -->
                    <img class="img-profile rounded-circle" src="{{ asset('storage/' . $mentor->profile_image) }}" width="150" height="150">
                @else
                    <!-- Afficher le cercle avec le commencement du nom du mentor -->
                    <div class="circle mx-auto" style="background-image:linear-gradient(180deg, #081b29, #0ef)">
                        {{ substr($mentor->name, 0, 1) }}
                    </div>
                @endif
            </div>

            <div class="text-center text-white">
                <h3>{{ $mentor->name }}</h3>
                <p>{{ $mentor->email }}</p>
            </div>

            <!-- Informations supplémentaires -->
            <div class="form-group text-white">
                <label for="niveau">Niveau :</label>
                <input type="text" class="form-control text-white" style="background-color:#081b29;" value="{{ $mentor->niveau }}" readonly>
            </div>

            <div class="form-group text-white">
                <label for="user_type">Type d'utilisateur :</label>
                <input type="text" class="form-control text-white" style="background-color:#081b29;" value="{{ $mentor->user_type }}" readonly>
            </div>

            

            <div class="form-group text-white">
                <label for="expertise">Expertise :</label><br>
                @php
                    $mentorExpertise = json_decode($mentor->expertise);
                @endphp

                @if (!empty($mentorExpertise))
                    <ul>
                        @foreach ($mentorExpertise as $expert)
                            <li>{{ $expert }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Aucune expertise.</p>
                @endif
            </div>
            <!-- Sous-expertise -->
             <!-- Compétences avec barres de progression -->
             <div class="form-group text-white">
                <label for="sub_expertise">Compétences :</label><br>
                @php
                    $mentorSubExpertise = json_decode($mentor->sub_expertises);
                @endphp

                @if (!empty($mentorSubExpertise))
                    @foreach ($mentorSubExpertise as $subExpert)
                        <div class="mb-2 mr-3 d-inline-block">
                            <span>{{ $subExpert }}</span>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Aucune sous-expertise.</p>
                @endif
            </div>
             <!-- Ajout de la description -->
             <div class="form-group text-white" style="border: 1px solid #fff; color: #fff; padding: 15px;">
    <label for="description">Description :</label>
    <p>{{ $mentor->description ?: 'Aucune description disponible.' }}</p>
</div>

        </div>
    </div>
</div>
@endsection

<style>
    .circle {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: #007bff;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 48px;
        margin: 0 auto;
    }

    .img-profile {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }
    .progress {
        border-radius: 0;
    }

    .progress-bar {
        border-radius: 0;
    }
</style>
