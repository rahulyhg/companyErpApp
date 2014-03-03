<?php
namespace companyERP;

class Model_Master_SalesPerson extends \Model_Table
{
	public $table="companyERP_salesperson";
	function init()
	{
		parent::init();
		$this->addField('name');
		$this->addField('itemgroup');
		$this->addField('fiscalyear')->type('date');
		$this->addField('targetqty');
		$this->addField('targetamt');

		$this->add('dynamic_model/Controller_AutoCreator');

	    $this->addHook('beforeSave',$this);

		
	}

	function beforeSave(){
		$salesperson=$this->add('companyERP/Model_Master_SalesPerson');

		if($this->loaded())
		{
			$salesperson->addCondition('id','<>',$this->id);
		}
			$salesperson->addCondition('name',$this['name']);
			$salesperson->tryLoadAny();
			if($salesperson->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}   



}