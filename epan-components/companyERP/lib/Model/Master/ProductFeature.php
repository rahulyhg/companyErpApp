<?php
namespace companyERP;

class Model_Master_ProductFeature extends \Model_Table
{
	public $table="companyERP_productfeature";
	function init()
	{
		parent::init();
		//$this->hasOne('companyERP/Master_Product','product_id');
		$this->addField('name');
		$this->add('dynamic_model/Controller_AutoCreator');

		$this->addHook('beforeSave',$this);
	}

	function beforeSave(){
		$productfeature=$this->add('companyERP/Model_Master_ProductFeature');

		if($this->loaded())
		{
			$productfeature->addCondition('id','<>',$this->id);
		}
			$productfeature->addCondition('name',$this['name']);
			$productfeature->tryLoadAny();
			if($productfeature->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}

}