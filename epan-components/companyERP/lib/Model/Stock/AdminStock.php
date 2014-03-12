<?php
namespace companyERP;
class Model_Stock_AdminStock extends \Model_Table{
	public $table="companyERP_adminstock";
	function init(){
		parent::init();


		$this->addField('name')->caption('New_Material');
		
		$this->add('dynamic_model/Controller_AutoCreator');
		
		$this->addHook('beforeSave',$this);
		//$this->addHook('beforeDelete',$this);
	}
	function beforeSave(){
		$adminstock=$this->add('companyERP/Model_Stock_AdminStock');

		if($this->loaded())
		{
			$adminstock->addCondition('id','<>',$this->id);
		}
			$adminstock->addCondition('name',$this['name']);
			$adminstock->tryLoadAny();
			if($adminstock->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}
	
}