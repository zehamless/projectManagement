<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OperationalAgenda extends Model
{
    use HasUuids;
    protected $table = 'operational_agenda';
    protected $fillable = [
        'operational_id',
        'description',
        'due_date',
        'status',
    ];

    // Definisikan relasi dengan tabel "operational"
    public function operational(): BelongsTo
    {
        return $this->belongsTo(Operational::class, 'operational_id');
    }
}
