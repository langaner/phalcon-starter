<?php

namespace Backend\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
	public function testAction()
	{
		var_dump($this->userRepository->test());
		var_dump($this->userService->test());
		var_dump($this->userRepository->getModel()->getPresenter()->test);

		return 'backend';
	}
}
