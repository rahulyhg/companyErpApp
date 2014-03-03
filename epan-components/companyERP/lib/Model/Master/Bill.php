<?php
namespace companyERP;
class Model_Master_Bill extends \Model_Table
{
	public $table="companyERP_bill";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_Supplier','supplier_id');

		$this->addField('name')->mandatory('can not be null');
		$this->addField('bill_type')->enum(array('Sales','Purchase'));
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');


	}
	
	function beforeSave()
    {
		   $bill=$this->add('companyERP/Model_Master_Bill');

	       if($this->loaded()) 
		   {
			  $bill->addCondition('id','<>',$this->id);
		   
		     }

			$bill->addCondition('name',$this['name']);
			$bill->tryLoadAny();
			
			if($bill->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	 }
     
 }    