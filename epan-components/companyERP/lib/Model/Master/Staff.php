<?php
namespace companyERP;
class Model_Master_Staff extends \Model_Table
{
	public $table="companyERP_staff";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_Department','department_id');
		//$this->hasOne('companyERP/Master_Post','post_id');
		
		$this->addField('staff_code');
		$this->addField('name')->mandatory('can not be null');
		$this->addField('dob')->type('date');
		$this->addField('age');
		$this->addField('address');
		$this->addField('contact_no');
		$this->addField('qualifiaction');
		$this->addField('experience');
		$this->addField('leaves_allowed');
		$this->addField('under_postid');
		$this->addField('type')->enum(array('Stock_Manager','HR_Manager','Payroll_Manager'));
		$this->hasMany('companyERP/Master_Attendance','staff_id');

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