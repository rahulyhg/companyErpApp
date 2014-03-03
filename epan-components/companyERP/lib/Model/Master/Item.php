<?php
namespace companyERP;
class Model_Master_Item extends \Model_Table{
	public $table="companyERP_item";
	function init(){
		parent::init();
	$this->hasOne('companyERP/Master_ItemGroup','itemgroup_id');
	$this->hasOne('companyERP/Master_Warehouse','warehouse_id');
	$this->hasOne('companyERP/Master_Brand','brand_id');
	$this->addField('name');
	$this->hasMany('companyERP/Master_ItemProducts','item_id');

	$this->add('dynamic_model/Controller_AutoCreator');
	$this->addHook('beforeSave',$this);


	}
	function beforeSave()
	{
		$item=$this->add('companyERP/Model_Master_Item');
		if($this->loaded())
		 {
			$item->addCondition('id','<>',$this->id);
		 }
			$item->addCondition('name',$this['name']);
			$item->tryloadAny();

		if($item->loaded())
		 {
				throw $this->exception('its already exist');
		 }
		
	}
	function beforeDelete()
	{
		  if($this->ref('companyERP/Master_ItemProducts')->count()->getOne()>0)
      {
	   throw $this->exception('plese delete item products content');
	
       }

     }
}

