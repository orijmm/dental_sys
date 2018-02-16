<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'specialties';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name'
        ];

    public function specialists()
    {
        return $this->hasMany('App\Specialist', 'specialty_id');
    }
}
