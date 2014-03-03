<?php
class page_companyERP_page_owner_company extends page_companyERP_page_owner_home{
	function init(){
		parent::init();
	$crud=$this->add('CRUD');
	$crud->setModel('companyERP/Master_Staff'); 

	}
}
