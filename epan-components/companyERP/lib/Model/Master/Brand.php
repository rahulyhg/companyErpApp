<?php
namespace companyERP;
class Model_Master_Brand extends \Model_Table{
	public $table="companyERP_brand";
	function init(){
		parent::init();

		$this->addField('name');
				$this->hasMany('companyERP/Master_Item','Brand_id');
		$this->add('dynamic_model/Controller_AutoCreator');
		
//		$this->addHook('beforeSave',$this);
//		$this->addHook('beforeDelete',$this);
	}
}
