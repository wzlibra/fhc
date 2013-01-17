<?php
return array (
		'controllers' => array (
				'invokables' => array (
						'Admin\Controller\AdminController' => 'Admin\Controller\AdminController',
				) 
		),
		'admin' => array (
				'use_admin_layout' => true,
				'admin_layout_template' => 'layout/admin' 
		),
		
		'router' => array (
				'routes' => array (
						'admin' => array (
								'type' => 'literal',
								'options' => array (
										'route' => '/admin',
										'defaults' => array (
												'controller' => 'Admin\Controller\AdminController',
												'action' => 'index' 
										) 
								),
								'may_terminate' => true,
								'child_routes' => array (
										'stock' => array (
												'type' => 'Literal',
												'options' => array (
														'route' => '/stock',
														'defaults' => array (
																'controller' => 'Stock\Controller\Stock',
																'action' => 'index' 
														),
												) ,
												'may_terminate' => true,
												'child_routes' => array (
														'stock_child' => array(
																'type' => 'Segment',
																'options' => array (
																		'route' => '/[:action]',
																		'constraints' => array(
																				'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
																		),
																		'defaults' => array (
																		),
																) ,
														),
												),
										) 
								) 
						) 
				) 
		),
		
		'navigation' => array (
				'admin' => array (
						'mynavigation' => array (
								'label' => 'stock',
								'route' => 'admin/stock'
						)
				),
		),
		
		'view_manager' => array (
				'template_path_stack' => array (
						__DIR__ . '/../view' 
				) 
		) 
);
