<?php
namespace Payment\Entity;

class Promo implements PromoEntityInterface {
	/**
	 * 促销ID
	 * @var id
	 */
	protected $id;
	/**
	 * 促销适配器如支付宝，易宝
	 * @var string
	 */
	protected $adapter;
	/**
	 * 钱币类型
	 * @var string
	 */
	protected $currency;
	/**
	 * 促销公式
	 * @var string
	 */
	protected $formula;
	/**
	 * 每单位转换金币数
	 * @var int
	 */
	protected $gold;
	/**
	 * 打折率
	 * @var int
	 */
	protected $off;
	/**
	 * 名称
	 * @var String
	 */
	protected $name;
	/**
	 * 说明
	 * @var String
	 */
	protected $desc;
	/**
	 * 
	 * @var int
	 */
	protected $amount;
	
	public function getCurrencyName() {
		switch ($this->currency) {
			case CurrencyEnum::QB:
				return CurrencyEnum::QB_NAME;
				break;
			case CurrencyEnum::RMB:
				return CurrencyEnum::RMB_NAME;
				break;
		}
	}
	public function getOffPercent() {
		return $this->off/100;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getAdapter() {
		return $this->adapter;
	}
	public function setAdapter($adapter) {
		$this->adapter = $adapter;
		return $this;
	}
	public function getCurrency() {
		return $this->currency;
	}
	public function setCurrency($currency) {
		$this->currency = $currency;
		return $this;
	}
	
	public function getFormula() {
		return $this->formula;
	}
	public function setFormula($formula) {
		$this->formula = $formula;
		return $this;
	}
	public function getGold() {
		return $this->gold;
	}
	public function setGold($gold) {
		$this->gold = $gold;
		return $this;
	}
	public function getOff() {
		return $this->off;
	}
	public function setOff($off) {
		$this->off = $off;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getDesc() {
		return $this->desc;
	}
	public function setDesc($desc) {
		$this->desc = $desc;
		return $this;
	}
	public function getAmount() {
		return $this->amount;
	}
	public function setAmount($amount) {
		$this->amount = $amount;
		return $this;
	}
}