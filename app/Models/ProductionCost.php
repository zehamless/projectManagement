<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionCost extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'production_cost';
    protected $fillable = ['description', 'amount'];
}
