<?php
class Wehup_Directory_Model_Resource_City_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
	protected $_countryTable;
	protected $_regionTable;
	protected $_cityNameTable;

	protected function _construct()
	{
		$this->_init('directory/city');
		
		$this->_countryTable = $this->getTable('directory/country');
		$this->_regionTable = $this->getTable('directory/country_region');
		$this->_cityNameTable = $this->getTable('directory/country_region_city_name');
		
		$this->addOrder('name', Varien_Data_Collection::SORT_ORDER_ASC);
		$this->addOrder('default_name', Varien_Data_Collection::SORT_ORDER_ASC);
	}

	protected function _initSelect()
	{
		parent::_initSelect();
		
		$locale = Mage::app()->getLocale()->getLocaleCode();
		$this->addBindParam(':city_locale', $locale);
		$this->getSelect()->joinLeft(array(
			'city_name' => $this->_cityNameTable 
		), 'main_table.city_id = city_name.city_id AND city_name.locale = :city_locale', array(
			'name' 
		));
		
		return $this;
	}

	public function addRegionFilter($regionId)
	{
		if(!empty($regionId))
		{
			if(is_array($regionId))
			{
				$this->addFieldToFilter('main_table.region_id', array(
					'in' => $regionId 
				));
			}
			else
			{
				$this->addFieldToFilter('main_table.region_id', $regionId);
			}
		}
		
		return $this;
	}

	public function toOptionArray()
	{
		$options = $this->_toOptionArray('city_id', 'default_name', array(
			'title' => 'default_name' 
		));

		if(count($options) > 0)
		{
			array_unshift($options, array(
				'title ' => null,
				'value' => '0',
				'label' => Mage::helper('directory')->__('-- Please select --') 
			));
		}

		return $options;
	}
}
