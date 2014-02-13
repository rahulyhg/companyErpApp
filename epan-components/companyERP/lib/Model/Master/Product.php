Master_<?php
class Model_Master_Product extends Model_Table
{
	public $table="product";
	function init()
	{
		parent::init();
		$this->hasOne('Master_Category','category_id');
		$this->addField('name');
		$this->hasMany('Master_product','product_id');
		$this->add('dynamic_model/Controller_AutoCreator');
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
	}
	function beforeSave
	{
		$product=$this->add('Model_Master_Product');
		if($this_loaded())
		{
			$product->addCondition('id','<>',$this->id);
		}
			$product->addCondition('name',$this['name']);
			$product->tryloadAny();
			if($product->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}

	function beforeDelete()
	{
		if($this->ref('Product')->count()->getOne)()>0)
{
	$this->api->js()->univ()->errorMessage('plese delete product contain');
	}
}
}