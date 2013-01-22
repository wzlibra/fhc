<?php
namespace Payment\Entity;

class Order implements OrderEntityInterface {
	/**
	 * 
	 * @var int
	 */
	protected $id;
	/**
	 * 
	 * @var string
	 */
	protected $status;
	/**
	 * 
	 * @var string
	 */
	protected $adapter;
	/**
	 * FHCTODO 添加充值货币
	 */
	/**
	 * 
	 * @var int
	 */
	protected $amount;
	/**
	 * 
	 * @var int
	 */
	protected $gold;
	/**
	 * 
	 * @var string
	 */
	protected $area;
	/**
	 * 
	 * @var int
	 */
	protected $promoId;
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getStatus() {
		return $this->status;
	}
	public function setStatus($status) {
		$this->status = $status;
		return $this;
	}
	public function getAdapter() {
		return $this->adapter;
	}
	public function setAdapter($adapter) {
		$this->adapter = $adapter;
		return $this;
	}
	public function getAmount() {
		return $this->amount;
	}
	public function setAmount($amount) {
		$this->amount = $amount;
		return $this;
	}
	public function getGold() {
		return $this->gold;
	}
	public function setGold($gold) {
		$this->gold = $gold;
		return $this;
	}
	public function getArea() {
		return $this->area;
	}
	public function setArea($area) {
		$this->area = $area;
		return $this;
	}
	public function getPromoId() {
		return $this->promoId;
	}
	public function setPromoId($promoId) {
		$this->promoId = $promoId;
		return $this;
	}
}