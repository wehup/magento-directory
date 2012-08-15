<?php
class Wehup_Directory_Model_Resource_City extends Mage_Core_Model_Resource_Db_Abstract
{

	protected function _construct()
	{
		$this->_init('directory/country_region_city', 'city_id');
	}
}