<?php

namespace Payment;

use WhBase\Module\AbstractModule;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods;
use Payment\Mapper\PromoHydrator;
use Payment\Entity\Order;
use Payment\Mapper\OrderHydrator;
use Payment\Form\OrderOpen;
use Payment\Form\OrderOpenFilter;

class Module extends AbstractModule implements ServiceProviderInterface {
	public function getDir() {
		return __DIR__;
	}
	public function getNamespace() {
		return __NAMESPACE__;
	}
	public function getServiceConfig() {
		return array (
				'invokables' => array(
						'promo_service' => 'Payment\Service\PromoService',
						'order_service' => 'Payment\Service\OrderService',
				),
				'factories' => array (
						'payment_module_options' => function ($sm) {
							$config = $sm->get('Config');
							return new Options\ModuleOptions(isset($config['payment']) ? $config['payment'] : array());
						},
						'promo_mapper' => function($sm) {
							$options = $sm->get('payment_module_options');
							/* @var $options \Payment\Options\PromoOptionsInterface */
							$mapper = new Mapper\Promo();
							$mapper->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
							$entityClass = $options->getPromoEntityClass();
							$mapper->setEntityPrototype(new $entityClass);
							$mapper->setHydrator(new PromoHydrator());
							return $mapper;
						},
						'promo_add_form' => function ($sm) {
							$form = new Form\PromoAdd();
							$form->setInputFilter(new Form\PromoInputFilter());
							$form->setHydrator(new PromoHydrator());
							return $form;
						},
						'promo_edit_form' => function ($sm) {
							$form = new Form\PromoEdit();
							$form->setInputFilter(new Form\PromoEditFilter());
							$form->setHydrator(new PromoHydrator());
							return $form;
						},
						'order_mapper' => function($sm) {
							$mapper = new Mapper\Order();
							$mapper->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
							$mapper->setEntityPrototype(new Order());
							$mapper->setHydrator(new OrderHydrator());
							return $mapper;
						},
						'order_open_form' => function($sm) {
							$form = new OrderOpen();
							$form->setInputFilter(new OrderOpenFilter());
							$form->setHydrator(new OrderHydrator());
							return $form;
						}
				) 
		);
	}
}