<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasUuids;
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'customer_id',
        'po',
        'memo',
        'label',
        'so',
        'location',
        'project_manager',
        'sales_executive',
        'start_date',
        'end_date',
        'preliminary_cost',
        'po_amount',
        'expense_budget',
    ];

    // Definisi relasi dengan Customer
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    // Definisi relasi dengan Project Manager
    public function projectManager()
    {
        return $this->belongsTo('App\Models\User', 'project_manager_id');
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class, 'project_id');
    }

    public function productionCost()
    {
        return $this->hasMany(ProductionCost::class, 'project_id');
    }

    public function top()
    {
        return $this->hasMany(Top::class, 'project_id');
    }

    public function operational()
    {
        return $this->hasMany(Operational::class, 'project_id');
    }


    // Definisi relasi dengan Sales Executive
    public function salesExecutive()
    {
        return $this->belongsTo('App\Models\User', 'sales_executive_id');
    }
}
