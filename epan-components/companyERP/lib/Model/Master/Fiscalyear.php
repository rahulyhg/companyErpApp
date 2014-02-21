<?php
namespace companyERP;

class Model_Master_Fiscalyear extends \Model_Table
{
	public $table="companyERP_fiscalyear";
	function init()
	{
		parent::init();
		$this->addField('yearname');
		$this->addField('startdate');
		$this->addField('enddate');
		$this->addField('yearclosed')->enum(array('Yes','No'));

		$this->add('dynamic_model/Controller_AutoCreator');

		



	}
   



}