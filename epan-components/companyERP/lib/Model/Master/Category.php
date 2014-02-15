<?php
class Model_Master_Category extends Model_Table
{
	public $table="category";
	function init()
	{
		parent::init();
		$this->addField('name');
		$this->hasMany('Master_Product','category_id');
		$this->add('dynamic_model/Controller_AutoCreator');
		$this->addHook('beforeSave',$this);
	}
	function beforeSave()
	{
		$category=$this->add('Model_Master_Category');
		if($this_loaded())
		{
			$category->addCondition('id','<>',$this->id);
		}
			$category->addCondition('name',$this['name']);
			$category->tryloadAny();
			if($category->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}

	function beforeDelete()
	{
		if($this->ref('Product')->count()->getOne)()>0)
{
	$this->api->js()->univ)()->errorMessage('plese delete Product contain');
	}
}
}