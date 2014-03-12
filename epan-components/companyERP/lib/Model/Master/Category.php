<?php
namespace companyERP;
class Model_Master_Category extends \Model_Table
{
	public $table="companyERP_category";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_Company','company_id');
		$this->addField('name');
		$this->add('dynamic_model/Controller_AutoCreator');
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
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
		if($this->ref('companyERP/Master_ItemGroup')->count()->getOne()>0)
{
	throw $this->exception('plese delete Product content');
	}
}
}