<?php

namespace App\Models;

use App\Models\Programme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Observer extends Model
{
    use HasFactory;
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'callsign',
        'initial_course_date',
        'refresher_course_date',
        'assigement_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programmes()
    {
        return $this->belongsToMany(Programme::class, 'observer_programme');
    }

}
