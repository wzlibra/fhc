<?php

namespace Payment;

use WhBase\Module\AbstractModule;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

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
						'promo_form' => function ($sm) {
							$form = new Form\PromoAdd();
							$form->setInputFilter(new Form\PromoInputFilter());
							return $form;
						} 
				) 
		);
	}
}