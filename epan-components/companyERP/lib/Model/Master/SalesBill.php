<?php
namespace companyERP;
class Model_Master_Salesbill extends  Model_Master_Bill{
	function init(){
		parent::init();

		$this->addCondition('bill_type','Sales');


	}
}