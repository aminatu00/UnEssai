<?php

namespace App\Notifications;

use App\Models\DemandeMentorat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MentorRequestNotification extends Notification
{
    
    use Queueable;

    /**
     * Create a new notification instance.
     */


    
     protected $mentorRequest;

     public function __construct(DemandeMentorat $mentorRequest)
     {
         $this->mentorRequest = $mentorRequest;
     }
    public function via($notifiable)
    {
        return ['database'];
    }

   

    public function toDatabase($notifiable)
    {
        return [
            'mentor_request_id' => $this->mentorRequest->id,
            'message' => 'Une nouvelle demande de tutorat a été enregistrée',
        ];
    }
    
    


}
