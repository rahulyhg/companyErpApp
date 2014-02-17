<?php
namespace companyERP;
class Model_Master_Transaction extends \Model_Table{
	public $table="companyERP_transaction";
	function init(){
		parent::init();
		
		$this->hasOne('companyERP/Master_Company','company_id');
		$this->addField('name');
		$this->addField('transaction_type')->enum(array('paymentpaid','paymentreceived'));
		$this->addField('transaction_date');
		$this->addField('mode_of_transaction');
		$this->addField('gross_amount');
		$this->addField('order_id');
		$this->addField('tax');
//		$this->addField('shipping_charge');
		$this->addField('net_amount');
		$this->addField('description');
		$this->addField('status');
		$this->add('dynamic_model/Controller_AutoCreator');
	}
}