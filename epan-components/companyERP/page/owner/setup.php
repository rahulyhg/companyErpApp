<?php
class page_companyERP_page_owner_setup extends page_companyERP_page_owner_home
{
	function init()
	{
		 parent::init();

		 $btn_hr=$this->add('Button')->set('HR');
		 $stock_btn=$this->add('Button')->set('Stock');
		 $cust_btn=$this->add('Button')->set('Customer');
		 $supplier_btn=$this->add('Button')->set('Supplier');
		 
		 $hr_view=$this->add('companyERP/View_HR')->addClass('xyz');
		 $stock_view=$this->add('companyERP/View_Stock')->addClass('xyz');
		 $cust_view=$this->add('companyERP/View_Customer')->addClass('xyz');
		 $supp_view=$this->add('companyERP/View_Supplier')->addClass('xyz');
		
		$stock_btn->js('click',array($this->js()->_selector('.xyz')->hide(),$stock_view->js()->toggle()));

		$btn_hr->js('click',array($this->js()->_selector('.xyz')->hide(),$hr_view->js()->toggle()));
		
		$cust_btn->js('click',array($this->js()->_selector('.xyz')->hide(),$cust_view->js()->toggle()));
		$supplier_btn->js('click',array($this->js()->_selector('.xyz')->hide(),$supp_view->js()->toggle()));

		
	}
} 