<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    protected $fillable = [
        'company',
        'phone'
    ];

    // Definisi relasi dengan model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'company');
    }
}
