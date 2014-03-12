<?php
namespace companyERP;
class Model_Master_SupplierType extends \Model_Table{
	public $table="companyERP_suppliertype";
	function init(){
		parent::init();

		$company=$this->add('companyERP/Model_Master_Company');
		$company->addCondition('epan_id',$this->api->current_website->id)
				->tryLoadAny();

		$this->hasOne('companyERP/Master_Company','company_id')->defaultValue($company->id);

		$this->addField('name');
		$this->addField('category')->enum(array('Distributor','Wholesalers','Retailers'));


        $this->hasMany('companyERP/Master_Supplier','suppliertype_id');                                                                                              
		$this->add('dynamic_model/Controller_AutoCreator');
		
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
	}

	function beforeSave(){
		$suppliertype=$this->add('companyERP/Model_Master_SupplierType');
		if($this->loaded()){
		$suppliertype->addCondition('id','<>',$this->id);
		}

		$suppliertype->addCondition('name',$this['name']);
		$suppliertype->tryLoadAny();

		if($suppliertype->loaded()){
		throw $this->exception('its already exist');
			}
		
	}
	function beforeDelete()
	{
	  if($this->ref('companyERP/Master_Supplier')->count()->getOne()>0)
      {
	   throw $this->exception('plese delete supplier content');
	
       }

    }

}