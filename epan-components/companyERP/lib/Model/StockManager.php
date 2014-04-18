<?php
namespace companyERP;
class Model_StockManager extends Model_Master_Staff{
	function init(){
		parent::init();
		$this->addCondition('type','Stock_Manager');
	}
}