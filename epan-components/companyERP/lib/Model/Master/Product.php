<?php
namespace companyERP;

class Model_Master_Product extends \Model_Table
{
	public $table="companyERP_product";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Model_Master_Category','category_id');
		$this->addField('name');
		$this->addField('unit');
		$this->addField('quantity');
		$this->addField('weight');
		$this->addField('packing_date');
		$this->addField('expire_date');
		$this->addField('availability_of_product');
		$this->hasMany('companyERP/Model_Master_BillDetail','product_id');
		$this->hasMany('companyERP/Model_Stock_ProductTransaction','product_id');

		// $this->hasMany('companyERP/Master_ProductFeature','product_id');
		// $this->hasMany('companyERP/Master_ItemProducts','product_id');
		// $this->hasMany('companyERP/Master_ProductCustomer','product_id');
		// $this->hasMany('companyERP/Master_Manufacturing','product_id');
		// $this->hasMany('companyERP/Master_CustomerGroup','product_id');
	
		$this->add('dynamic_model/Controller_AutoCreator');
		
		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
	}
	function beforeSave()
	{
		$product=$this->add('companyERP/Model_Master_Product');
		if($this->loaded())
		{
			$product->addCondition('id','<>',$this->id);
		}
			$product->addCondition('name',$this['name']);
			$product->tryLoadAny();

			if($product->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	}

	function beforeDelete()
	{
	// 	if($this->ref('companyERP/Master_ProductFeature')->count()->getOne()>0)
 //      {
	      
 //      	throw $this->exception('delete feature');
	//     //  $this->api->js()->univ()->errorMessage('plese delete features content');
	//   }
	//   if($this->ref('companyERP/Master_ItemProducts')->count()->getOne()>0)
 //      {
	      
 //      	throw $this->exception('delete item detail');
 //      }
	//    if($this->ref('companyERP/Master_ProductCustomer')->count()->getOne()>0)
 //      {
	      
 //      	throw $this->exception('delete product customer detail');
 //      } 

 //      if($this->ref('companyERP/Master_Manufacturing')->count()->getOne()>0)
 //      {
	      
 //      	throw $this->exception('delete manufacturing detail');
 //      }
    }
}