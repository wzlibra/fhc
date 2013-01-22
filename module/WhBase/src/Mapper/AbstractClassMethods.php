<?php
namespace WhBase\Mapper;

use Zend\Stdlib\Hydrator\ClassMethods;

abstract class AbstractClassMethods extends ClassMethods {
	protected $unsets = array();
	/**
	 * 过滤entity中的方法如:getAllName方法需要addUnset('all_name');
	 * @param string $name
	 */
	public function addUnset($name) {
		if (!in_array($this->unsets, array($name)) ){
			$this->unsets[] = $name;
		}
	}
	
	/**
	 * Extract values from an object
	 *
	 * @param  object $object
	 * @return array
	 * @throws Exception\InvalidArgumentException
	 */
	public function extract($object)
	{
		/* @var $object UserInterface*/
		$data = parent::extract($object);
	
		if (count($this->unsets)) {
			foreach ($this->unsets as $name) {
				unset($data[$name]);
			}
		}
	
		//$data = $this->mapField('id', 'user_id', $data);
		return $data;
	}
	
	/**
	 * Hydrate $object with the provided $data.
	 *
	 * @param  array $data
	 * @param  object $object
	 * @return UserInterface
	 * @throws Exception\InvalidArgumentException
	 */
	public function hydrate(array $data, $object)
	{
		//$data = $this->mapField('user_id', 'id', $data);
		return parent::hydrate($data, $object);
	}
}