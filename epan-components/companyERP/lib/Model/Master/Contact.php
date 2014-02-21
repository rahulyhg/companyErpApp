<?php
namespace companyERP;
class Model_Master_Contact extends \Model_Table{
	public $table="companyERP_contact";
	function init(){
		parent::init();

		$this->addField('first_name')->mandatory;
		$this->addField('last_name');
		$this->addField('status');
		$this->addField('emailid');
		$this->addField('address');
		$this->addField('city');
		$this->addField('state');
		$this->addField('Mobile_no');
		$this->add('dynamic_model/Controller_AutoCreator');
		
//		$this->addHook('beforeSave',$this);
//		$this->addHook('beforeDelete',$this);
	}
}
