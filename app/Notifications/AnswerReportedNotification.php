<?php

namespace App\Notifications;

use App\Models\Answer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AnswerReportedNotification extends Notification
{
   
    protected $answer;

    public function __construct(Answer $question)
    {
        $this->answer = $question;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

   

    public function toArray($notifiable)
{
    return [
        'question_id' => $this->answer->id,
        'title' => $this->answer->title,
        'message' => 'Vous avez recu un nouveau signalement',
        'link' => route('admin.notification.show', $this->answer->id)
    ];
}


}
