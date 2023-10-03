<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Operational extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'project_id',
        'date',
        'spk_code',
        'spk_number',
        'type',
        'description',
        'transportation_mode',
        'vehicle_number',
        'created_by',
        'approved_by',
    ];

    public function expenses(): HasMany
    {
        return $this->hasMany(OperationalExpense::class, 'operational_id');
    }
    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }

    /**
     * @return BelongsToMany
     */
    public function team(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'operational_team', 'operational_id', 'user_id');
    }
    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
