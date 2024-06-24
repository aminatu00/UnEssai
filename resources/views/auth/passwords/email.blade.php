@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #081b29; ">
    <div class="row justify-content-center "style="background-color: #081b29; color: white;">
        <div class="col-md-8" style="background-color: #081b29; color: white;">
            <div class="card">
                <div class="card-header text-white" style="background-color: #081b29; ">{{ __('Réinitialisation de mot de passe') }}</div>

                <div class="card-body" style="background-color: #081b29; color: white;">
                    @if (session('status'))
                        <div class="alert" style="background-color: #081b29; color: white;" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label " style="background-color: #081b29; color: white;">{{ __(' Adresse Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"style="background-color: #081b29; color: white;" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn text-white" style="background-image:linear-gradient(45deg,#0ef,#081b29);border-radius:40px; margin-left: 50px;">
                                    {{ __('Réinitialiser le mot de passe') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
