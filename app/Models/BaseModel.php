<?php

namespace App\Models;

use Phalcon\Mvc\Model;
use App\Presenters\Exceptions\PresenterNotFoundException;

class BaseModel extends Model
{
    /**
     * Get model presenter
     * 
     * @param  string $presenterName
     * @return \Phalcon\Mvc\Model
     */
    public function getPresenter($presenterName = null)
    {
        if ($presenterName === null) {
            $reflector = new \ReflectionClass($this);
            $modelName = substr(strrchr($reflector->name, "\\"), 1);
            $presenterName = $modelName . 'Presenter';
        }

        $presenterClass = str_replace($modelName, $presenterName, $reflector->name);
        $presenterClass = str_replace('Models', 'Presenters', $presenterClass);
        
        if (!class_exists($presenterClass)) {
            throw new PresenterNotFoundException('Presenter is invalid!');
        }

        $presenterInstance = new $presenterClass;

        return $presenterInstance->setModel(new $reflector->name);
    }

}