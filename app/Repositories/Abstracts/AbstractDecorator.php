<?php

namespace App\Repositories\Abstracts;

use App\Repositories\Interfaces\AbstractDecoratorInterface;

class AbstractDecorator implements AbstractDecoratorInterface
{
    public $repository;

	public function setRepository($repository)
	{
		$this->repository = $repository;

		return $this;
	}

	public function getRepository()
	{
		 return $this->repository;
	}

    public function __call($method, $args)
	{
		if (method_exists($this->repository, $method)) {
			return call_user_func_array([$this->repository, $method], $args);
		}
        
		return call_user_func_array([$this->repository->model, $method], $args);
	}
}
