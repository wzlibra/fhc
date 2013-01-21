<?php

namespace Payment\Controller;

use Zend\View\Model\ViewModel;
use Zend\Stdlib\Hydrator\ClassMethods;
use WhBase\Mvc\Controller\AbstractController;

class PromoController extends AbstractController {
	public function listAction(){
		$paginator = $this->getPromoService()->all($this->params()->fromRoute('page'));
		
		return $this->getView()->setVariable('paginator',$paginator);
	}
	public function addAction(){
		$view = $this->getView();
		
		$request = $this->getRequest();
		$form = $this->getPromoForm();
		$service = $this->getPromoService();
		
		if(! $request->isPost()) {
			return $view->setVariable('form',$form);
		}
		
		$post = $request->getPost();
		$form->setData($post);
		if(! $form->isValid()) {
			return $view->setVariable('form',$form);
		}
		
		$promo = $service->add($post->toArray());
		if(! $promo) {
			return $view->setVariable('form',$form);
		}
		
		return $this->redirect()->toUrl('/admin/promo');
	}
	public function editAction(){
		$id = $this->params()->fromRoute('id');
		
		if (!$id) {
		    return $this->redirect()->toUrl('/admin/promo');
		}
		
		$request = $this->getRequest();
		$form = $this->getEditForm();
		$service = $this->getPromoService();
		
		if ($request->isPost() ) {
			$post = $request->getPost();
			$form->setData($post);

			if ($form->isValid()) {
				$data = $form->getData();
				$entity = $service->update($data);
				if (!$entity) {
					throw new Exception('数据更新操作异常');
				}
				return $this->redirect()->toUrl('/admin/promo');
			}
		}
		
		$entity = $service->getPromoMapper()->findById($id);
		$form->bind($entity);
		
		return $this->getView()->setVariable('form', $form)->setVariable('id', $id);
	}
	public function deleteAction(){
		$id = $this->params()->fromRoute('id');
		
		if (!$id) {
			return $this->redirect()->toUrl('/admin/promo');
		}
		
		$request = $this->getRequest();
		$service = $this->getPromoService();
		
		if ($request->isPost()) {
			$post = $request->getPost();
			if ($post->get('submit') == 'yes') {
				$entity = $service->remove($id);
				if (!$entity) {
					throw new Exception('数据删除异常');
				}
				return $this->redirect()->toUrl('/admin/promo');
			}
			if ($post->get('cancel') == 'no') {
				return $this->redirect()->toUrl('/admin/promo');
			}
		}
		
		$entity = $service->getPromoMapper()->findById($id);
		
		return $this->getView()->setVariables(array('entity'=>$entity,'id'=>$id));
	}
	/**
	 *
	 * @return \Payment\Service\Promo
	 */
	public function getPromoService(){
		return $this->getServiceLocator()->get('promo_service');
	}
	/**
	 *
	 * @return \Payment\Form\PromoAdd
	 */
	public function getPromoForm(){
		return $this->getServiceLocator()->get('promo_add_form');
	}
	/**
	 * 
	 * @return \Payment\Form\PromoEdit
	 */
	public function getEditForm(){
		return $this->getServiceLocator()->get('promo_edit_form');
	}
	/**
	 *
	 * @return \Zend\View\Model\ViewModel
	 */
	public function getView(){
		return new ViewModel();
		/*
		 * $view = new ViewModel(); $view->setTemplate('/payment/promo/menu');
		 * $v->addChild($view,'menu'); return $v;
		 */
	}
}