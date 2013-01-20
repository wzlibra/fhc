<?php
namespace Payment\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements PromoOptionsInterface,PaymentOptionsInterface {
	/**
	 * 
	 * @var string
	 */
	protected $promoEntityClass = 'Payment\Entity\Promo';
	protected $paymentSecretKey = '';
	
	/* (non-PHPdoc)
	 * @see \Payment\src\Payment\Options\PromoOptionsInterface::getPromoEntityClass()
	 */
	public function getPromoEntityClass() {
		return $this->promoEntityClass;
	}

	/* (non-PHPdoc)
	 * @see \Payment\src\Payment\Options\PromoOptionsInterface::setPromoEntityClass()
	 */
	public function setPromoEntityClass($entity) {
		$this->promoEntityClass = $entity;
	}
	/* (non-PHPdoc)
	 * @see \Payment\Options\PaymentOptionsInterface::setPaymentSecretKey()
	 */
	public function setPaymentSecretKey($key) {
		
	}

	/* (non-PHPdoc)
	 * @see \Payment\Options\PaymentOptionsInterface::getPaymentSecretKey()
	 */
	public function getPaymentSecretKey() {
		
	}


}