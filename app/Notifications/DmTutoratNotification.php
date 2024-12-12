<?php

namespace App\Notifications;

use App\Models\DmTutorat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class DmTutoratNotification extends Notification
{
    use Queueable;

    protected $dmTutorat;

    public function __construct(DmTutorat $dmTutorat)
    {
        $this->dmTutorat = $dmTutorat;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'dm_tutorat_id' => $this->dmTutorat->id,
            'message' => 'Une nouvelle demande de tutorat a été enregistrée.',
            'link' => route('voir.Tutorat.show', $this->dmTutorat->id),
        ];
    }
}
