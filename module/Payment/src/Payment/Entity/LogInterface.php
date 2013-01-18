<?php
namespace Payment\Entity;

interface LogInterface {
	/**
	 * 
	 * @param int $id
	 * @return LogInterface
	 */
	public function setId($id);
	/**
	 * @return int
	 */
	public function getId();
	/**
	 * 
	 * @param String $secretKey
	 * @return LogInterface
	 */
	public function setSecretKey($secretKey);
	/**
	 * @return String
	 */
	public function getSecretKey();
	/**
	 * 
	 * @param String $logStep
	 * @return LogInterface
	 */
	public function setLogStep($logStep);
	public function getLogStep();
}
/**
`id` int(11) NOT NULL AUTO_INCREMENT,
`secretKey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`logStep` enum('request','response','cancel') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'request',
`service` enum('paypal','alipay') COLLATE utf8_unicode_ci NOT NULL,
`adapter` enum('paypalec','alipayec') COLLATE utf8_unicode_ci NOT NULL,
`amount` decimal(10,2) NOT NULL,
`requestTime` datetime NOT NULL,
`responseTime` datetime DEFAULT NULL,
`responseData` text COLLATE utf8_unicode_ci,
`requestData` text COLLATE utf8_unicode_ci,
`user_id` int(11) DEFAULT NULL,
*/