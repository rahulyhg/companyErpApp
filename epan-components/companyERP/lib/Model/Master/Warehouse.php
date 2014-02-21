<?php
namespace companyERP;
class Model_Master_Warehouse extends \Model_Table{
	public $table="companyERP_warehouse";
	function init(){
		parent::init();
		$this->addField('name');
		$this->hasMany('companyERP/Master_Item','branch_id');                                                                                              
		$this->add('dynamic_model/Controller_AutoCreator');
		
		//$this->addHook('beforeSave',$this);
		//$this->addHook('beforeDelete',$this);
	}
}
