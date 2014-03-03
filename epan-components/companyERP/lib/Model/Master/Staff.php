<?php
namespace companyERP;
class Model_Master_Staff extends \Model_Table
{
	public $table="companyERP_staff";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_Department','department_id');
		$this->hasOne('companyERP/Master_Post','post_id');
		
		$this->addField('name')->mandatory('can not be null');
		$this->addField('category')->enum(array('Manager','Employee','Worker'))->mandatory('can not be null');
		$this->addField('designation');
		//$this->addField('is_active')->type('boolean');

		$this->add('dynamic_model/Controller_AutoCreator');
		$this->addHook('beforeSave',$this);
	}
	function beforeSave()
	{
		$staff=$this->add('companyERP/Model_Master_Staff');
		if($this->loaded())
		 {
			$staff->addCondition('id','<>',$this->id);
		 }
			$staff->addCondition('name',$this['name']);
			$staff->tryLoadAny();

		if($staff->loaded())
		 {
				throw $this->exception('its already exist');
		 }
		
	}
	

}