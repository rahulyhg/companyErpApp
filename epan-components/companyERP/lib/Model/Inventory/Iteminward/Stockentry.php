<?php
namespace companyERP;

class Model_Inventory_Iteminward_Stockentry extends \Model_Table
{
	public $table="companyERP_stockentry";
	function init()
	{
		parent::init();
		$this->addField('name');

		$this->add('dynamic_model/Controller_AutoCreator');

	    //$this->addHook('beforeSave',$this);

		
	}
}