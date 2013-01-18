<?php

namespace Payment\Entity;

use Zend\XmlRpc\Value\Double;
use Zend\XmlRpc\Value\DateTime;
use Zend\XmlRpc\Value\String;
class Log implements LogInterface {
	/**
	 * 
	 * @var int
	 */
	protected $id;
	/**
	 * 
	 * @var String
	 */
	protected $secretKey;
	/**
	 * 
	 * @var String
	 */
	protected $logStep;
	/**
	 * 
	 * @var String
	 */
	protected $service;
	/**
	 * 
	 * @var String
	 */
	protected $adapter;
	/**
	 * 
	 * @var Double
	 */
	protected $amount;
	/**
	 * 
	 * @var DateTime
	 */
	protected $requestTime;
	/**
	 * 
	 * @var DateTime
	 */
	protected $responseTime;
	/**
	 * 
	 * @var String
	 */
	protected $responseData;
	/**
	 * 
	 * @var String
	 */
	protected $requestData;
	/**
	 * 
	 * @var int
	 */
	protected $user_id;
	/* (non-PHPdoc)
	 * @see \Payment\Entity\LogInterface::setId()
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/* (non-PHPdoc)
	 * @see \Payment\Entity\LogInterface::getId()
	 */
	public function getId() {
		return $this->id;
	}

	/* (non-PHPdoc)
	 * @see \Payment\Entity\LogInterface::setSecretKey()
	 */
	public function setSecretKey($secretKey) {
		$this->secretKey = $secretKey;
		return $this;
	}

	/* (non-PHPdoc)
	 * @see \Payment\Entity\LogInterface::getSecretKey()
	 */
	public function getSecretKey() {
		return $this->secretKey;
	}

	/* (non-PHPdoc)
	 * @see \Payment\Entity\LogInterface::setLogStep()
	 */
	public function setLogStep($logStep) {
		$this->logStep = $logStep;
		return $this;
	}

	/* (non-PHPdoc)
	 * @see \Payment\Entity\LogInterface::getLogStep()
	 */
	public function getLogStep() {
		return $this->logStep;
	}

}