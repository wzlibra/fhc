<?php
namespace WhBase\Mvc\Service;

/**
 * @category   Eva
 * @package    Eva_Mvc
 * @subpackage Service
 * @copyright  Copyright (c) 2012 AlloVince (http://avnpc.com/)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ViewHelperManagerFactory extends \Zend\Mvc\Service\ViewHelperManagerFactory
{
    /**
     * An array of helper configuration classes to ensure are on the helper_map stack.
     *
     * @var array
     */
    protected $defaultHelperMapClasses = array(
        'Zend\Form\View\HelperConfig',
        'Zend\Navigation\View\HelperConfig',
        'WhBase\View\HelperConfig'
    );

}
