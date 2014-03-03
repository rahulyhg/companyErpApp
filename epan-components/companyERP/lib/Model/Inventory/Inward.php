<?php
namespace companyERP;
class Model_Inventory_Inward extends \Model_Table{
	public $table="companyERP_inward";
	function init(){
		parent::init();
		
		$this->addField('item_id');
		$this->addField('item_name');
		$this->addField('party_id');
		$this->addField('cost');
		$this->addField('date`');
		$this->addField('qty');
		$this->addField('gross_amount');
		$this->addField('tax');
		$this->addField('tax_amount');
		$this->addField('discount');
		$this->addField('discount_amount');
		$this->addField('net_amount');
		                                                                                             
		$this->add('dynamic_model/Controller_AutoCreator');
		
		$this->addHook('beforeSave',$this);
		//$this->addHook('beforeDelete',$this);
	}
	function beforeSave(){
		$inward=$this->add('companyERP/Model_Inventory_Inward');

		if($this->loaded())
		{
			$inward->addCondition('id','<>',$this->id);
		}
			$inward->addCondition('name',$this['name']);
			$inward->tryLoadAny();
			if($inward->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}
	
}