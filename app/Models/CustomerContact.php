<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    use HasUuids;
    protected $fillable = [
        'companyName',
        'phone'
    ];

    // Definisi relasi dengan model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'companyName');
    }
}
