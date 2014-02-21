<?php
namespace companyERP;

class Model_Master_Bill extends \Model_Table
{
	public $table="companyERP_bill";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_Parties','parties_id');

		$this->addField('name')->mandatory('can not be null');
		$this->addField('bill_type')->enum(array('Sales','Purchase'));

		$this->add('dynamic_model/Controller_AutoCreator');

		



	}
   



}