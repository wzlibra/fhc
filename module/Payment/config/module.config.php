<?php
return array (
		'payment' => array (
				'request_url_path' => '/payment/request',
				'return_url_path' => '/payment/response',
				'cancel_url_path' => '/payment/cancel',
				'paymentSecretKey' => '' 
		),
		
		'controllers' => array (
				'invokables' => array (
						'PaymentCon' => 'Payment\Controller\IndexController',
						'PaymentAdmin' => 'Payment\Controller\AdminController',
						'PromoCon' => 'Payment\Controller\PromoController' 
				) 
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
						),
						'adminPayment' => array (
								'type' => 'Zend\Mvc\Router\Http\Literal',
								'options' => array (
										'route' => '/admin/payment',
										'defaults' => array (
												'controller' => 'PaymentAdmin',
												'action' => 'index' 
										) 
								) 
						),
						'adminPromo' => array (
								'type' => 'Literal',
								'options' => array (
										'route' => '/admin/promo',
										'defaults' => array (
												'controller' => 'PromoCon',
												'action' => 'list' 
										) 
								),
								'may_terminate' => true,
								'child_routes' => array (
										'add' => array (
												'type' => 'literal',
												'options' => array (
														'route' => '/add',
														'defaults' => array (
																'controller' => 'PromoCon',
																'action' => 'add' 
														) 
												) 
										) 
								) 
						) 
				) 
		),
		
		'navigation' => array (
				'admin' => array (
						'paymentheader' => array('label'=>'充值管理','class'=>'nav-header disabled','route'=>'empty'),
						'payment' => array ('label' => '充值','route' => 'adminPayment'),
						'promoHeader' => array('label'=>'促销管理','class'=>'nav-header disabled','route'=>'empty'),
						'promoList' => array ('label' => '促销列表','route' => 'adminPromo'),
						'promoAdd' => array('label'=>'创建促销','route'=>'adminPromo/add'),
				) 
		),
		
		'view_manager' => array (
				'template_map' => array (
						'payment/request/index' => __DIR__ . '/../view/request/index.phtml',
						'payment/response/index' => __DIR__ . '/../view/response/index.phtml' 
				),
				'template_path_stack' => array (
						'payment' => __DIR__ . '/../view' 
				) 
		) 
);
