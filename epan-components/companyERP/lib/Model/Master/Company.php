<?php
namespace companyERP;
class Model_Master_Company extends \Model_Table{
	public $table="companyERP_company";
	function init(){
		parent::init();

		
		$this->hasOne('Epan','epan_id')->defaultValue($this->api->current_website->id);
		$this->addField('name')->mandatory('can not be null');
		$this->hasMany('companyERP/Master_Branch','company_id');
		$this->hasMany('companyERP/Master_Product','company_id');
		$this->hasMany('companyERP/Master_SupplierType','company_id');
		$this->hasMany('companyERP/Master_Transaction','company_id');
		$this->hasMany('companyERP/Master_FiscalYear','company_id');
	
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
		$this->add('dynamic_model/Controller_AutoCreator');
	}
	function beforeSave(){
		$company=$this->add('companyERP/Model_Master_Company');
		if($this->loaded()){
		$company->addCondition('id','<>',$this->id);
		}

		$company->addCondition('name',$this['name']);
		$company->tryLoadAny();

		if($company->loaded()){
		throw $this->exception('its already exist');
			}
		
	}

	function beforeDelete(){
	if($this->ref('companyERP/Master_Branch')->count()->getOne()>0)
	throw $this->exception('plese delete   Branch contain');

	if($this->ref('companyERP/Master_Category')->count()->getOne()>0)
	throw $this->exception('plese delete Category contain');

	if($this->ref('companyERP/Master_Product')->count()->getOne()>0)
	throw $this->exception('plese delete Product contain');

	if($this->ref('companyERP/Master_SupplierType')->count()->getOne()>0)
	throw $this->exception('plese delete Supplier Type contain');

	if($this->ref('companyERP/Master_Transaction')->count()->getOne()>0)
	throw $this->exception('plese delete transaction contain');
	
if($this->ref('companyERP/Master_FiscalYear')->count()->getOne()>0)
	throw $this->exception('plese delete Fiscalyear content');
}
}
