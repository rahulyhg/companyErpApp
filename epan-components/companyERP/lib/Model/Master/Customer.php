<?php
namespace companyERP;
class Model_Master_Customer extends \Model_Table
{
	public $table="companyERP_customer";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_CustomerGroup','customer_id');
		$this->addField('name');
		$this->addField('territory')->enum(array('Punjab','Rajasthan'));
		$this->hasMany('companyERP/Master_ProductCustomer','customer_id');
		$this->add('dynamic_model/Controller_AutoCreator');

		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);


	}

	function beforeSave(){
		$customer=$this->add('companyERP/Model_Master_Customer');
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
	  if($this->ref('companyERP/Master_ProductCustomer')->count()->getOne()>0)
      {
	   throw $this->exception('plese delete product customer content');
	
       }

     }

}