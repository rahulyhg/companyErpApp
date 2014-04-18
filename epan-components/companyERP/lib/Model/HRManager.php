<?php
namespace companyERP;
class Model_HRManager extends Model_Master_Staff{
	function init(){
		parent::init();
		$this->addCondition('type','HR_Manager');
	}
}