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

		



	}
   



}