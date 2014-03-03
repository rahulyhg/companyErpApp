<?php
namespace companyERP;

class Model_Master_HolidayList extends \Model_Table
{
	public $table="companyERP_Holidaylist";
	function init()
	{
		parent::init();
		$this->addField('name');
		$this->addField('weeklyoff')->enum(array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'));
		$this->addField('fiscalyear')->type('date');

		$this->add('dynamic_model/Controller_AutoCreator');


		$this->addHook('beforeSave',$this);
		



	}
   
function beforeSave()
	{
		$hlist=$this->add('companyERP/Model_Master_HolidayList');
		if($this->loaded())
		 {
			$hlist->addCondition('id','<>',$this->id);
		 }
			$hlist->addCondition('name',$this['name']);
			$hlist->tryloadAny();

		if($hlist->loaded())
		 {
				throw $this->exception('its already exist');
		 }
		
	}


}