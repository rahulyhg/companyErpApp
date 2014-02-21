<?php
namespace companyERP;

class Model_Master_Leaveapplication extends \Model_Table
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

		



	}
   



}