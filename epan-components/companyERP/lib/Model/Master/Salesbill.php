<?php
namespace companyERP;

class Model_Master_Salesbill extends Master_Bill
{
    public $table="companyERP_salesbill";

	function init()
	{
		parent::init();

		$this->addField('name')->mandatory('can not be null');

		$this->add('dynamic_model/Controller_AutoCreator');



	}
}