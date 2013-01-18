<?php
return array (
		'payment' => array (
				'request_url_path' => '/payment/request',
				'return_url_path' => '/payment/response',
				'cancel_url_path' => '/payment/cancel',
				'paymentSecretKey' => '' 
		),
		
		'controllers' => array(
				'invokables' => array(
						'PaymentCon' => 'Payment\Controller\IndexController',
				),
		),
		
		'router' => array (
				'routes' => array (
						'payment' => array (
								'type' => 'Zend\Mvc\Router\Http\Literal',
								'options' => array (
										'route' => '/payment',
										'defaults' => array (
												'controller' => 'PaymentCon',
												'action' => 'index' 
										) 
								) 
						) 
				) 
		),
		
		'view_manager' => array (
				'template_map' => array (
						'payment/request/index' => __DIR__ . '/../view/request/index.phtml',
						'payment/response/index' => __DIR__ . '/../view/response/index.phtml' 
				),
				'template_path_stack' => array(
						'payment'=>__DIR__.'/../view',
				), 
				
		) 
);
