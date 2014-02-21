<?php
namespace companyERP;

class Model_Master_Companymember extends \Model_Table
{
	public $table="companyERP_companymember";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_Branch','branch_id');
		$this->hasOne('companyERP/Master_Department','department_id');
		$this->addField('name')->mandatory('can not be null');
		$this->addField('category')->enum(array('Manager','Employee','Worker'))->mandatory('can not be null');
		$this->addField('designation');;

		$this->add('dynamic_model/Controller_AutoCreator');

		



	}
   



}