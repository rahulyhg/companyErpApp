<?php
namespace companyERP;
class Model_Master_Branch extends \Model_Table{
	public $table="companyERP_branch";
	function init(){
		parent::init();
		$this->hasOne('companyERP/Master_Company','company_id');
		$this->addField('name');
		$this->hasMany('companyERP/Master_Department','branch_id');                                                                                              
		$this->hasMany('companyERP/Master_Companymember','branch_id');                                                                                              
		$this->add('dynamic_model/Controller_AutoCreator');
		
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
	}
	function beforeSave(){
		$branch=$this->add('companyERP/Model_Master_Branch');

		if($this->loaded())
		{
			$branch->addCondition('id','<>',$this->id);
		}
			$branch->addCondition('name',$this['name']);
			$branch->tryLoadAny();
			if($branch->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}
	function beforeDelete()
	{
	  if($this->ref('companyERP/Master_Department')->count()->getOne()>0)
      {
	   throw $this->exception('plese delete dept contain');
	
       }

       if($this->ref('companyERP/Master_Staff')->count()->getOne()>0)
      {
	   throw $this->exception('plese delete staff contain');
	
       }



   }

}