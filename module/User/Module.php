<?php

namespace User;

use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ServiceProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/',
                ),
            ),
        );
    }

    public function getConfig($env = null)
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getControllerPluginConfig()
    {
        return array(
            'factories' => array(
                'UserAuthentication' => function ($sm) {
                    $serviceLocator = $sm->getServiceLocator();
                    $authService = $serviceLocator->get('user_auth_service');
                    $authAdapter = $serviceLocator->get('User\Authentication\Adapter\AdapterChain');
                    $controllerPlugin = new Controller\Plugin\UserAuthentication;
                    $controllerPlugin->setAuthService($authService);
                    $controllerPlugin->setAuthAdapter($authAdapter);
                    return $controllerPlugin;
                },
            ),
        );
    }

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'userDisplayName' => function ($sm) {
                    $locator = $sm->getServiceLocator();
                    $viewHelper = new View\Helper\UserDisplayName;
                    $viewHelper->setAuthService($locator->get('user_auth_service'));
                    return $viewHelper;
                },
                'userIdentity' => function ($sm) {
                    $locator = $sm->getServiceLocator();
                    $viewHelper = new View\Helper\UserIdentity;
                    $viewHelper->setAuthService($locator->get('user_auth_service'));
                    return $viewHelper;
                },
                'userLoginWidget' => function ($sm) {
                    $locator = $sm->getServiceLocator();
                    $viewHelper = new View\Helper\UserLoginWidget;
                    $viewHelper->setViewTemplate($locator->get('user_module_options')->getUserLoginWidgetViewTemplate());
                    $viewHelper->setLoginForm($locator->get('user_login_form'));
                    return $viewHelper;
                },
            ),
        );

    }

    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'User\Authentication\Adapter\Db' => 'User\Authentication\Adapter\Db',
                'User\Authentication\Storage\Db' => 'User\Authentication\Storage\Db',
                'User\Form\Login'                => 'User\Form\Login',
                'user_user_service'              => 'User\Service\User',
            ),
            'factories' => array(

                'user_module_options' => function ($sm) {
                    $config = $sm->get('Config');
                    return new Options\ModuleOptions(isset($config['user']) ? $config['user'] : array());
                },
                // We alias this one because it's User's instance of
                // Zend\Authentication\AuthenticationService. We don't want to
                // hog the FQCN service alias for a Zend\* class.
                'user_auth_service' => function ($sm) {
                    return new \Zend\Authentication\AuthenticationService(
                        $sm->get('User\Authentication\Storage\Db'),
                        $sm->get('User\Authentication\Adapter\AdapterChain')
                    );
                },

                'User\Authentication\Adapter\AdapterChain' => 'User\Authentication\Adapter\AdapterChainServiceFactory',

                'user_login_form' => function($sm) {
                    $options = $sm->get('user_module_options');
                    $form = new Form\Login(null, $options);
                    $form->setInputFilter(new Form\LoginFilter($options));
                    return $form;
                },

                'user_register_form' => function ($sm) {
                    $options = $sm->get('user_module_options');
                    $form = new Form\Register(null, $options);
                    //$form->setCaptchaElement($sm->get('user_captcha_element'));
                    $form->setInputFilter(new Form\RegisterFilter(
                        new Validator\NoRecordExists(array(
                            'mapper' => $sm->get('user_user_mapper'),
                            'key'    => 'email'
                        )),
                        new Validator\NoRecordExists(array(
                            'mapper' => $sm->get('user_user_mapper'),
                            'key'    => 'username'
                        )),
                        $options
                    ));
                    return $form;
                },

                'user_change_password_form' => function($sm) {
                    $options = $sm->get('user_module_options');
                    $form = new Form\ChangePassword(null, $sm->get('user_module_options'));
                    $form->setInputFilter(new Form\ChangePasswordFilter($options));
                    return $form;
                },

                'user_change_email_form' => function($sm) {
                    $options = $sm->get('user_module_options');
                    $form = new Form\ChangeEmail(null, $sm->get('user_module_options'));
                    $form->setInputFilter(new Form\ChangeEmailFilter(
                        $options,
                        new Validator\NoRecordExists(array(
                            'mapper' => $sm->get('user_user_mapper'),
                            'key'    => 'email'
                        ))
                    ));
                    return $form;
                },

                'user_user_hydrator' => function ($sm) {
                    $hydrator = new \Zend\Stdlib\Hydrator\ClassMethods();
                    return $hydrator;
                },

                'user_user_mapper' => function ($sm) {
                    $options = $sm->get('user_module_options');
                    $mapper = new Mapper\User();
                    $mapper->setDbAdapter($sm->get('user_zend_db_adapter'));
                    $entityClass = $options->getUserEntityClass();
                    $mapper->setEntityPrototype(new $entityClass);
                    $mapper->setHydrator(new Mapper\UserHydrator());
                    return $mapper;
                },
            ),
        );
    }
}
