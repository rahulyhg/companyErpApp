<?php
namespace companyERP;
class Model_Master_Category extends \Model_Table
{
	public $table="companyERP_category";
	function init()
	{
		parent::init();
		$this->addField('name');
		$this->hasMany('companyERP/Master_Product','category_id');
		$this->add('dynamic_model/Controller_AutoCreator');
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
		$this->addExpression('no_of_product')->set(function($m,$q)
		 	{
	 		return $m->refSQL('companyERP/Master_Product')->count();
	 	});
	}
	function beforeSave()
	{
		$category=$this->add('companyERP/Model_Master_Category');
		if($this->loaded())
		{
			$category->addCondition('id','<>',$this->id);
		}

			$category->addCondition('name',$this['name']);
			$category->tryLoadAny();

			if($category->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}

	function beforeDelete()
	{
		
    }
}