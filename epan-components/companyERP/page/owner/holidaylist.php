<?php
class page_companyERP_page_owner_holidaylist extends page_companyERP_page_owner_home{
	function init(){
		parent::init();
$this->add('H3')->setHtml('Manage Brands<small><a href="?page=companyERP_page_owner_setup">Stock Section</a></small>');
		$crud=$this->add('CRUD');
		$crud->setModel('companyERP/Master_HolidayList');
	}
}