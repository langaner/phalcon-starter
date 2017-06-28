<?php

namespace App\Repositories\Decorator;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Abstracts\AbstractDecorator;

class UserDecorator extends AbstractDecorator implements UserRepositoryInterface
{
    public function test()
    {
        // return $this->repository->test();
        return 'user decorated test';
    }
}
