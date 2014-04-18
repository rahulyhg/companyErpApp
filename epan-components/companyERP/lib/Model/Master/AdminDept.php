<?php
namespace companyERP;
class Model_Master_AdminDept extends \Model_Table{
	public $table="companyERP_admindept";
	function init(){
		parent::init();

		

		$this->addField('dept_no');
		$this->addField('name')->caption('dept_name');
		
		$this->add('dynamic_model/Controller_AutoCreator');
		
		$this->addHook('beforeSave',$this);
		//$this->addHook('beforeDelete',$this);
	}
	function beforeSave(){
		$admindept=$this->add('companyERP/Model_Master_AdminDept');

		if($this->loaded())
		{
			$admindept->addCondition('id','<>',$this->id);
		}
			$admindept->addCondition('name',$this['name']);
			$admindept->tryLoadAny();
			if($admindept->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}
	
}