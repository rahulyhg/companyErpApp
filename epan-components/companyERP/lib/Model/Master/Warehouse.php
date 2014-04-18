<?php
namespace companyERP;
class Model_Master_Warehouse extends \Model_Table{
	public $table="companyERP_warehouse";
	function init(){
		parent::init();

		$this->addField('name');

		$this->hasMany('companyERP/Stock_Inward','warehouse_id');
		$this->hasMany('companyERP/Stock_Consumed','warehouse_id');
		
		$this->add('dynamic_model/Controller_AutoCreator');
		
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
	}
	function beforeSave(){
		$warehouse=$this->add('companyERP/Model_Master_Warehouse');
		if($this->loaded()){
		$warehouse->addCondition('id','<>',$this->id);
		}

		$warehouse->addCondition('name',$this['name']);
		$warehouse->tryLoadAny();

		if($warehouse->loaded()){
		throw $this->exception('its already exist');
			}
		
	}

	function beforeDelete()
	{
	  if($this->ref('companyERP/Master_Item')->count()->getOne()>0)
      {
	   throw $this->exception('plese delete item content');
	
       }


   }

}
