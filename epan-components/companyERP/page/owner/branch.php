<?php
class page_companyERP_page_owner_branch extends page_companyERP_page_owner_main{
	function init(){
		parent::init();
	$crud=$this->add('CRUD');
	$crud->setModel('companyERP/Master_Branch'); 

	}
}