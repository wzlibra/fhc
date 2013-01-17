<?php
namespace User\Authentication\Adapter;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use User\Authentication\Adapter\AdapterChain;

class AdapterChainServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $chain = new AdapterChain;
        $adapter = $serviceLocator->get('User\Authentication\Adapter\Db');
        $chain->getEventManager()->attach('authenticate', array($adapter, 'authenticate'));
        return $chain;
    }
}
