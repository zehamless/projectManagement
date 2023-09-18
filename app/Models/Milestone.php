<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'submitted_date',
        'description',
        'due_date',
        'progress',
    ];
}
