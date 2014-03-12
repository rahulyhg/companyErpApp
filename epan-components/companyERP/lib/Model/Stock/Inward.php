<?php
namespace companyERP;
class Model_Stock_Inward extends \Model_Table{
	public $table="companyERP_inward";
	function init(){
		parent::init();
		
		$this->hasOne('companyERP/Master_Supplier','supplier_id');	                                                                                             
		$this->hasOne('companyERP/Master_Warehouse','warehouse_id');	                                                                                             
		$this->hasOne('companyERP/Master_Item','item_id');	                                                                                             

		$this->addField('name');
		$this->addField('qty');
		$this->addField('date')->type('date');

		$this->add('dynamic_model/Controller_AutoCreator');
		
		$this->addHook('beforeSave',$this);
		//$this->addHook('beforeDelete',$this);
	}
	function beforeSave(){
		$inward=$this->add('companyERP/Model_Stock_Inward');

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

	function makeNewInventory($inward_details)
	{
		$this['supplier_id']=$inward_details['supplier_id'];
		$this['warehouse_id']=$inward_details['warehouse_id'];
		$this['name']=$inward_details['name'];
		$this['qty']=$inward_details['qty'];
		$this['date']=$inward_details['date'];

		$this->save();
	}
	
}