<?php
namespace companyERP;
class Model_Master_Salesbill extends  Model_Master_Bill{
	function init(){
		parent::init();

		$this->addCondition('bill_type','Sales');


		$this->addHook('beforeSave',$this);
	}
	function beforeSave(){
		$salesbill=$this->add('companyERP/Model_Master_Salesbill');

		if($this->loaded())
		{
			$salesbill->addCondition('id','<>',$this->id);
		}
			$salesbill->addCondition('name',$this['name']);
			$salesbill->tryLoadAny();
			if($salesbill->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}
}