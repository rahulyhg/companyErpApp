<?php
namespace companyERP;
class Model_Master_Customergroup extends \Model_Table{
	public $table="companyERP_customergroup";
	function init(){
		parent::init();
		$this->hasOne('companyERP/Master_Customer','customer_id');
		$this->addField('name');
		$this->add('dynamic_model/Controller_AutoCreator');
		
		//$this->addHook('beforeSave',$this);
		//$this->addHook('beforeDelete',$this);
	}
}
