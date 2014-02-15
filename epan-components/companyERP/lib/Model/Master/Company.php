<?php
namespace companyERP;
class Model_Master_Company extends \Model_Table{
	public $table="companyERP_company";
	function init(){
		parent::init();
		$this->addField('name')->mandatory('can not be null');
		$this->hasMany('companyERP/Master_Branch','company_id');
		$this->hasMany('companyERP/Master_Category','company_id');
		$this->hasMany('companyERP/Master_Product','company_id');
		$this->hasMany('companyERP/Master_Parties','company_id');
		$this->add('dynamic_model/Controller_AutoCreator');
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
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
	if($this->ref('companyERP/Master_Parties')->count()->getOne()>0)
	throw $this->exception('plese delete Parties contain');
	

}
}