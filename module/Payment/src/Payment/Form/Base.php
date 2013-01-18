<?php
namespace Payment\Form;

use WhBase\Form\ProvidesEventsForm;
class Base extends ProvidesEventsForm {
	public function __construct()
	{
		parent::__construct();
		
		$this->add(array(
				'name' => 'username',
				'options' => array(
						'label' => 'Username',
				),
				'attributes' => array(
						'type' => 'text'
				),
		));
	}
}