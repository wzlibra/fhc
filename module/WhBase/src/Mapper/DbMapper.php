<?php
namespace WhBase\Mapper;

use Zend\Stdlib\Hydrator\HydratorInterface;

class DbMapper extends AbstractDbMapper {
	/**
	 *
	 * @return Object
	 */
	public function findById($id) {
		if (!$id) {return;}
	
		$select = $this->getSelect()->where(array('id'=>$id));
		$entity = $this->select($select)->current();
		$this->getEventManager()->trigger('find',$this,array('entity'=>$entity));
		return $entity;
	}
	
	public function guid(){
		$uuid = '';
		if (function_exists('com_create_guid')){
			$uuid = com_create_guid();
		}else{
			mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			$uuid = chr(123)// "{"
			.substr($charid, 0, 8).$hyphen
			.substr($charid, 8, 4).$hyphen
			.substr($charid,12, 4).$hyphen
			.substr($charid,16, 4).$hyphen
			.substr($charid,20,12)
			.chr(125);// "}"
		}
		$uuid = str_replace(array('{','}','-'), '', $uuid);
		return $uuid;
	}
	/**
	 * (non-PHPdoc)
	 * @see \Zend\Db\Adapter\Driver\ResultInterface
	 */
	public function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
	{
		$entity->setId($this->guid());
		$result = parent::insert($entity, $tableName, $hydrator);
		
		return $result;
	}
	/**
	 * (non-PHPdoc)
	 * @see \WhBase\Mapper\AbstractDbMapper::update()
	 */
	public function update($entity, $where = null, $tableName = null, HydratorInterface $hydrator = null)
	{
		if (!$where) {
			$where = "id = '".$entity->getId()."'";
		}
		return parent::update($entity, $where, $tableName, $hydrator);
	}
	/**
	 * (non-PHPdoc)
	 * @see \WhBase\Mapper\AbstractDbMapper::delete()
	 */
	public function delete($where,$tableName=null) {
		return parent::delete($where,$tableName);
	}
}