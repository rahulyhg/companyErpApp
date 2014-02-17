<?php
namespace companyERP;

class Model_Master_Purchasebill extends Master_Bill
{
    public $table="companyERP_purchasebill";

	function init()
	{
		parent::init();

		$this->addField('name')->mandatory('can not be null');

		$this->add('dynamic_model/Controller_AutoCreator');



	}
}