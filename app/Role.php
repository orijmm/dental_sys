<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;
use App\Support\Authorization\AuthorizationRoleTrait;

class Role extends EntrustRole
{
    use AuthorizationRoleTrait;

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description', 'removable'
    ];

     /**
     * Field type
     *
     * @var array
     */
    protected $casts = [
        'removable' => 'boolean'
    ];

     /**
     * Relationships
     *
     */
    public function users()
    {
        return $this->belongsToMany(User::class,'role_user');
    }

}
