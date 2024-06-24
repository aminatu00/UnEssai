@extends('layouts.template')
@section('content')
<div class="col-md-8">

    <div class="card">
        <div class="card-header text-white" style="background-color:#081b29 ">{{ __('Créer Tutorat') }}</div>


        <div class="card-body" style="background-color:#081b29 ">
            <form method="POST" action="{{ route('meetings.store') }}">
                @csrf

                <div class="form-group row text-white " >
                    <div class="col-md-6" >
                        <input type="hidden" name="survey_id" value="{{ $survey['id'] ?? '' }}">
                    </div>
                </div>

                <div class="form-group row text-white">
                    <label for="domaine" class="col-md-4 col-form-label text-md-right">{{ __('Domaine dexpertise') }}</label>
                    <div class="col-md-6">
                        <input id="domaine" type="text" class="form-control text-white" style="background-color:#081b29 " name="domaine" value="{{ $survey['subject'] }}" required>
                    </div>
                </div>

                <div class="form-group row text-white">
                    <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Sujet') }}</label>
                    <div class="col-md-6">
                        <select id="subject" class="form-control @error('subject') is-invalid @enderror text-white" style="background-color:#081b29 " name="subject" required>
                            @php
                            $options = json_decode($survey['options'], true)
                            @endphp
                            @foreach($options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row text-white">
                    <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>
                    <div class="col-md-6">
                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror text-white" style="background-color:#081b29 " name="date" value="{{ old('date') }}" required autofocus>
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row text-white">
                    <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Heure') }}</label>
                    <div class="col-md-6">
                        <input id="time" type="time" class="form-control @error('time') is-invalid @enderror text-white" style="background-color:#081b29 " name="time" value="{{ old('time') }}" required>
                        @error('time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row text-white">
                    <label for="session_type" class="col-md-4 col-form-label text-md-right">{{ __('Type de la session') }}</label>
                    <div class="col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input " style="background-color:#081b29 " type="radio" name="session_type" id="online" value="online" required>
                            <label class="form-check-label" for="online">{{ __('En Ligne') }}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input text-white" style="background-color:#081b29 " type="radio" name="session_type" id="in_person" value="in_person" required>
                            <label class="form-check-label" for="in_person">{{ __('En Presentiel') }}</label>
                        </div>
                        @error('session_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row text-white">
                    <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Lien Meet/Info') }}</label>
                    <div class="col-md-6">
                        <input id="link" type="text" class="form-control @error('link') is-invalid @enderror text-white" style="background-color:#081b29 " name="meeting_link" value="{{ old('link') }}" required>
                        @error('link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0 text-white">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn text-white" style="background-image:linear-gradient(180deg,#081b29,#0ef); width:50%;border-radius:20px ">
                            {{ __('Créer Meeting') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
