<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session extends Model
{
    use HasUuids, HasFactory;

    protected $casts = [
        'specialty' => 'array',
    ];
    
    protected $fillable = [
        'programme_id',
        'time_start',
        'time_end',
        'specialty',
        'position',
    ];
    
    public $incrementing = false;
    protected $keyType = 'string';
        
    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }
    
}
