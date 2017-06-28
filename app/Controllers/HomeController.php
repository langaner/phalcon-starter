<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
	public function showAction()
	{
		return $this->view('welcome');
	}
}
