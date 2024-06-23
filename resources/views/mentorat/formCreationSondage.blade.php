<!-- resources/views/surveys/create.blade.php -->

@extends('layouts.template')
@section('content')

<div class="col-md-8 offset-md-2 text-white">
  
        <div class="card" >
            
            <div class="card-header text-white" style="background-color:#081b29; border-color:#fff">{{ __('Creer Sondage') }}</div>

            <div class="card-body" style="background-color:#081b29">
                <form method="POST" action="{{ route('sondage.store') }}">
                    @csrf

                    <div class="form-group text-white" style="background-color:#081b29">
                        <label for="subject">{{ __('Expertise') }}</label>
                        <select id="subject" class="form-control @error('subject') is-invalid @enderror text-white"  style="background-color:#081b29"name="subject" required>
                            <option value="" >Select an expertise</option>
                            @if(is_array($expertises))
                            @foreach($expertises as $expertise)
                            <option value="{{ $expertise }}" class="text-white" style="background-color:#081b29" >{{ $expertise }} </option>
                            @endforeach
                            @endif
                        </select>
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group text-white">
                        <label for="question">{{ __('Question') }}</label>
                        <textarea id="question" class="form-control @error('question') is-invalid @enderror text-white" style="background-color:#081b29" name="question" required autocomplete="question">{{ old('question') }}</textarea>
                        @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group text-white">
    <label>{{ __('Options') }}</label><br>
    @foreach($subExpertises ?? [] as $subExpertise)
    <div class="form-check" style="background-color:#081b29">
        <input class="form-check-input text-white"  style="background-color:#081b29" type="checkbox" name="options[]" value="{{ $subExpertise }}">
        <label class="form-check-label text-white">{{ $subExpertise }}</label>
    </div>
@endforeach


    @error('options')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


                    <div class="form-group text-white">
                        <label for="expiry_date">{{ __('Expiry Date') }}</label>
                        <input id="expiry_date" type="datetime-local" class="form-control @error('expiry_date') is-invalid @enderror text-white" style="background-color:#081b29" name="expiry_date" value="{{ old('expiry_date') }}" required autocomplete="expiry_date">
                        @error('expiry_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <button type="submit" class="btn  text-white" style="background-image:linear-gradient(180deg, #081b29, #0ef); border-radius:20px; width:40%" >
                            {{ __('Creer sondage') }}
                        </button>
                    </div>
                </form>
            </div>
     
</div>


@endsection