<?php
namespace companyERP;
class Model_Master_PurchaseBill extends Model_Master_Bill{
function init()
	{
		parent::init();
		// $this->addField('name')->mandatory('can not be null');


		$this->addCondition('bill_type','Purchase');

		$this->addHook('beforeSave',$this);




	}
	function beforeSave(){
		$purchasebill=$this->add('companyERP/Model_Master_PurchaseBill');

		if($this->loaded())
		{
			$purchasebill->addCondition('id','<>',$this->id);
		}
			$purchasebill->addCondition('name',$this['name']);
			$purchasebill->tryLoadAny();
			if($purchasebill->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}
}