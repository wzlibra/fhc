<?php
namespace Payment\Entity;

interface OrderEntityInterface {
	public function getId();
	public function setId($id);
	public function getStatus();
	public function setStatus($status);
	public function getAdapter();
	public function setAdapter($adapter);
	public function getAmount();
	public function setAmount($amount);
	public function getGold();
	public function setGold($gold);
	public function getArea();
	public function setArea($area);
	public function getPromoId();
	public function setPromoId($promoId);
}