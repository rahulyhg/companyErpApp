<?php
namespace companyERP;

class Model_Master_Department extends \Model_Table
{
	public $table="companyERP_department";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_Branch','branch_id');
		$this->addField('name');

        $this->hasMany('companyERP/Master_Post','department_id');  
        $this->hasMany('companyERP/Master_Companymember','department_id');  

		$this->add('dynamic_model/Controller_AutoCreator');

		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
	}
	function beforeSave()
	{
		$department=$this->add('companyERP/Model_Master_Department');
		if($this->loaded())
		 {
			$department->addCondition('id','<>',$this->id);
		 }
			$department->addCondition('name',$this['name']);
			$department->tryloadAny();

		if($department->loaded())
		 {
				throw $this->exception('its already exist');
		 }
		
	}

	function beforeDelete()
	{
		if($this->ref('companyERP/Master_Staff')->count()->getOne()>0)
       {
	        throw $this->exception('plese delete Staff contain');
	    
	    }   

	    if($this->ref('companyERP/Master_Post')->count()->getOne()>0)
       {
	       throw $this->exception('plese delete Post contain');
	    
	    }   


    }
}