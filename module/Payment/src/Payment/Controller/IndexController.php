<?php
namespace Payment\Controller;

use Payment\Entity\AdapterEnum;
use Zend\View\Model\ViewModel;
use WhBase\Mvc\Controller\AbstractController;

class IndexController extends AbstractController {
	
	public function indexAction() {
		
	}
	
	public function orderAction() {
		$id = $this->params()->fromRoute('id');
		if (!$id) {
			throw new Exception('数据异常');
		}
		$order = $this->getOrderService()->findById($id);
		$promo = $this->getPromoService()->findById($id);
		return array('order'=>$order,'promo'=>$promo);
	}
	
	public function yeepayAction() {
		$view = new ViewModel();
		$request = $this->getRequest();
		$form = $this->getOrderService()->getOrderOpenForm();
		
		if ($request->isPost()) {
			$post = $request->getPost();
			$form->setData($post);
			print_r($form->isValid());
			if ($form->isValid()) {
				print_r($form->getData());
				$order = $this->getOrderService()->openOrder($form->getData());
				if ($order) {
					return $this->redirect()->toUrl('/payment/order/'.$order->getId());
				}
			}
		}
		
		$promoByadapterGroupCurrency = $this->getPromoService()->findByAdapterGroupCurrency(AdapterEnum::YEEPEY);
		$view->setVariable('promoGroupCurrency', $promoByadapterGroupCurrency);
		$view->setVariable('form', $form);
		
		return $view;
	}
	
	public function alipayAction() {
		
	}
	
	/**
	 *
	 * @return \Payment\Service\PromoService
	 */
	public function getPromoService(){
		return $this->getServiceLocator()->get('promo_service');
	}
	/**
	 * 
	 * @return \Payment\Service\OrderService
	 */
	public function getOrderService() {
		return $this->getServiceLocator()->get('order_service');
	}
}