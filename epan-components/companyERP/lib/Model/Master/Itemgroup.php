<?php
namespace companyERP;
class Model_Master_Itemgroup extends \Model_Table{
	public $table="companyERP_itemgroup";
	function init(){
		parent::init();
		$this->hasOne('companyERP/Master_Item','item_id');
		$this->addField('name');
		$this->add('dynamic_model/Controller_AutoCreator');
		
//		$this->addHook('beforeSave',$this);
//		$this->addHook('beforeDelete',$this);
	}
}
