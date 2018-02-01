<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepository extends RepositoryInterface
{
     /**
     * Paginate and search
     *
     * return the result paginated for the take value and with the attributes.
     *
     * @param int $take
     * @param string $search
     *
     * @return mixed
     *
     */
    public function paginate_search($take = 10, $search = null, $status = null);

     /**
     * Find user by confirmation token.
     *
     * @param $token
     * @return mixed
     */
    public function findByConfirmationToken($token);

     /**
     * Find user by email
     *
     * @param $email
     */
    public function findByEmail($email);

    /**
     * Set specified role to specified user.
     *
     * @param $userId
     * @param $roleId
     * @return mixed
     */
    public function setRole($userId, $roleId);
}