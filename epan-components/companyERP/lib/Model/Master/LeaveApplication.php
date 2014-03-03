<?php
namespace companyERP;

class Model_Master_LeaveApplication extends \Model_Table
{
	public $table="companyERP_leaveapplication";
	function init()
	{
		parent::init();
		$this->addField('name');
		$this->addField('leavetype')->enum(array('Sickleave','Casualleave','Privilegeleave'));
		$this->addField('postingdate');
		$this->addField('fiscalyear')->type('date');

		$this->add('dynamic_model/Controller_AutoCreator');


		$this->addHook('beforeSave',$this);
		



	}
   

function beforeSave()
	{
		$leaveapp=$this->add('companyERP/Model_Master_LeaveApplication');
		if($this->loaded())
		 {
			$leaveapp->addCondition('id','<>',$this->id);
		 }
			$leaveapp->addCondition('name',$this['name']);
			$leaveapp->tryloadAny();

		if($leaveapp->loaded())
		 {
				throw $this->exception('its already exist');
		 }
		
	}

}