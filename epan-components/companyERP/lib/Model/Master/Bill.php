<?php
namespace companyERP;
class Model_Master_Bill extends \Model_Table
{
	public $table="companyERP_bill";
	function init()
	{
		parent::init();

		$this->hasOne('companyERP/Model_Master_Party','party_id');

		$this->addField('name')->mandatory('can not be null');
		$this->addField('billno');
		$this->addField('bill_type')->enum(array('Sales','Purchase'));
		//$this->addField('grosstotal');
		$this->addField('discountamount');
		$this->addField('discountremark');
		$this->addField('taxpercentage');
		//$this->addField('netamount');
		$this->addField('remark');
		$this->addField('dueamount');


		$this->addExpression('gross_total')->set(function($m,$q){
			return $m->refSQL('companyERP/Master_BillDetail')->sum('amount');
		});


		$this->hasMany('companyERP/Master_BillDetail','bill_id');
		$this->hasMany('companyERP/Master_Transaction','bill_id');

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