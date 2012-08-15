<?php

/* @var $this Mage_Core_Model_Resource_Setup */

$cidades = array(
    array(
        'country_id' => 'BR', 
        'region_id' => 'SC', 
        'name' => 'Itajaí'
    ), 
    array(
        'country_id' => 'BR', 
        'region_id' => 'SC', 
        'name' => 'Balneário Camboriú'
    )
);

$this->startSetup();

foreach ($cidades as $item) {
    $this->run("INSERT INTO `{$this->getTable('directory/country_region_city')}` (`region_id`, `default_name`)
        SELECT region_id, '{$item['name']}' AS default_name
            FROM `{$this->getTable('directory/country_region')}`
            WHERE code = '{$item['region_id']}' AND country_id = '{$item['country_id']}'
            ORDER BY region_id DESC LIMIT 1;
    ");
}

$this->endSetup();