<?php
class Wehup_Directory_Model_City extends Mage_Core_Model_Abstract
{

	protected function _construct()
	{
		$this->_init('directory/city');
	}

	public function getName()
	{
		$name = $this->getData('name');
		
		if(is_null($name))
		{
			$name = $this->getData('default_name');
		}
		
		return $name;
	}
}