<?php
namespace Payment\Mapper;

use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use WhBase\Mapper\DbMapper;

class Promo extends DbMapper {
	protected $tableName  = 'payment_promo';
	/**
	 * 
	 * @param number $page
	 * @return \Zend\Paginator\Paginator
	 */
	public function getPaginator($page = 1) {
		
		$adapter = new DbSelect($this->getSelect(), $this->getDbSlaveAdapter());
		$paginator = new Paginator($adapter);
		$paginator->setCurrentPageNumber($page);
		$paginator->setDefaultItemCountPerPage(10);
		
		return $paginator;
	}
	/**
	 * 
	 * @return \Payment\Entity\Promo
	 */
	public function findById($id) {
		if (!$id) {return;}
		
		$select = $this->getSelect()->where(array('id'=>$id));
		$entity = $this->select($select)->current();
		$this->getEventManager()->trigger('find',$this,array('entity'=>$entity));
		return $entity;
	}
	/**
	 * 
	 * @param String $adapter
	 * @return \Zend\Db\ResultSet\HydratingResultSet
	 */
	public function findByAdapter($adapter)
	{
		$select = $this->getSelect()
		->where(array('adapter' => $adapter));
	
		$entities = $this->select($select);
		
		return $entities;
	}
}