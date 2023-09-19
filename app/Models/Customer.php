<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    use HasUuids;
    // Kolom yang dapat diisi (jika perlu)
    protected $fillable = [
        'companyName',
    ];
    public function contacts()
{
    return $this->hasMany(CustomerContact::class, 'phone', 'companyName');
}
    public function project()
    {
        return $this->belongsTo(Project::class, 'customer_id');
    }
}
