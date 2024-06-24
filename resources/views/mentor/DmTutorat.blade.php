@extends('layouts.template')

@section('content')

<div class="container mt-5">
     <!-- Afficher les messages d'erreur -->
     @if ($errors->any())
    <div class="alert alert-danger auto-dismiss">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- Afficher les messages de succès -->
    @if (session('success'))
    <div class="alert alert-success auto-dismiss">
        {{ session('success') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="background-color: #081b29; border: 1px solid #0ef;">
                <div class="card-header" style="background: linear-gradient(180deg, #0ef, #081b29); color: white;">
                    Liste des demandes de tutorat
                </div>

                <div class="card-body">
                    @if ($mentorRequest->isEmpty())
                    <p class="text-white">Aucune demande de tutorat n'a été trouvée.</p>
                    @else
                    <div class="table-responsive">
                        <table class="table  ">
                            <thead>
                                <tr>
                                    <th class="text-white" style="background-color:#081b29">Niveau</th>
                                    <th class="text-white" style="background-color:#081b29">Domaine demande</th>
                                    <th class="text-white" style="background-color:#081b29">Message</th>
                                    <th class="text-white" style="background-color:#081b29">Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach ($mentorRequest as $request)
                                <tr>
                                    <td class="text-white" style="background-color:#081b29" >{{ $request->niveau }}</td>
                                    <td class="text-white" style="background-color:#081b29">
                                        @if(is_array($request->expertise))
                                        {{ implode(', ', $request->expertise) }}
                                        @else
                                        {{ $request->expertise }}
                                        @endif
                                    </td>
                                    <td class="text-white" style="background-color:#081b29">{{ $request->message }}</td>
                                    <td class="text-white" style="background-color:#081b29">
                                        <form action="{{ route('Tutorat.destroy', $request->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .btn-link {
        color: inherit; /* inherit color from parent */
        text-decoration: none; /* remove underline */
    }

    .btn-link:hover .fa-trash-alt {
        color: red; /* red color on hover */
    }

    .fa-trash-alt {
        color: red; /* initial color red */
    }
</style>

<!-- FontAwesome CDN -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
