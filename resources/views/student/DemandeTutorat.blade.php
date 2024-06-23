@extends('layouts.template')

@section('content')
<div class="container mt-0">
<div class="col-md-8 offset-md-2 text-white">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card" style="background-color: #081b29; border: 1px solid #0ef;">
            <div class="card-header" style="background: linear-gradient(180deg, #0ef, #081b29);">
                <h3 class="card-title text-white">Demande de tutorat</h3>
            </div>
            <div class="card-body text-white">
                <form method="POST" action="{{ route('Dmtutorat.store') }}">
                    @csrf
                    <div class="form-group text-white">
                        <label for="message" class="text-white">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required style="background-color: #081b29; border: 1px solid #0ef;color: #fff;"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="niveau" class="text-white">Niveau</label>
                        <select class="form-control" id="niveau" name="niveau" required style="background-color: #081b29; border: 1px solid #0ef;color: #fff;">
                            <option value="{{ $niveau }}" selected style="color: #fff;">{{ $niveau }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="expertise" class="text-white">Domaines d'expertise</label>
                        <select class="form-control" id="expertise" name="expertise[]" multiple required style="background-color: #081b29; border: 1px solid #0ef;">
                            @foreach($domains as $domain)
                                <option value="{{ $domain }}"style="color: #fff;">{{ ucfirst($domain) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn custom-btn">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .card {
        background-color: #081b29;
        border: 1px solid #0ef;
    }

    .card-header {
        background: linear-gradient(180deg, #0ef, #081b29);
    }

    .card-title, .text-white {
        color: #fff;
    }

    label {
        font-weight: bold;
        color: #fff;
    }

    .form-control {
        background-color: #495057;
        color: #fff;
        border: 1px solid #6c757d;
    }

    .form-control:focus {
        background-color: #495057;
        color: #fff;
    }

    .btn.custom-btn {
        background: linear-gradient(180deg, #0ef, #081b29);
        border: none;
        color: white;
    }

    .btn.custom-btn:hover {
        background: linear-gradient(180deg, #081b29, #0ef);
    }
</style>
