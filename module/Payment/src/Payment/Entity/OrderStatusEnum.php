<?php
namespace Payment\Entity;

class OrderStatusEnum {
	const CREATE = 'create';
	const CREATE_NAME = '创建订单';
	const PAYMENTING = 'paymenting';
	const PAYMENTING_NAME = '充值进行中';
	const PAYMENTED = 'paymented';
	const PAYMENTED_NAME = '充值完成';
	CONST CLEARING = 'clearing';
	CONST CLEARING_NAME = '结算进行中';
	CONST CLOSE = 'close';
	CONST CLOSE_NAME = '存单';
}