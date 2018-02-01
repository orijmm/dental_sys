<?php

namespace App\Repositories\Session;

use App\Session;
use App\Repositories\Repository;

class EloquentSession extends Repository implements SessionRepository
{
    /**
     * EloquentSession constructor
     *
     * @param Session $Session
     */
    public function __construct(Session $Session)
    {
        parent::__construct($Session);
    }

}