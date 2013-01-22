<?php
namespace Payment\Mapper;

use WhBase\Mapper\AbstractClassMethods;
use Payment\Entity\OrderEntityInterface;

class OrderHydrator extends AbstractClassMethods {
/**
	 * (non-PHPdoc)
	 * @see \WhBase\Mapper\AbstractClassMethods::extract()
	 */
	public function extract($object)
	{
		if (!$object instanceof OrderEntityInterface) {
			throw new Exception\InvalidArgumentException('$object must be an instance of PromoEntityInterface');
		}
		
		//$this->addUnset('currency_name');
		//$this->addUnset('off_percent');
		
		/* @var $object UserInterface*/
		$data = parent::extract($object);
		
		return $data;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \WhBase\Mapper\AbstractClassMethods::hydrate()
	 */
	public function hydrate(array $data, $object)
	{
		if (!$object instanceof OrderEntityInterface) {
			throw new Exception\InvalidArgumentException('$object must be an instance of PromoEntityInterface');
		}
		return parent::hydrate($data, $object);
	}
}