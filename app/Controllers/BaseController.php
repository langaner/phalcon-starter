<?php 

namespace App\Controllers;

use Phalcon\Mvc\Controller;

/**
 * The Base controller
 */
class BaseController extends Controller
{
	/**
	 * Render view
	 *
	 * @param string $view
	 * @param array $params
	 * @param integer $code
	 * @return void
	 */
	public function view($view, array $params = [], $code = 200)
	{
		$content = $this->view->render($view, $params);

		$this->response->setStatusCode($code, null);
		$this->response->setContent($content);
	}

	/**
	 * Render json response
	 *
	 * @param array $content
	 * @param integer $code
	 * @param string $type
	 * @return void
	 */
	public function json($content = [], $code = 200, $type = null)
	{
		$this->response->setStatusCode($code, $type);
		$this->response->setJsonContent($content);
	}

	/**
	 * Render response
	 *
	 * @param string $content
	 * @param integer $code
	 * @param string $type
	 * @return void
	 */
	public function response($content = '', $code = 200, $type = null)
	{
		$this->response->setStatusCode($code, $type);
		$this->response->setContent($content);
	}
	
}
