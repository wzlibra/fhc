<?php

namespace Payment\Form;

use WhBase\InputFilter\ProvidesEventsInputFilter;
use Zend\InputFilter\Input;
use Zend\Validator;

class PromoInputFilter extends ProvidesEventsInputFilter {
	public function __construct() {
		
		$name = new Input('name');
		$name->getValidatorChain()
			->addValidator(new Validator\StringLength(3,255))
			->addValidator(new Validator\NotEmpty());
		$this->add ($name);
		
		$desc = new Input('desc');
		$desc->getValidatorChain()
			->addValidator(new Validator\NotEmpty());
		$this->add($desc);
		
		$formula = new Input('formula');
		$formula->getValidatorChain()->addValidator(new Validator\NotEmpty());
		$this->add($formula);
		
		$gold = new Input('gold');
		$gold->getValidatorChain()
			->addValidator(new Validator\NotEmpty());
		$this->add($gold);
		
		$off = new Input('off');
		$off->getValidatorChain()->addValidator(new Validator\NotEmpty());
		$this->add($off);
	}
}