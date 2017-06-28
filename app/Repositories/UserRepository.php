<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Abstracts\AbstractRepository;
use App\Models\User;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    /**
     * @var Phalcon\Mvc\Model
     */
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function test()
    {
        return 'test user repository';
    }
}
