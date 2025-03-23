<?php

namespace App\Models;

use App\Models\User;
use App\Models\Division;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'Designator',
        'Name',
        'div_id',
        'address',
        'phone',
        'fax',
        'afs',
        'manager_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'div_id');
    }
}
