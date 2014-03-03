<?php
namespace companyERP;
class Model_Master_PaymentReceived extends Model_Master_Transaction{
	public $table="companyERP_paymentreceived";
	function init(){
		parent::init();

		// $this->addCondition('Transaction_type','Received');


		
		

		
	//$this->add('dynamic_model/Controller_AutoCreator');

	$this->addHook('beforeSave',$this);
	
	}

	function beforeSave()
	{
		$paymentreceived=$this->add('companyERP/Model_Master_PaymentReceived');
		if($this->loaded())
		 {
			$paymentreceived->addCondition('id','<>',$this->id);
		 }
			$paymentreceived->addCondition('name',$this['name']);
			$paymentreceived->tryloadAny();

		if($paymentreceived->loaded())
		 {
				throw $this->exception('its already exist');
		 }
		
	}

}
