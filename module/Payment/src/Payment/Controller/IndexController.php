<?php
namespace Payment\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Payment\Entity\AdapterEnum;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {
	
	public function indexAction() {
		
	}
	
	public function yeepayAction() {
		$view = new ViewModel();
		
		$promoByadapterGroupCurrency = $this->getPromoService()->findByAdapterGroupCurrency(AdapterEnum::YEEPEY);
		$view->setVariable('promoGroupCurrency', $promoByadapterGroupCurrency);
		return $view;
	}
	
	public function alipayAction() {
		
	}
	
	/**
	 *
	 * @return \Payment\Service\Promo
	 */
	public function getPromoService(){
		return $this->getServiceLocator()->get('promo_service');
	}
}