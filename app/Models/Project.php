<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'customer_id',
        'customer_contact',
        'po',
        'label',
        'so',
        'project_manager',
        'sales_executive',
        'start_date',
        'end_date',
        'preliminary_cost',
        'po_amount',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function projectManager()
    {
        return $this->belongsTo('App\Models\User', 'project_manager_id', 'id');
    }

    public function salesExecutive()
    {
        return $this->belongsTo('App\Models\User', 'sales_executive_id', 'id');
    }
}
