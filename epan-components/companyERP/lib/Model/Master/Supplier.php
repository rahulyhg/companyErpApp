<?php
namespace companyERP;
class Model_Master_Supplier extends \Model_Table
{
	public $table="companyERP_supplier";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_SupplierType','suppliertype_id');
		$this->addField('name');
		$this->hasMany('companyERP/Master_Bill','supplier_id');
		$this->add('dynamic_model/Controller_AutoCreator');
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
	}
	function beforeSave()
	{
		$supplier=$this->add('companyERP/Model_Master_Supplier');
		if($this->loaded())
		{
			$supplier->addCondition('id','<>',$this->id);
		}
			$supplier->addCondition('name',$this['name']);
			$supplier->tryloadAny();
			if($supplier->loaded())
			{
				throw $this->exception('its already exist');
			}
		}

	function beforeDelete()
	{
		if($this->ref('companyERP/Model_Master_Bill')->count()->getOne()>0)
       {
	$this->api->js()->univ()->errorMessage('plese delete Bill content');
	
        }
	}
}	
	