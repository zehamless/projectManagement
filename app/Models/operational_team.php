<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class operational_team extends Pivot
{
    use HasFactory;

    protected $table = 'operational_team';
    protected $foreignKey = 'operational_id';
    protected $relatedKey = 'user_id';
    protected $fillable = [
        'user_id',
        'operational_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function operational(): BelongsTo
    {
        return $this->belongsTo(operational::class, 'operational_id', 'id');
    }
}
