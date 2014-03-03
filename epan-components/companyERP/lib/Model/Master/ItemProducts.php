<?php
namespace companyERP;
class Model_Master_ItemProducts extends \Model_Table
{
	public $table="companyERP_itemproducts";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_Item','item_id');
		$this->hasOne('companyERP/Master_Product','product_id');
		
		$this->addField('name');
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');
	}
	function beforeSave(){
		$itemproducts=$this->add('companyERP/Model_Master_ItemProducts');
		if($this->loaded()){
		$itemproducts->addCondition('id','<>',$this->id);
		}

		$itemproducts->addCondition('name',$this['name']);
		$itemproducts->tryLoadAny();

		if($itemproducts->loaded()){
		throw $this->exception('its already exist');
			}
		
	}
}