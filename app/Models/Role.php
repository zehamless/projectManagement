<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function hasUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_roles','role_id', 'user_id');
    }
}
