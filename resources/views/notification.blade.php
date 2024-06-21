@extends('layouts.template')

@section('content')
<div class="col-md-8" >
    <div class="card">
<<<<<<< HEAD
        <div class="card-header text-white" style="background-color:#081b29;">Notifications</div>
        <div class="card-body" style="background-color:#081b29;">
            @if(auth()->user()->user_type === 'admin')
            <ul>
                @foreach($notifications as $notification)
                <li>
                    @if(isset($notification->data['mentor_request_id']))
                    <a href="{{ route('mentor.request.show', $notification->data['mentor_request_id']) }}" class="text-white">
                        {{ $notification->data['message'] ?? 'Notification sans message' }}
                    </a>
                    @else
                    <a href="{{ route('admin.notification.show', $notification->data['question_id']) }}" class="text-white">
                        {{ $notification->data['message'] ?? 'Notification sans message' }}
                    </a>
                    @endif
                </li>
                @endforeach
            </ul>
            @else
            @if($notifications->isEmpty())
            <div class="alert alert-info text-white " style="background-color:#081b29; "role="alert">
                Aucune notification pour le moment.
            </div>
            @else
            @foreach ($notifications as $notification)
            <div class="alert alert-info text-white" style="background-color:#081b29;" role="alert">
                @if(isset($notification->data['message']))
                <a href="{{ $notification->data['link'] ?? '#' }}" class="text-white">
                    {{ $notification->data['message'] }}
                </a>
                @else
                Notification sans message.
                @endif
            </div>
            @endforeach
            @endif
            @endif
=======
        <div class="card-header">Notifications</div>
        <div class="card-body">
            @switch(auth()->user()->user_type)
                @case('admin')
                    <ul class="list-unstyled">
                        @foreach($notifications as $notification)
                            <li>
                                @if(isset($notification->data['mentor_request_id']))
                                    <a href="{{ route('mentor.request.show', $notification->data['mentor_request_id']) }}" style="text-decoration: none; color: inherit;">
                                        <i class="fas fa-bell"></i> <!-- Icône de notification -->
                                        {{ $notification->data['message'] ?? 'Notification sans message' }}
                                    </a>
                                @else
                                    <a href="{{ route('admin.notification.show', $notification->data['question_id']) }}" style="text-decoration: none; color: inherit;">
                                        <i class="fas fa-bell"></i> <!-- Icône de notification -->
                                        {{ $notification->data['message'] ?? 'Notification sans message' }}
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    @break
                @case('student')
                @case('mentor')
                    @if($notifications->isEmpty())
                        <div class="alert alert-info" role="alert">
                            Aucune notification pour le moment.
                        </div>
                    @else
                        @foreach ($notifications as $notification)
                            <div class="alert alert-info" role="alert">
                                @if(isset($notification->data['message']))
                                    <a href="{{ $notification->data['link'] ?? '#' }}" style="text-decoration: none; color: inherit;">
                                        <i class="fas fa-bell"></i> <!-- Icône de notification -->
                                        {{ $notification->data['message'] }}
                                    </a>
                                @else
                                    Notification sans message.
                                @endif
                            </div>
                        @endforeach
                    @endif
                    @break
                @default
                    <div class="alert alert-warning" role="alert">
                        Type d'utilisateur non reconnu.
                    </div>
            @endswitch
>>>>>>> origin/amina
        </div>
    </div>
</div>
@endsection
