<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'abbr',
        'director_id'
    ];
    public function units()
    {
        return $this->hasMany(Unit::class, 'div_id');
    }

    public function users()
    {
        return $this->hasManyThrough(
            User::class,   // Final model
            Unit::class,   // Intermediate model
            'div_id',      // Foreign key on Unit (to Division)
            'unit_id',     // Foreign key on User (to Unit)
            'id',          // Local key on Division
            'id'           // Local key on Unit
        );
    }

    public function director()
    {
        return $this->belongsTo(User::class,'director_id');
    }
}
