<?php

namespace Payment\Form;

use WhBase\Form\ProvidesEventsForm;
use Payment\Entity\AdapterEnum;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Submit;
use Payment\Entity\CurrencyEnum;
use Zend\Form\Element\Number;

class PromoBase extends ProvidesEventsForm {
	public function __construct() {
		parent::__construct ();
		
		$name = new Text ( 'name' );
		$this->add ( $name );
		
		$desc = new Textarea ( 'desc' );
		$this->add ( $desc );
		
		$adapter = new Select ( 'adapter' );
		$adapter->setValueOptions ( array (
				AdapterEnum::ALIPEY => AdapterEnum::ALIPEY_NAME,
				AdapterEnum::YEEPEY => AdapterEnum::YEEPEY_NAME 
		) );
		$this->add ( $adapter );
		
		$formula = new Textarea('formula');
		$this->add($formula);
		
		$currency = new Select ( 'currency' );
		$currency->setValueOptions ( array (
				CurrencyEnum::QB => CurrencyEnum::QB_NAME,
				CurrencyEnum::RMB => CurrencyEnum::RMB_NAME 
		) );
		$this->add($currency);
		
		$gold = new Number('gold');
		$this->add($gold);
		
		$off = new Number('off');
		$this->add($off);
				
		$id = new Hidden ( 'id' );
		$this->add ( $id );
		
		$submit = new Submit ( 'submit' );
		$this->add ( $submit );
	}
}