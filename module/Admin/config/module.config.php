<?php
return array (
		'controllers' => array (
				'invokables' => array (
						'Admin\Controller\AdminController' => 'Admin\Controller\AdminController' 
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
								) 
						),
						'empty' => array (
								'type' => 'Zend\Mvc\Router\Http\Literal',
								'options' => array (
										'route' => '#',
								)
						)
				) 
		),
		
		'view_manager' => array (
				'template_path_stack' => array (
						__DIR__ . '/../view' 
				) 
		) 
);
