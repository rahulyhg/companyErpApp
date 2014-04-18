<?php
namespace companyERP;
class Model_Master_Item extends \Model_Table{
	public $table="companyERP_item";
	function init(){
		parent::init();
	$this->hasOne('companyERP/Master_Brand','brand_id');
	$this->addField('name');

	$this->hasMany('companyERP/Stock_Consumed','item_id');
	$this->hasMany('companyERP/Stock_Inward','item_id');
	$this->hasMany('companyERP/Master_ItemProducts','item_id');

	$this->add('dynamic_model/Controller_AutoCreator');
	
	$this->addHook('beforeSave',$this);

	$this->addExpression('total_inward')->set(function($m,$q){
		return $m->refSQL('companyERP/Stock_Inward')->sum('qty');
	});

	$this->addExpression('total_consume')->set(function($m,$q){
		return $m->refSQL('companyERP/Stock_Consumed')->sum('qty');
	});

	//$in=$this->add('companyERP/Model_Stock/Inward');
	//$cn=$this->add('companyERP/Model_Stock/Consumed');

	//$this->join('companyERP_inward','id');
	//$this->join('companyERP_consumed','id');

	// $this->addExpression('QTY')->set($this->refSQL('companyERP_Stock/Inward')->sum('qty'));

	


	}
	
	function beforeSave()
	{
		$item=$this->add('companyERP/Model_Master_Item');
		if($this->loaded())
		 {
			$item->addCondition('id','<>',$this->id);
		 }
			$item->addCondition('name',$this['name']);
			$item->tryloadAny();

		if($item->loaded())
		 {
				throw $this->exception('its already exist');
		 }
		
	}
	function beforeDelete()
	{
		  if($this->ref('companyERP/Master_ItemProducts')->count()->getOne()>0)
      {
	   throw $this->exception('plese delete item products content');
	
       }

     }
}

