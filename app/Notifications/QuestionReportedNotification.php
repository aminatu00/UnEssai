<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Question;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuestionReportedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */


    protected $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

   

    public function toArray($notifiable)
{
    return [
        'question_id' => $this->question->id,
        'title' => $this->question->title,
        'message' => 'Vous avez recu un nouveau signalement',
        'link' => route('admin.notification.show', $this->question->id)
    ];
}


  
   
}
