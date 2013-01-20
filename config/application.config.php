<?php
return array (
		'modules' => array (
				'Application',
				'WhBase',
				'User',
				'Admin',
				'Payment',
				'ZendDeveloperTools',
				'BjyProfiler',		),
		/*
		'service_manager' => array(
				'use_defaults' => true,
				'factories'    => array(
						'ServiceListener' => 'WhBase\Mvc\Service\ServiceListenerFactory',
				),
		),
		*/
		'module_listener_options' => array (
				'config_glob_paths' => array (
						'config/autoload/{,*.}{global,local}.php' 
				),
				'module_paths' => array (
						'./module',
						'./vendor' 
				) 
		),
		 
);
