<?php

namespace Payment\Form;

use WhBase\InputFilter\ProvidesEventsInputFilter;
use Zend\InputFilter\Input;
use Zend\Validator\NotEmpty;
use Zend\Validator\Digits;
use Zend\I18n\Validator\Float;

class OrderInputFilter extends ProvidesEventsInputFilter {
	public function __construct(){
		
		$amount = new Input('amount');
		$amount->getValidatorChain()
				->addValidator(new NotEmpty())
				->addValidator(new Float());
		$this->add($amount);
		
		$adapter = new Input('adapter');
		$adapter->getValidatorChain()->addValidator(new NotEmpty());
		$this->add($adapter);
		
		$gold = new Input('gold');
		$gold->getValidatorChain()->addValidator(new NotEmpty())->addValidator(new Digits());
		$this->add($gold);
		
		$area = new Input('area');
		$area->getValidatorChain()->addValidator(new NotEmpty());
		$this->add($area);
		
		$promoId = new Input('promoId');
		$promoId->getValidatorChain()->addValidator(new NotEmpty());
		$this->add($promoId);
	}
}