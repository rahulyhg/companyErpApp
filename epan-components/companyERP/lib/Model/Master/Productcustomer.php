<?php
namespace companyERP;
class Model_Master_ProductCustomer extends \Model_Table
{
	public $table="companyERP_productcustomer";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_Product','Product_id');
	$this->hasOne('companyERP/Master_Customer','customer_id');
		$this->addField('name');
		
		$this->add('dynamic_model/Controller_AutoCreator');
	}
}	//