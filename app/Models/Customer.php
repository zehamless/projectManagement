<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasUuids;
    // Kolom yang dapat diisi (jika perlu)
    protected $fillable = [
        'customer_id',
        'company',
    ];
    public function contacts()
{
    return $this->hasMany(CustomerContact::class, 'name', 'companyName');
}

}
