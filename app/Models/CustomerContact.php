<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    protected $fillable = ['customerContact_id', 'name', 'phone'];

    // Definisi relasi dengan model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'name', 'companyName');
    }
}
