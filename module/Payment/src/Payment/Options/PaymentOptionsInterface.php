<?php
namespace Payment\Options;

interface PaymentOptionsInterface {
	public function setPaymentSecretKey($key);
	public function getPaymentSecretKey();
}