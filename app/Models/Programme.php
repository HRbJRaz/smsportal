<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasUuids, HasFactory;

    protected $fillable = [
        'unit_id',
        'cordinator_id',
        'date_start',
        'date_end',
        'report',
        'report_file',
    ];
    
    public function observers()
    {
        return $this->belongsToMany(Observer::class, 'observer_programme');
    }
    public function unit() {
        return $this->belongsTo(Unit::class);
    }
    
    public function cordinator() {
        return $this->belongsTo(User::class, 'cordinator_id');
    }
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
