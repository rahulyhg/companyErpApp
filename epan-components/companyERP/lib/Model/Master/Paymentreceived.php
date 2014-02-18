<?php
namespace companyERP;
class Model_Master_Paymentreceived extends Model_Master_Transaction{
	public $table="companyERP_paymentreceived";
	function init(){
		parent::init();

		$this->addCondition('Transaction_type','paymentreceived');


		
		

		
	//$this->add('dynamic_model/Controller_AutoCreator');
	}
}