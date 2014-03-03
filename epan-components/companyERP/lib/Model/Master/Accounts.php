<?php
namespace companyERP;

class Model_Master_Accounts extends \Model_Table
{
	public $table="companyERP_accounts";
	function init()
	{
		parent::init();
		$this->addField('name');

		$this->add('dynamic_model/Controller_AutoCreator');

	    $this->addHook('beforeSave',$this);

		
	}

	function beforeSave(){
		$accounts=$this->add('companyERP/Model_Master_Accounts');

		if($this->loaded())
		{
			$accounts->addCondition('id','<>',$this->id);
		}
			$accounts->addCondition('name',$this['name']);
			$accounts->tryLoadAny();
			if($accounts->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}   



}