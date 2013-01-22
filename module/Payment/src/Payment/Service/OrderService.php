<?php
namespace Payment\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use WhBase\EventManager\EventProvider;
use Payment\Entity\Order;
use Payment\Entity\OrderStatusEnum;

class OrderService extends EventProvider implements ServiceManagerAwareInterface {
	/**
	 * 
	 * @param string $id
	 * @return \Payment\Entity\Order
	 */
	public function findById($id) {
		return $this->getOrderMapper()->findById($id);
	}
	/**
	 * @param array
	 * @return \Payment\Entity\Order
	 */
	public function openOrder($data) {
		
		$class = new Order();
		$form = $this->getOrderForm();
		$form->bind($class);
		$form->setData($data);
		if (!$form->isValid()) {
			return false;
		}
		/* @var $order \Payment\Entity\Order */
		$order = $form->getData();
		$order->setStatus(OrderStatusEnum::CLEARING);
		//FHCTODO 插入数据时，将promo编码保存
		$this->getOrderMapper()->insert($order);
		
		return $order;
	}
	
	/**
	 * @var \Zend\ServiceManager\ServiceManager
	 */
	protected $serviceManager;
	/* (non-PHPdoc)
	 * @see \Zend\ServiceManager\ServiceManagerAwareInterface::setServiceManager()
	 */
	public function setServiceManager(\Zend\ServiceManager\ServiceManager $serviceManager){
		$this->serviceManager = $serviceManager;
	}
	/**
	 * 
	 * @return \Payment\Form\OrderOpen
	 */
	public function getOrderForm() {
		return $this->serviceManager->get('order_open_form');
	}
	/**
	 *
	 * @return \Payment\Form\OrderOpen
	 */
	public function getOrderOpenForm() {
		return $this->serviceManager->get('order_open_form');
	}
	/**
	 * 
	 * @return \Payment\Mapper\Order
	 */
	public function getOrderMapper() {
		return $this->serviceManager->get('order_mapper');
	}
	/**
	 * 
	 * @return \Payment\Mapper\Promo
	 */
	public function getPromoMapper() {
		return $this->serviceManager->get('promo_mapper');
	}
} 