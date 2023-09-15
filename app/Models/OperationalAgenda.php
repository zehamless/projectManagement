<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationalAgenda extends Model
{
    protected $table = 'operational_agenda';

    protected $fillable = [
        'operational_id',
        'description',
        'due_date',
        'status',
    ];

    // Definisikan relasi dengan tabel "operational"
    public function operational()
    {
        return $this->belongsTo(Operational::class, 'operational_id');
    }
}
