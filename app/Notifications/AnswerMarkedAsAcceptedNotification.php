<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AnswerMarkedAsAcceptedNotification extends Notification
{
    use Queueable;

    protected $answer;

    public function __construct($answer)
    {
        $this->answer = $answer;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'question_title' => $this->answer->question->title,
            'message' => 'Votre réponse à la question "' . $this->answer->question->title . '" a été marquée comme satisfaisante.',
            'link' => route('answers.show', $this->answer->question),
        ];
    }
}
