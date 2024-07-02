@extends('layouts.template')
@section('content')

<div class="col-md-12 offset-md-0 text-white">
    <div class="card " style="background-color: #081b29; border: 1px solid #0ef; color:aliceblue">
        <div class="card-header ">{{ __('Tutorats') }}</div>

        <div class="card-body" style="border: 1px solid #0ef;">
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

            @if($meetings->isEmpty())
            <p>Pas de tutorats trouves</p>
            @else
            <table class="custom-table" style="width: 100%; padding: 20px;">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Meeting Link/Info</th>
                        <th>Sujet</th>
                        <th>Tuteur</th>
                        <th>Domaine</th>
                        <th>Type de Session</th>
                        <!-- Afficher Actions uniquement pour les mentors connectés -->
                        @if(auth()->check() && auth()->user()->user_type === 'mentor')
                        <th>Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meetings as $meeting)
                    @if(auth()->check())
                    @if(auth()->user()->user_type === 'mentor' && $meeting->mentor_id === auth()->user()->id)
                    <tr>
                        <td>{{ $meeting->date }}</td>
                        <td>{{ $meeting->time }}</td>
                        <td>
                            {!! preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank">$1</a>', $meeting->meeting_link) !!}
                        </td>
                        <td>{{ $meeting->subject }}</td>
                        <td>{{ $meeting->mentor->name }}</td>
                        <td>{{ $meeting->domaine }}</td>
                        <td>{{ ucfirst($meeting->session_type) }}</td>
                        <!-- Afficher Actions uniquement pour les mentors -->
                        <td>
                            <a href="{{ route('meetings.edit', $meeting->id) }}" class="btn btn-link p-0">
                                <i class="fas fa-edit" style="color: blue;"></i> <!-- Icone pour modifier -->
                            </a>
                            <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link p-0" style="border: none; background: none;">
                                    <i class="fas fa-trash-alt" style="color: red;"></i> <!-- Icone pour supprimer -->
                                </button>
                            </form>
                        </td>
                    </tr>
                    @elseif(auth()->user()->user_type !== 'mentor')
                    <tr>
                        <td>{{ $meeting->date }}</td>
                        <td>{{ $meeting->time }}</td>
                        <td>
                            {!! preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank">$1</a>', $meeting->meeting_link) !!}
                        </td>
                        <td>{{ $meeting->subject }}</td>
                        <td>{{ $meeting->mentor->name }}</td>
                        <td>{{ $meeting->domaine }}</td>
                        <td>{{ ucfirst($meeting->session_type) }}</td>
                    </tr>
                    @endif
                    @endif
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
<script>
    function confirmDelete() {
        return confirm('voulez vous vraiment   supprimer ce Tutorat?');
    }
</script>
@endsection

@section('styles')
<style>
 
 .custom-table {
        border: 2px solid #0ef; /* Bordure bleue */
    }
    .custom-table th,
    .custom-table td {
        color: #0ef; /* Couleur de texte bleue */
        border: 5px solid #0ef; /* Trait de bordure bleu */
        padding: 10px; /* Espacement intérieur */
    }


</style>
@endsection