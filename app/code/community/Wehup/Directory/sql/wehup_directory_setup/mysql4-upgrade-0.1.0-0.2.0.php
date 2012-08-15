<?php

/* @var $this Mage_Core_Model_Resource_Setup */
$this->startSetup();

$this->run("
CREATE TABLE {$this->getTable('directory/country_region_city')} (
    city_id integer unsigned not null auto_increment primary key,
    region_id integer unsigned not null,
    default_name varchar(255),
    CONSTRAINT FOREIGN KEY (region_id) REFERENCES {$this->getTable('directory/country_region')} (region_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_bin ;

CREATE TABLE {$this->getTable('directory/country_region_city_name')} (
    locale varchar(8) not null,
    city_id integer unsigned not null,
    name varchar(255) not null,
    PRIMARY KEY (locale, city_id),
    CONSTRAINT FOREIGN KEY (city_id) REFERENCES {$this->getTable('directory/country_region_city')} (city_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_bin ;
");

$this->endSetup();