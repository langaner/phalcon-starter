<?php

namespace App\Repositories\Abstracts;

use App\Repositories\Interfaces\AbstractRepositoryInterface;

class AbstractRepository implements AbstractRepositoryInterface
{
    /**
     * @var Phalcon\Mvc\Model
     */
    protected $model;
    
    public function getModel()
    {
        return $this->model;
    }
}
