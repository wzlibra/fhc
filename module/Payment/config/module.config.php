<?php
return array(
		'payment'=>array(
				'paymentSecretKey'=>''
		),
		
		'controllers'=>array(
				'invokables'=>array(
						'PaymentController'=>'Payment\Controller\IndexController',
						'AdminController'=>'Payment\Controller\AdminController',
						'PromoController'=>'Payment\Controller\PromoController'
				)
		),
		
		'service_manager'=>array(
				'aliases'=>array(
						'user_zend_db_adapter'=>'Zend\Db\Adapter\Adapter'
				)
		),
		
		'router'=>array(
				'routes'=>array(
						'payment'=>array(
								'type'=>'Zend\Mvc\Router\Http\Literal',
								'options'=>array(
										'route'=>'/payment',
										'defaults'=>array(
												'controller'=>'PaymentController',
												'action'=>'index'
										)
								)
						),
						'adminPayment'=>array(
								'type'=>'Zend\Mvc\Router\Http\Literal',
								'options'=>array(
										'route'=>'/admin/payment',
										'defaults'=>array(
												'controller'=>'AdminController',
												'action'=>'index'
										)
								)
						),
						'adminPromo'=>array(
								'type'=>'Segment',
								'options'=>array(
										'route'=>'/admin/promo[/]',
										'defaults'=>array(
												'controller'=>'PromoController',
												'action'=>'list'
										)
								),
								'may_terminate'=>true,
								'child_routes'=>array(
										'add'=>array(
												'type'=>'Segment',
												'options'=>array(
														'route'=>'add[/]',
														'defaults'=>array(
																'action'=>'add'
														)
												)
										),
										'page'=>array(
												'type'=>'Segment',
												'options'=>array(
														'route'=>'page/[:page][/]',
														'constraints'=>array(
																'page'=>'[a-zA-Z0-9_-]+'
														),
														'defaults'=>array(
																'action'=>'list'
														)
												)
										),
										'edit'=>array(
												'type'=>'Segment',
												'options'=>array(
														'route'=>'edit/[:id]',
														'constraints'=>array(
																'page'=>'[a-zA-Z0-9_-]+'
														),
														'defaults'=>array(
																'action'=>'edit'
														)
												)
										),
										'delete'=>array(
												'type'=>'Segment',
												'options'=>array(
														'route'=>'delete/[:id]',
														'constraints'=>array(
																'page'=>'[a-zA-Z0-9_-]+'
														),
														'defaults'=>array(
																'action'=>'delete'
														)
												)
										)
								)
						)
				)
		),
		
		'navigation'=>array(
				'admin'=>array(
						'paymentheader'=>array(
								'label'=>'充值管理',
								'class'=>'nav-header disabled',
								'route'=>'empty'
						),
						'payment'=>array(
								'label'=>'充值',
								'route'=>'adminPayment'
						),
						'promoHeader'=>array(
								'label'=>'促销管理',
								'class'=>'nav-header disabled',
								'route'=>'empty'
						),
						'promoList'=>array(
								'label'=>'促销列表',
								'route'=>'adminPromo'
						),
						'promoAdd'=>array(
								'label'=>'创建促销',
								'route'=>'adminPromo/add'
						)
				)
		),
		
		'view_manager'=>array(
				'template_map'=>array(
						'payment/request/index'=>__DIR__ . '/../view/request/index.phtml',
						'payment/response/index'=>__DIR__ . '/../view/response/index.phtml'
				),
				'template_path_stack'=>array(
						'payment'=>__DIR__ . '/../view'
				)
		)
);
