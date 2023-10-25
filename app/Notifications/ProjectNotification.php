<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class projectNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $name;
    private $message;
    private $type;
    private $link;

    public function __construct($message, $name = null, $type, $link = null)
    {
        $this->message = $message;
        $this->name = $name;
        $this->type = $type;
        $this->link = $link;
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'message' => $this->message,
            'created_by' => $this->name,
            'type' => $this->type,
            'link' => $this->link
        ];
    }

    public function toArray($notifiable): array
    {
        return [
            'message' => $this->message,
            'created_by' => $this->name,
            'type' => $this->type,
            'link' => $this->link
        ];
    }
}
