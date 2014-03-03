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
		
		$this->addHook('beforeSave',$this);
//		$this->addHook('beforeDelete',$this);
	}
	function beforeSave(){
		$contact=$this->add('companyERP/Model_Master_Contact');
		if($this->loaded()){
		$contact->addCondition('id','<>',$this->id);
		}

		$contact->addCondition('name',$this['name']);
		$contact->tryLoadAny();

		if($contact->loaded()){
		throw $this->exception('its already exist');
			}
		
	}
}
