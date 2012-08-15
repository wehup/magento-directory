<?php
class Wehup_Directory_CityController extends Mage_Core_Controller_Front_Action
{

	public function listAction()
	{
		try
		{
			$service = Mage::getModel('directory/service');
			$cities = $service->getCities($this->getRequest()->getParam('region_id'));
			
			$this->getResponse()->setBody(Zend_Json::encode(array(
				'success' => true,
				'cities' => $cities 
			)));
		}
		catch(Exception $e)
		{
			$this->getResponse()->setBody(Zend_Json::encode(array(
				'success' => false,
				'error' => $e->getMessage() 
			)));
		}
		
		$this->getResponse()->setHeader('Content-Type', 'application/json', true);
	}
}