<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class soProjectNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [];
    }

    public function toArray($notifiable): array
    {
        return [
            'message' => 'SO project'. $this->label .' perlu diisi',
            'created_by' => $this->name,
            'type' => 'warning',
            'link' => route('projects.show', $this->id)
        ];
    }
}
