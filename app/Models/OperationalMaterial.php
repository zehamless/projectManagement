<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class OperationalMaterial extends Model
{
    use HasUuids;

    protected $table = 'materials';
    protected $fillable = [
        'operational_id',
        'memo',
        'do',
        'status',
    ];

    public $timestamps = true;

    /**
     * @return BelongsTo
     */
    public function operational(): BelongsTo
    {
        return $this->belongsTo(Operational::class, 'operational_id');
    }
}
