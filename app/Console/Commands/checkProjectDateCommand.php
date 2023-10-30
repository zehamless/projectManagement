<?php

namespace App\Console\Commands;

use App\Models\Project;
use App\Models\User;
use App\Notifications\projectNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class checkProjectDateCommand extends Command
{
    protected $signature = 'check:project-date';

    protected $description = 'Command description';

    public function handle(): void
    {
        $projects = Project::all();

        foreach ($projects as $project){
            $projectDate = Carbon::parse($project->end_date);
            $currentDate = Carbon::now();
            $differenceInDays = $currentDate->diffInDays($projectDate);
            if ($differenceInDays == 3){
                $projectID = $project->id;
                $label = $project->label;
                $users = User::Role(['Project Manager', 'Sales Executive'])->get();
                Notification::send($users, new projectNotification(
                    ' Due Date' . '""' . $label . '""' . ' 3 hari lagi!',
                    null,
                    'warning',
                    route('projects.show', $projectID)
                ));
            }
        }
    }
}
