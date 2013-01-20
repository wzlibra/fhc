<?php
namespace Payment\Form;

use Zend\InputFilter\Input;
use Zend\Validator;

class PromoEditFilter extends PromoInputFilter {
	public function __construct() {
		$id = new Input('id');
		$id->getValidatorChain()->addValidator(new Validator\NotEmpty());
		$this->add($id);
	}
}