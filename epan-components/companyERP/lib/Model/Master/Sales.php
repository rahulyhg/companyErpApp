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


		function beforeSave(){
		$sales=$this->add('companyERP/Model_Master_Sales');

		if($this->loaded())
		{
			$sales->addCondition('id','<>',$this->id);
		}
			$sales->addCondition('name',$this['name']);
			$sales->tryLoadAny();
			if($sales->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}
}
