<?php
namespace companyERP;

class Model_Master_BillDetail extends Model_Master_Bill
{
   
	function init()
	{
		parent::init();

		//$this->addField('name')->mandatory('can not be null');

		$this->add('dynamic_model/Controller_AutoCreator');

		$this->addHook('beforeSave',$this);

	}
	function beforeSave(){
		$billdetail=$this->add('companyERP/Model_Master_BillDetail');

		if($this->loaded())
		{
			$billdetail->addCondition('id','<>',$this->id);
		}
			$billdetail->addCondition('name',$this['name']);
			$billdetail->tryLoadAny();
			if($billdetail->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}
}