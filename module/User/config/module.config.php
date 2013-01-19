<?php
return array (
		'view_manager' => array (
				'template_path_stack' => array (
						'user' => __DIR__ . '/../view' 
				) 
		),
		'controllers' => array (
				'invokables' => array (
						'user' => 'User\Controller\UserController',
						'userAdmin' => 'User\Controller\AdminController' 
				) 
		),
		'service_manager' => array (
				'aliases' => array (
						'user_zend_db_adapter' => 'Zend\Db\Adapter\Adapter' 
				) 
		),
		'router' => array (
				'routes' => array (
						'user' => array (
								'type' => 'Literal',
								'priority' => 1000,
								'options' => array (
										'route' => '/user',
										'defaults' => array (
												'controller' => 'user',
												'action' => 'index' 
										) 
								),
								'may_terminate' => true,
								'child_routes' => array (
										'login' => array (
												'type' => 'Literal',
												'options' => array (
														'route' => '/login',
														'defaults' => array (
																'controller' => 'user',
																'action' => 'login' 
														) 
												) 
										),
										'authenticate' => array (
												'type' => 'Literal',
												'options' => array (
														'route' => '/authenticate',
														'defaults' => array (
																'controller' => 'user',
																'action' => 'authenticate' 
														) 
												) 
										),
										'logout' => array (
												'type' => 'Literal',
												'options' => array (
														'route' => '/logout',
														'defaults' => array (
																'controller' => 'user',
																'action' => 'logout' 
														) 
												) 
										),
										'register' => array (
												'type' => 'Literal',
												'options' => array (
														'route' => '/register',
														'defaults' => array (
																'controller' => 'user',
																'action' => 'register' 
														) 
												) 
										),
										'changepassword' => array (
												'type' => 'Literal',
												'options' => array (
														'route' => '/change-password',
														'defaults' => array (
																'controller' => 'user',
																'action' => 'changepassword' 
														) 
												),
												'may_terminate' => true,
												'child_routes' => array (
														'query' => array (
																'type' => 'Query' 
														) 
												) 
										),
										'changeemail' => array (
												'type' => 'Literal',
												'options' => array (
														'route' => '/change-email',
														'defaults' => array (
																'controller' => 'user',
																'action' => 'changeemail' 
														) 
												),
												'may_terminate' => true,
												'child_routes' => array (
														'query' => array (
																'type' => 'Query' 
														) 
												) 
										) 
								) 
						),
						'adminUser' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/admin/user[/:action][/:id]',
										'constraints' => array (
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id' => '[0-9]+' 
										),
										'defaults' => array (
												'controller' => 'userAdmin',
												'action' => 'index' 
										) 
								),
						) 
				) 
		),
		'navigation' => array (
				'admin' => array (
						'user' => array (
								'label' => '用户管理',
								'title' => '用户管理',
								'route' => 'adminUser',
						) 
				) 
		) 
);
