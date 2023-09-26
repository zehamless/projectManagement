<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OperationalExpense extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'operational_expense';
    protected $fillable = [
        'operational_id',
        'date',
        'item',
        'amount',
    ];

    public $timestamps = true;

    public function operational(): BelongsTo
    {
        return $this->belongsTo(Operational::class, 'operational_id');
    }
}
