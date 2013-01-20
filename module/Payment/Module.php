<?php

namespace Payment;

use WhBase\Module\AbstractModule;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

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
						'promo_service' => 'Payment\Service\Promo',
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
							$mapper->setHydrator(new ClassMethods());
							return $mapper;
						},
						'promo_add_form' => function ($sm) {
							$form = new Form\PromoAdd();
							$form->setInputFilter(new Form\PromoInputFilter());
							return $form;
						},
						'promo_edit_form' => function ($sm) {
							$form = new Form\PromoEdit();
							$form->setInputFilter(new Form\PromoEditFilter());
							return $form;
						} 
				) 
		);
	}
}