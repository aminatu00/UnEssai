@extends('layouts.template')

@section('content')
<div class="col-md-8" >
    <div class="card">

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

        </div>
    </div>
</div>
@endsection
