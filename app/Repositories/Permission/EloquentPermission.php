<?php

namespace App\Repositories\Permission;

use App\Permission;
use App\Repositories\Repository;

class EloquentPermission extends Repository implements PermissionRepository
{
    /**
     * EloquentPermission constructor
     *
     * @param Permission $Permission
     */
    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
    }

}