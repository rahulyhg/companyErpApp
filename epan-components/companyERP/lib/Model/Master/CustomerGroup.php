<?php
namespace companyERP;
class Model_Master_Customergroup extends \Model_Table{
	public $table="companyERP_customergroup";
	function init(){
		parent::init();
		$this->addField('name');
		$this->addField('category')->enum(array('Commercial','Government','Non-Profit','Individual'));
		$this->add('dynamic_model/Controller_AutoCreator');
		$this->hasMany('companyERP/Master_Customer','customergroup_id');
		
	    $this->addHook('beforeSave',$this);
		//$this->addHook('beforeDelete',$this);
	}
	function beforeSave(){
		$customer=$this->add('companyERP/Model_Master_CustomerGroup');
		if($this->loaded()){
		$customer->addCondition('id','<>',$this->id);
		}

		$customer->addCondition('name',$this['name']);
		$customer->tryLoadAny();

		if($customer->loaded()){
		throw $this->exception('its already exist');
			}
		
	}

		function beforeDelete()
	{
	  if($this->ref('companyERP/Master_Customer')->count()->getOne()>0)
      {
	   throw $this->exception('plese delete Customer content');
	
       }

     }

}
