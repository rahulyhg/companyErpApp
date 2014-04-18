<?php
namespace companyERP;
class Model_Master_Party extends \Model_Table
{
	public $table="companyERP_party";
	function init()
	{
		parent::init();

		$this->addField('name')->mandatory('can not be null');
		$this->addField('address');
		$this->addField('mobileno');
		$this->addField('emailid');

		$this->hasMany('companyERP/Model_Master_Bill','party_id');
		$this->hasMany('companyERP/Model_Master_BillDetail','party_id');
		$this->hasMany('companyERP/Model_Stock_ProductTransaction','party_id');
		$this->hasMany('companyERP/Model_Master_Transaction','party_id');
		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');


	}
	
	function beforeSave()
    {
		   $party=$this->add('companyERP/Model_Master_Party');

	       if($this->loaded()) 
		   {
			  $party->addCondition('id','<>',$this->id);
		   
		     }

			$party->addCondition('name',$this['name']);
			$party->tryLoadAny();
			
			if($party->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	 }
     
 }    