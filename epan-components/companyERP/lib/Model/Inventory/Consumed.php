<?php
namespace companyERP;
class Model_Inventory_Consumed extends \Model_Table{
	public $table="companyERP_consumed";
	function init(){
		parent::init();
		
		$this->addField('item_id');//foreign key in future
		$this->addField('date');
		$this->addField('qty');
		                                                                                             
		$this->add('dynamic_model/Controller_AutoCreator');
		
		$this->addHook('beforeSave',$this);
		//$this->addHook('beforeDelete',$this);
	}
	function beforeSave(){
	 $consumed=$this->add('companyERP/Model_Inventory_Consumed');
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