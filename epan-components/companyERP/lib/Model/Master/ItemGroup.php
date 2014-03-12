<?php
namespace companyERP;
class Model_Master_ItemGroup extends \Model_Table{
	public $table="companyERP_itemgroup";
	function init(){
		parent::init();
		$this->addField('name');
		$this->add('dynamic_model/Controller_AutoCreator');
		
		 $this->addHook('beforeSave',$this);
//		$this->addHook('beforeDelete',$this);
	}
	function beforeSave()
	{
		$itemgroup=$this->add('companyERP/Model_Master_Itemgroup');
		if($this->loaded())
		 {
			$itemgroup->addCondition('id','<>',$this->id);
		 }
			$itemgroup->addCondition('name',$this['name']);
			$itemgroup->tryloadAny();

		if($itemgroup->loaded())
		 {
				throw $this->exception('its already exist');
		 }
		
	}
}
