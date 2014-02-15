<?php
namespace companyERP;
class Model_Master_Item extends \Model_Table{
	public $table="companyERP_item";
	function init(){
		parent::init();
	$this->hasOne('companyERP/Master_Category','category_id');
	$this->addField('name');
	$this->hasMany('companyERP/Master_Itemproducts','item_id');

	$this->add('dynamic_model/Controller_AutoCreator');

	}
}

