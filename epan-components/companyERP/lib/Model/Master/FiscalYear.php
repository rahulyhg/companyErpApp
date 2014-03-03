<?php
namespace companyERP;

class Model_Master_FiscalYear extends \Model_Table
{
	public $table="companyERP_fiscalyear";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_Company','company_id');

		$this->addField('yearname');
		$this->addField('startdate');
		$this->addField('enddate');
		$this->addField('yearclosed')->enum(array('Yes','No'));

		$this->add('dynamic_model/Controller_AutoCreator');

		$this->addHook('beforeSave',$this);
		



	}
   
function beforeSave()
	{
		$fyear=$this->add('companyERP/Model_Master_FiscalYear');
		if($this->loaded())
		 {
			$fyear->addCondition('id','<>',$this->id);
		 }
			$fyear->addCondition('name',$this['name']);
			$fyear->tryloadAny();

		if($fyear->loaded())
		 {
				throw $this->exception('its already exist');
		 }
		
	}


}