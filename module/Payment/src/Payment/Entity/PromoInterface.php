<?php
namespace Payment\Entity;

interface PromoInterface {
	public function getId();
	public function setId($id);
	public function getAdapter();
	public function setAdapter($adapter);
	public function getCurrency();
	public function setCurrency($currency);
	public function getFormula();
	public function setFormula($formula);
	public function getGold();
	public function setGold($gold);
	public function getOff();
	public function setOff($off);
	public function getName();
	public function setName($name);
	public function getDesc();
	public function setDesc($desc);
	public function getAmount();
	public function setAmount($amount);
	
	public function getCurrencyName();
	public function getOffPercent();
}