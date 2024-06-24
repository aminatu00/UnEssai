@extends('layouts.template')
@section('content')
        <div class="col-md-6 offset-md-0">
            <div class="card">
                <div class="card-header  text-white  " style="background-color:#081b29;">{{ __('Mettre a jour Meeting') }}</div>

                <div class="card-body text-white  " style="background-color:#081b29;">
                    <form method="POST" action="{{ route('meetings.update', $meeting->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror  text-white  " style="background-color:#081b29;" name="date" value="{{ old('date', $meeting->date) }}" required autofocus>

                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>

                            <div class="col-md-6">
                                <input id="time" type="time" class="form-control @error('time') is-invalid @enderror  text-white  " style="background-color:#081b29;" name="time" value="{{ old('time', $meeting->time) }}" required>

                                @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
    <label for="meeting_link" class="col-md-4 col-form-label text-md-right">{{ __(' Lien Meeting/Info ') }}</label>

    <div class="col-md-6">
        <input id="meeting_link" type="text" class="form-control @error('meeting_link') is-invalid @enderror  text-white  " style="background-color:#081b29;" name="meeting_link" value="{{ old('meeting_link', $meeting->meeting_link) }}" required>

        @error('meeting_link')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Sujet') }}</label>

                            <div class="col-md-6">
                                <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror  text-white  " style="background-color:#081b29;" name="subject" value="{{ old('subject', $meeting->subject) }}" required>

                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn  text-white  " style="background-image:linear-gradient(45deg,#0ef,#081b29);border-radius:40px">
                                    {{ __('Mettre a jour  Meeting') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
@endsection
