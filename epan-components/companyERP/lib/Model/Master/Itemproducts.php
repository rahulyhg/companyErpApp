<?php
namespace companyERP;
class Model_Master_Itemproducts extends \Model_Table
{
	public $table="companyERP_itemproducts";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_item','item_id');
		$this->hasOne('companyERP/Master_Product','product_id');
		$this->addField('name');
		$this->add('dynamic_model/Controller_AutoCreator');
		$this->addHook('beforeSave',$this);
	}
	function beforeSave(){
		$company=$this->add('companyERP/Model_Master_Iemproducts');
		if($this->loaded()){
		$company->addCondition('id','<>',$this->id);
		}

		$company->addCondition('name',$this['name']);
		$company->tryLoadAny();

		if($company->loaded()){
		throw $this->exception('its already exist');
			}
		
	}
