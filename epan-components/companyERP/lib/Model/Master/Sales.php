<?php
namespace companyERP;

class Model_Master_Sales extends \Model_Table
{
	public $table="companyERP_sales";

	function init()
	{
        parent::init();

        $this->addField('name');

        $this->add('dynamic_model/Controller_AutoCreator');

        $this->addHook('beforeSave',$this);
	}
	function beforeSave()
	{
		
	}
}
