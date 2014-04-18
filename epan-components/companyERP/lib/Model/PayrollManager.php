<?php
namespace companyERP;
class Model_PayrollManager extends Model_Master_Staff{
	function init(){
		parent::init();
		$this->addCondition('type','Payroll_Manager');
	}
}