@extends('layouts.template')
@section('content')


<div class="col-md-12 offset-md-0">
    <div class="card">
        <div class="card-header text-white  " style="background-color:#081b29; border:1px solid #fff">{{ __('Tutorats') }}</div>


        <div class="card-body" style="background-color:#081b29">
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
             <div class="text-white" style="background-color:#081b29">  <p>Pas de tutorats trouves</p></div>  

               

            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th class=" text-white  " style="background-color:#081b29;">Date</th>
                            <th class=" text-white  " style="background-color:#081b29;">Time</th>
                            <th class=" text-white  " style="background-color:#081b29;">Meeting Link/Info</th>
                            <th class=" text-white  " style="background-color:#081b29;">Sujet</th>
                            <th class=" text-white  " style="background-color:#081b29;">Tuteur</th>
                            <th class=" text-white  " style="background-color:#081b29;">Domaine</th>
                            <th class=" text-white  " style="background-color:#081b29;">Type de Session</th>
                            <th class=" text-white  " style="background-color:#081b29;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($meetings as $meeting)
                        <tr>
                            <td class=" text-white  " style="background-color:#081b29;">{{ $meeting->date }}</td>
                            <td class=" text-white  " style="background-color:#081b29;">{{ $meeting->time }}</td>
                            <td class=" text-white  " style="background-color:#081b29;">
                                {!! preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank">$1</a>', $meeting->meeting_link) !!}
                            </td>
                            <td class=" text-white  " style="background-color:#081b29;">{{ $meeting->subject }}</td>
                            <td class=" text-white  " style="background-color:#081b29;">{{ $meeting->mentor->name }}</td>
                            <td class=" text-white  " style="background-color:#081b29;">{{ $meeting->domaine }}</td>
                            <td class=" text-white  " style="background-color:#081b29;">{{ ucfirst($meeting->session_type) }}</td>
                            <td class=" text-white  " style="background-color:#081b29;">
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
