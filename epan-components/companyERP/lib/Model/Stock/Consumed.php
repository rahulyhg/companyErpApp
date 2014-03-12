<?php
namespace companyERP;
class Model_Stock_Consumed extends \Model_Table{
	public $table="companyERP_consumed";
	function init(){
		parent::init();
		 
		$this->hasOne('companyERP/Master_Warehouse','warehouse_id');		
		$this->hasOne('companyERP/Master_Item','item_id');		
		$this->addField('qty');
		$this->addField('date');
		                                                                                             
		$this->add('dynamic_model/Controller_AutoCreator');
		
		$this->addHook('beforeSave',$this);
		//$this->addHook('beforeDelete',$this);
	}
	function beforeSave(){
	 $consumed=$this->add('companyERP/Model_Stock_Consumed');
		if($this->loaded())
		{
			$consumed->addCondition('id','<>',$this->id);
		}
			$consumed->addCondition('name',$this['name']);
			$consumed->tryLoadAny();
			if($consumed->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}
	
}