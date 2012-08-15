<?php

$estados = array(
    'AC' => 'Acre', 
    'AL' => 'Alagoas', 
    'AP' => 'Amapá', 
    'AM' => 'Amazonas', 
    'BA' => 'Bahia', 
    'CE' => 'Ceará', 
    'DF' => 'Distrito Federal', 
    'ES' => 'Espírito Santo', 
    'GO' => 'Goiás', 
    'MA' => 'Maranhão', 
    'MT' => 'Mato Grosso', 
    'MS' => 'Mato Grosso do Sul', 
    'MG' => 'Minas Gerais', 
    'PA' => 'Pará', 
    'PB' => 'Paraíba', 
    'PR' => 'Paraná', 
    'PE' => 'Pernambuco', 
    'PI' => 'Piauí', 
    'RJ' => 'Rio de Janeiro', 
    'RN' => 'Rio Grande do Norte', 
    'RS' => 'Rio Grande do Sul', 
    'RO' => 'Rondônia', 
    'RR' => 'Roraima', 
    'SC' => 'Santa Catarina', 
    'SP' => 'São Paulo', 
    'SE' => 'Sergipe', 
    'TO' => 'Tocantins'
);

/* @var $this Mage_Catalog_Model_Resource_Eav_Mysql4_Setup */
$this->startSetup();

foreach ($estados as $sigla => $nome)
{
    $this->run("INSERT INTO `{$this->getTable('directory/country_region')}` (`country_id`, `code`, `default_name`) VALUES ('BR', '{$sigla}', '{$nome}')");
}

$this->endSetup();