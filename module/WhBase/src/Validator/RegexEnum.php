<?php

namespace WhBase\Validator;

class RegexEnum {
	/**
	 * 匹配正整数
	 * 
	 * @var unknown
	 */
	CONST POSITIVE_INT = "^[0-9]*[1-9][0-9]*$";
	/**
	 * 正浮点数
	 * 
	 * @var String
	 */
	CONST POSITIVE_FLOAT = "^(-?/d+)(/./d+)?$";
}