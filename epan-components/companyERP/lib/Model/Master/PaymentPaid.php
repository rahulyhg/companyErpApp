<?php
namespace companyERP;
class Model_Master_PaymentPaid extends Model_Master_Transaction{
	public $table="companyERP_paymentpaid";
	function init(){
		parent::init();

		$this->addCondition('transaction_type','Paid');

		$this->addHook('beforeSave',$this);

		
	}
	function beforeSave()
	{
		$paymentpaid=$this->add('companyERP/Model_Master_PaymentPaid');
		if($this->loaded())
		 {
			$paymentpaid->addCondition('id','<>',$this->id);
		 }
			$paymentpaid->addCondition('name',$this['name']);
			$paymentpaid->tryloadAny();

		if($paymentpaid->loaded())
		 {
				throw $this->exception('its already exist');
		 }
		
	}
}