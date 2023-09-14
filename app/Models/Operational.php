<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operational extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'date',
        'spk_code',
        'spk_number',
        'type',
        'description',
        'transportation',
        'vehicle_number',
        'created_by',
        'approved_by',
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }
    public function team()
    {
        return $this->hasMany(Team::class);
    }
    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
