<?php
namespace WhBase\Mvc\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class AbstractController extends AbstractActionController {
	/**
	 * Get request object
	 *
	 * @return \Zend\Http\Request
	 */
	public function getRequest()
	{
		return parent::getRequest();
	}
}