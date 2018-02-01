<?php

namespace App\Repositories\Role;

use App\Repositories\RepositoryInterface;

interface RoleRepository extends RepositoryInterface
{
	 /**
     * List by id
     */
    public function lists_id($column = 'name', $key = 'id');

     /**
     * update permission of roles
     */
    public function updatePermissions($roleId, array $permissions);
}