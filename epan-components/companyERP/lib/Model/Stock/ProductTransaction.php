<?php
namespace companyERP;
class Model_Stock_ProductTransaction extends \Model_Table
{
	public $table="companyERP_producttransaction";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Model_Master_BillDetail','billdetail_id');
		$this->hasOne('companyERP/Model_Master_Party','party_id');
		$this->hasOne('companyERP/Model_Master_Product','product_id');
		$this->addField('name')->mandatory('can not be null');
		$this->addField('type')->enum(array('Inward','Consumed'));
		$this->addField('warehouse');
		$this->addField('date')->type('date');
		
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');


	}
	
	function beforeSave()
    {
		   $producttrans=$this->add('companyERP/Model_Stock_ProductTransaction');

	       if($this->loaded()) 
		   {
			  $producttrans->addCondition('id','<>',$this->id);
		   
		     }

			$producttrans->addCondition('name',$this['name']);
			$producttrans->tryLoadAny();
			
			if($producttrans->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	 }
     
 }    