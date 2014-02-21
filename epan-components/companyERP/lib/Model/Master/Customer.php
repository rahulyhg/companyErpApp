<?php
namespace companyERP;
class Model_Master_Customer extends \Model_Table
{
	public $table="companyERP_customer";
	function init()
	{
		parent::init();
		$this->addField('name');
		$this->addField('territory')->enum(array('Punjab','Rajasthan'));
		$this->hasMany('companyERP/Master_Product_Customer','customer_id');
		$this->hasMany('companyERP/Master_Customergroup','customer_id');
		$this->add('dynamic_model/Controller_AutoCreator');
	}
}