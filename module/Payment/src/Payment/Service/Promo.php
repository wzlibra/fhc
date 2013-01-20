<?php
namespace Payment\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use WhBase\EventManager\EventProvider;
use Zend\ServiceManager\ServiceManager;
use Payment\Options\PromoOptionsInterface;
use Zend\Stdlib\Hydrator\ClassMethods;
use Payment\Form\PromoInputFilter;

class Promo extends EventProvider implements ServiceManagerAwareInterface {
	/**
	 * @var ServiceManager
	 */
	protected $serviceManager;
	/**
	 * 
	 * @var \Payment\Options\PromoOptionsInterface
	 */
	protected $options;
    public function add(array $post) {
    	
    	$class = $this->getOptions()->getPromoEntityClass();
    	$promo = new $class;
    	$form = $this->getAddForm();
    	$form->setHydrator(new ClassMethods());
    	$form->bind($promo);
    	$form->setData($post);
    	if (!$form->isValid()) {
    		return false;
    	}
    	$promo = $form->getData();
    	/* @var $promo \Payment\Entity\Promo */
    	
    	$this->getPromoMapper()->insert($promo);
    	
    	return $promo;
    }
    
    public function update(array $data) {
    	
    	$class = $this->getOptions()->getPromoEntityClass();
    	$promo = new $class;
    	$form = $this->getEditForm();
    	$form->setHydrator(new ClassMethods());
    	$form->bind($promo);
    	$form->setData($data);
    	if (!$form->isValid()) {
    		return false;
    	}
    	$promo = $form->getData();
    	
    	$this->getPromoMapper()->update($promo);
    	
    	return $promo;
    }
    
    public function remove($id) {
    	$entity = $this->getPromoMapper()->findById($id);
    	if ($entity) {
    		$this->getPromoMapper()->delete('id='.$id);
    	}
    	return $entity;
    }
    
    public function all($page = 1) {
    	return $this->getPromoMapper()->getPaginator($page);
    }
    
    /**
     * 
     * @return \Zend\ServiceManager\ServiceManager
     */
    public function getServiceManager() {
    	return $this->serviceManager;
    }
    /**
     * Set service manager instance
     *
     * @param ServiceManager $serviceManager
     * @return Promo
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
    	$this->serviceManager = $serviceManager;
    	return $this;
    }
    /**
     * @return \Payment\Form\PromoAdd
     */
    public function getAddForm() {
    	return $this->serviceManager->get('promo_add_form');
    }
    /**
     * 
     * @return \Payment\Form\PromoEdit
     */
    public function getEditForm() {
    	return $this->serviceManager->get('promo_edit_form');
    }
    /**
     * 
     * @return \Payment\Mapper\Promo
     */
    public function getPromoMapper() {
    	return $this->serviceManager->get('promo_mapper');
    }
    /**
     * @return \Payment\Options\PromoOptionsInterface
     */
    public function getOptions() {
    	if (!$this->options instanceof PromoOptionsInterface) {
    		$this->setOptions($this->serviceManager->get('payment_module_options'));
    	}
    	return $this->options;
    }
    public function setOptions(PromoOptionsInterface $options) {
    	$this->options = $options;
    }
}