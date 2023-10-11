<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class soProjectNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $projectID;
    private $label;
    private $name;

    public function __construct($projectID, $label, $name)
    {
        $this->projectID = $projectID;
        $this->label = $label;
        $this->name = $name;
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'message' => 'SO project ' .'""'. $this->label .'""'. ' perlu diisi', // Include the 'message' key here
            'created_by' => $this->name,
            'type' => 'warning',
            'link' => route('projects.show', $this->projectID)
        ];
    }

    public function toArray($notifiable): array
    {
        return [
            'message' => 'SO project'. $this->label .' perlu diisi',
            'created_by' => $this->name,
            'type' => 'warning',
            'link' => route('projects.show', $this->projectID)
        ];
    }
}
