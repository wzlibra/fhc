<?php
namespace Payment;

use WhBase\Module\AbstractModule;

class Module extends AbstractModule
{
	public function getDir() {
		return __DIR__;
	}
	public function getNamespace() {
		return __NAMESPACE__;
	}
}