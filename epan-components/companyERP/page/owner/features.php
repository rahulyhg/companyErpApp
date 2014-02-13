<?php
class page_companyERP_page_owner_features extends page_companyERP_page_owner_main{
	function init()
	{
		parent::init();

	$crud=$this->add('CRUD');
	$crud->setModel('companyERP_Master_Features'); 

	}
}