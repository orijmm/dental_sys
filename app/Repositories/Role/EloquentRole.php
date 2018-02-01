<?php

namespace App\Repositories\Role;

use App\Role;
use App\Repositories\Repository;
use App\Support\Authorization\CacheFlusherTrait;

class EloquentRole extends Repository implements RoleRepository
{
    use CacheFlusherTrait;

	/**
     * Fields attributes
     *
     * @var array
     */
    protected $attributes = ['name', 'display_name', 'description'];

    /**
     * EloquentRole constructor
     *
     * @param Role $Role
     */
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    /**
     * List by id
     */
    public function lists_id($column = 'name', $key = 'id')
    {
        return $this->model->all()->pluck($column, $key)->all();
    }

    /**
     * update permission of roles
     */
    public function updatePermissions($roleId, array $permissions)
    {
        $role = $this->find($roleId);

        $role->perms()->sync($permissions);

        $this->flushRolePermissionsCache($role);
    }

}