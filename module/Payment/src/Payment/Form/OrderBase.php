<?php
namespace Payment\Form;

use Zend\Form\Element\Text;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Submit;
use WhBase\Form\ProvidesEventsForm;

class OrderBase extends ProvidesEventsForm {
	public function __construct() {
		parent::__construct ();
		
		$amount = new Text('amount');
		$amount->setAttribute('id', 'amount');
		$this->add($amount);
		
		$adapter = new Hidden('adapter');
		$adapter->setAttribute('id', 'adapter');
		$this->add($adapter);
		
		$gold = new Hidden('gold');
		$gold->setAttribute('id', 'gold');
		$this->add($gold);
		
		$area = new Hidden('area');
		$area->setAttribute('id', 'area');
		$this->add($area);
		
		$promoId = new Hidden('promoId');
		$promoId->setAttribute('id', 'promoId');
		$this->add($promoId);
		
		$id = new Hidden ( 'id' );
		$this->add ( $id );
		
		$submit = new Submit('submit' );
		$this->add ( $submit );
	}
}