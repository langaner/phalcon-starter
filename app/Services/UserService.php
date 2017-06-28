<?php

namespace App\Services;

class UserService
{
    /**
     * @var App\Repositories\Repository\UserRepository | App\Repositories\Decorator\UserDecorator
     */
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function test()
    {
        return 'user service test';
        // return $this->repository->test();
    }
}
