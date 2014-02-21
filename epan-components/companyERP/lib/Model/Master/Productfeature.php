<?php
namespace companyERP;

class Model_Master_Productfeature extends \Model_Table
{
	public $table="companyERP_productfeature";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_Product','product_id');
		$this->addField('name');
		$this->add('dynamic_model/Controller_AutoCreator');

		$this->addHook('beforeSave',$this);
	}

	function beforeSave()
	{

		
	}

}