<?php
namespace companyERP;

class Model_Master_Holidaylist extends \Model_Table
{
	public $table="companyERP_Holidaylist";
	function init()
	{
		parent::init();
		$this->addField('name');
		$this->addField('weeklyoff')->enum(array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'));
		$this->addField('fiscalyear')->type('date');

		$this->add('dynamic_model/Controller_AutoCreator');

		



	}
   



}