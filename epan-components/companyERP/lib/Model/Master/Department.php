<?php
namespace companyERP;

class Model_Master_Department extends Model_Master_AdminDept
{
		//public $title_field='name';  // name of descriptive field. If not defined, will use table+'#'+id
	//public $table="companyERP_department";
	// public $title_field="dept_no";
	function init()
	{
		parent::init();

		//$this->hasOne('companyERP/Master_Branch','branch_id');
		//$this->addField('dept_no');
		//$this->addField('dept_name');
		// $this->hasOne('companyERP/Master_AdminDept','admindept_id');
       // $this->hasMany('companyERP/Master_Post','department_id');  
        $this->hasMany('companyERP/Master_Staff','department_id');  

		//$this->add('dynamic_model/Controller_AutoCreator');

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
		

	    if($this->ref('companyERP/Master_Post')->count()->getOne()>0)
       {
	       throw $this->exception('plese delete Post contain');
	    
	    }   


    }
}