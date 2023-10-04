<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Top extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = ['id', 'project_id', 'type', 'progress', 'description', 'status', 'file'];
    protected $table = 'top';
}