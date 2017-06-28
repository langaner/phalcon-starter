<?php 

namespace App\Presenters\Abstracts;

abstract class AbstractPresenter {

	/**
	 * @var mixed
	 */
	protected $model;

	public function setModel($model)
	{
		$this->model = $model;

		return $this;
	}

	public function getModel()
	{
		 return $this->model;
	}

	/**
	 * Allow for property-style retrieval
	 *
	 * @param $property
	 * @return mixed
	 */
	public function __get($property)
	{
		if (method_exists($this, $property)) {
			return $this->{$property}();
		}

		return $this->model->{$property}();
	}

} 