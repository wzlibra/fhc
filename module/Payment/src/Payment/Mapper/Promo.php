<?php
namespace Payment\Mapper;

use WhBase\Mapper\AbstractDbMapper;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Stdlib\Hydrator\HydratorInterface;

class Promo extends AbstractDbMapper {
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
	
	public function findByAdapter($adapter)
	{
		$select = $this->getSelect()
		->where(array('adapter' => $adapter));
	
		$entity = $this->select($select)->current();
		$this->getEventManager()->trigger('find', $this, array('entity' => $entity));
		return $entity;
	}
	/**
	 * (non-PHPdoc)
	 * @see \WhBase\Mapper\AbstractDbMapper::insert()
	 */
	public function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
	{
		$result = parent::insert($entity, $tableName, $hydrator);
        $entity->setId($result->getGeneratedValue());
        return $result;
	}
	/**
	 * (non-PHPdoc)
	 * @see \WhBase\Mapper\AbstractDbMapper::update()
	 */
	public function update($entity, $where = null, $tableName = null, HydratorInterface $hydrator = null)
	{
		if (!$where) {
			$where = 'id = ' . $entity->getId();
		}
		return parent::update($entity, $where, $tableName, $hydrator);
	}
	public function delete($where,$tableName=null) {
		return parent::delete($where,$tableName);
	}
}