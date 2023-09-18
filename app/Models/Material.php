<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'material_id',
        'operational_id',
        'memo',
        'do',
        'np',
        'status',
    ];

    // Definisikan relasi dengan tabel "operational"
    public function operational()
    {
        return $this->belongsTo(Operational::class, 'operational_id');
    }
}
