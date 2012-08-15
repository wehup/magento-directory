<?php
class Wehup_Directory_Model_Service
{

	public function getCities($regionId)
	{
		if(empty($regionId))
		{
			return array();
		}
		
		$collection = Mage::getModel('directory/city')->getCollection();
		$collection->addRegionFilter($regionId);
		
		$cities = array();
		
		foreach($collection as $city)
		{
			$cities[] = array(
				'id' => $city->getId(),
				'name' => $city->getName() 
			);
		}
		
		return $cities;
	}
}