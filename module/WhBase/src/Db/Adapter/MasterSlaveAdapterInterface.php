<?php

namespace WhBase\Db\Adapter;

interface MasterSlaveAdapterInterface
{
    /**
     * @return Zend\Db\Adapter
     */
    public function getSlaveAdapter();
}
