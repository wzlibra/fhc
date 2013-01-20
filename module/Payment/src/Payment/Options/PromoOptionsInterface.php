<?php

namespace Payment\Options;

interface PromoOptionsInterface {
	/**
	 * @return String
	 */
	public function getPromoEntityClass();
	/**
	 * 
	 * @param string $entity
	 */
	public function setPromoEntityClass($entity);
}

?>