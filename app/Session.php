<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;

class Session extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'ip_address', 'user_agent', 'payload', 'last_activity'
    ];

     /**
     * Relationships
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function last_activity()
    {
        return $this->belongsTo(Activity::class,'last_activity');
    }
}
